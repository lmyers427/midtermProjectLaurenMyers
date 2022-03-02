<?php

    class Author {

        //DB stuff

        private $conn;
        private $table = 'authors';

        //Author Properties
        public $id;
        public $name;


        // Constructor with DB

        public function __construct($db){

            $this->conn = $db;
        }

        // Get Authors

        public function read(){

            //Create query
            $query = 'SELECT a.id, 
            a.author
            FROM
            ' . $this->table . 'a
            ORDER BY
                a.id';

        //Prepare Statement

        $stmt = $this->conn->prepare($query);

        //Execute query
        $stmt->execute();

        return $stmt;
            
        }
    }