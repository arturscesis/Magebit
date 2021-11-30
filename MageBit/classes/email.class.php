<?php
//Email handler class
class email extends dbh{

    public $var;

    //Class that deletes email
    protected function deleteEmail($deleteId){
        $sql = "DELETE FROM Magebit WHERE id = '$deleteId'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$deleteId]);
    }

    //Class that inserts email if it is unique
    public function setEmail($email){
        $stmt = $this->connect()->prepare('SELECT count(*) FROM Magebit WHERE email = ?');
        $stmt->execute(array($email));
        $result = $stmt->fetch(PDO::FETCH_NUM);
        $exists = array_pop($result);
        if ($exists > 0){
            return null;
        }else{
            $sql = "INSERT INTO Magebit (email) VALUES (?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$email]);
        }
    }

    //Gets all the emails from database
    public function getEmails(){
        //Paginate
        if (!isset($_GET['startpos']) or !is_numeric($_GET['startpos'])) {
            $startpos = 0;
        } else {
            $startpos = (int)$_GET['startpos'];
        }

        //Select
        $sql = "SELECT * FROM Magebit LIMIT $startpos,10";
        $stmt = $this->connect()->query($sql); 
        $results = $stmt->fetchAll();
        
        //Next
        $prev = $startpos - 10;
        if ($prev >= 0){
            echo '<a href="'.$_SERVER['PHP_SELF'].'?startpos='.$prev.'">Previous</a>';
        }else{
            echo '<a href="'.$_SERVER['PHP_SELF'].'?startpos='.($startpos+10).'">Next</a>';
        }

        return $results;

    }

    //If email subdomain is unique it is created as a option
    public function getEmailD($newDomain){
        //Paginate
        if (!isset($_GET['startpos']) or !is_numeric($_GET['startpos'])) {
            $startpos = 0;
        } else {
            $startpos = (int)$_GET['startpos'];
        }

        //Select
        $sql = "SELECT * FROM Magebit WHERE email LIKE '%$newDomain%' LIMIT $startpos,10";
        $stmt = $this->connect()->query($sql); 
        $results = $stmt->fetchAll();
        return $results;
    }

    //Based on user order type this class orders all the emails and returns them
    public function getEmailOrder($post){
        //Paginate
        if (!isset($_GET['startpos']) or !is_numeric($_GET['startpos'])) {
            $startpos = 0;
        } else {
            $startpos = (int)$_GET['startpos'];
        }
        //Ordering
        $this->var = isset($post) ? $post : 'dtof';

        if($this->var == "asc"){
            $sql ="SELECT * FROM Magebit ORDER BY email ASC LIMIT $startpos,10";
            $stmt = $this->connect()->query($sql); 
            $results = $stmt->fetchAll();
        
        }else if($this->var == "desc"){
            $sql = "SELECT * FROM Magebit ORDER BY email DESC LIMIT $startpos,10";
            $stmt = $this->connect()->query($sql); 
            $results = $stmt->fetchAll();

        }else{
            $sql = "SELECT * FROM Magebit ORDER BY email_date ASC LIMIT $startpos,10";
            $stmt = $this->connect()->query($sql); 
            $results = $stmt->fetchAll();
        } 


        //Next
        $prev = $startpos - 10;
        if ($prev >= 0){
            echo '<a href="'.$_SERVER['PHP_SELF'].'?startpos='.$prev.'"></a>';
        }else{
            echo '<a href="'.$_SERVER['PHP_SELF'].'?startpos='.($startpos+10).'"></a>';
        }

        return $results;
    }
}