<?php

class Sql extends PDO{

    private $conn;

    public function __construct(){
        parent::__construct("mysql:host=localhost;dbname=pdo", "root", "");
    }

    public function query($rawQuery, $params = array()){
        $stmt = $this->conn->prepare($rawQuery);

    }
}
?>