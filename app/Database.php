<?php

namespace app;

use PDO;

class Database {
    public $connection;
    public $statement;

    public function __construct() {
        $dsn = 'mysql:host=localhost;port=3306;dbname=bookings;charset=utf8mb4';
 
        $this->connection = new PDO($dsn, 'root', '' , [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = []){
        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        return $this;
    }

    public function find(){
        return $this->statement->fetch();
    }

    public function findOrFail(){
        $result = $this->find();

        if(!$result){
            abort();
        }
        else {
            return $result;
        }
    }

    public function get(){
        return $this->statement->fetchAll();
    }
}