<?php

class Dbh {
    private $host = "localhost";
    private $user = "root";
    private $pwd = "root";
    private $dbName = "gestion3";
 
    protected function connect(){
        $dsn = 'mysql:host='.$this->host.';dbname='. $this->dbName;
        $pdo = new PDO($dsn,$this->user,$this->pwd);
        $pdo ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        return $pdo;
    }
}