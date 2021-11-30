<?php
//Basic connection to database
class dbh{

    private $host = "127.0.0.1";
    private $user = "dbman";
    private $pwd = "w3Xp7Ug7ZtNQAT5h";
    private $dbName = "arturs_podzins";

    protected function connect(){
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}