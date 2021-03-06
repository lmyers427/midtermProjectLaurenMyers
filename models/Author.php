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
            $query = 'SELECT 
                 a.id, 
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

            $num = $stmt->RowCount();

            if($num > 0){

              return $stmt;
            }
            else{
              return false;
            }

        }

        //Create Author

        public function create(){
            //Create query

            $query = 'INSERT INTO ' . 
                    $this->table . '
                SET
                    author = :author';

          //Prepare statement 

          $stmt = $this->conn->prepare($query);

          //Clean data

          $this->author = htmlspecialchars(strip_tags($this->author));

          //Bind data
          $stmt->bindParam(':author', $this->author);
          
          //Execute query
          if($stmt->execute()){

            $this->id = $this->conn->lastInsertId();
              
            return true;

          }

          //Print error if something is not right
          printf("Error: %s.\n", $stmt->error);

          return false;
        }

        //Update Author
        public function update(){
            //Create query

            $query = 'UPDATE ' . 
                    $this->table . '
                SET
                    author = :author
                WHERE
                    id = :id';

          //Prepare statement 

          $stmt = $this->conn->prepare($query);

          //Clean data

          $this->author = htmlspecialchars(strip_tags($this->author));
          $this->id = htmlspecialchars(strip_tags($this->id));

          //Bind data
          $stmt->bindParam(':author', $this->author);
          $stmt->bindParam(':id', $this->id);
          
          //Execute query
          if($stmt->execute()){
              
            return true;

          }
          else{

          return false;
          }
          
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







