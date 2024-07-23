<?php
class DB extends PDO
{
    public function __construct()
    {
        try {
            $dsn = "mysql:host=localhost;dbname=postgrado; charset=utf8mb4";
            parent::__construct($dsn, "postgrado", '?postgrado.2024]');
        } catch(PDOException $ex) {
            echo $ex->getMessage();
        }
    }
}


