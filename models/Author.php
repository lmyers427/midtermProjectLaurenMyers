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
            ' . $this->table . ' a
            ORDER BY
                a.id';

        //Prepare Statement

        $stmt = $this->conn->prepare($query);

        //Execute query
        $stmt->execute();

        return $stmt;
            
        }

        public function read_single(){

            
            //Create query
            $query = 'SELECT a.id, 
                 a.author
            FROM
            ' . $this->table . ' a
            WHERE
                a.id = ?
            LIMIT 0,1';



            //Prepare statement
            $stmt = $this->conn->prepare($query);

            //Bind ID
            $stmt->bindParam(1, $this->id);

            //Execute query
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            //Set properties
            $this->author =$row['author'];

        }



    }