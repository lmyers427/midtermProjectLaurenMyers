<?php

    class Category {

        //DB stuff

        private $conn;
        private $table = 'categories';

        //Category Properties
        public $id;
        public $name;


        // Constructor with DB

        public function __construct($db){

            $this->conn = $db;
        }

        // Get Categories

        public function read(){

            //Create query
            $query = 'SELECT c.id, 
            c.category
            FROM
            ' . $this->table . ' c
            ORDER BY
                c.id';

        //Prepare Statement

        $stmt = $this->conn->prepare($query);

        //Execute query
        $stmt->execute();

        return $stmt;
            
        }

        public function read_single(){

            
            //Create query
            $query = 'SELECT c.id, 
                 c.category
            FROM
            ' . $this->table . ' c
            WHERE
                c.id = ?
            LIMIT 0,1';



            //Prepare statement
            $stmt = $this->conn->prepare($query);

            //Bind ID
            $stmt->bindParam(1, $this->id);

            //Execute query
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            //Set properties
            $this->category =$row['category'];

        }

        //Create Category

        public function create(){
            //Create query

            $query = 'INSERT INTO ' . 
                    $this->table . '
                SET
                    category = :category';

          //Prepare statement 

          $stmt = $this->conn->prepare($query);

          //Clean data

          $this->category = htmlspecialchars(strip_tags($this->category));

          //Bind data
          $stmt->bindParam(':category', $this->category);
          
          //Execute query
          if($stmt->execute()){
              
            return true;

          }

          //Print error if something is not right
          printf("Error: %s.\n", $stmt->error);

          return false;
        }

        //Update Category
        public function update(){
            //Create query

            $query = 'UPDATE ' . 
                    $this->table . '
                SET
                    category = :category
                WHERE
                    id = :id';

          //Prepare statement 

          $stmt = $this->conn->prepare($query);

          //Clean data

          $this->category = htmlspecialchars(strip_tags($this->category));
          $this->id = htmlspecialchars(strip_tags($this->id));

          //Bind data
          $stmt->bindParam(':category', $this->category);
          $stmt->bindParam(':id', $this->id);
          
          //Execute query
          if($stmt->execute()){
              
            return true;

          }

          //Print error if something is not right
          printf("Error: %s.\n", $stmt->error);

          return false;
        }


        //Delete Author

        public function delete(){
            //Create query

            $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

            //Prepare
            //Prepare statement 

          $stmt = $this->conn->prepare($query);

          //Clean data

          $this->id = htmlspecialchars(strip_tags($this->id));

            //Bind data
            $stmt->bindParam(':id', $this->id);

             //Execute query
          if($stmt->execute()){
              
            return true;

          }

          //Print error if something is not right
          printf("Error: %s.\n", $stmt->error);

          return false;
        

    }

}







