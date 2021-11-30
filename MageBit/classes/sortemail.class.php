<?php

class sortemail extends emailcontr{
    public $email;

    //Class that gets a subdomain from email
    public function cutEmail(){

        //Select
        $sql = "SELECT * FROM Magebit";
        $stmt = $this->connect()->query($sql);
        $results = $stmt->fetchAll();

        for($i = 0; $i < count($results);$i++){
            $inpEmails[] = $results[$i]["email"];
        }
        foreach($inpEmails as $oneEmail){
            $newString = substr($oneEmail, strpos($oneEmail, "@") + 1);
            $newArray[] = $newString;
        }

        return array_unique($newArray);
    }
}