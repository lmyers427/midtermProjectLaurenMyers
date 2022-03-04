<?php

    class Quote {

        //DB stuff

        private $conn;
        private $table = 'quotes';

        //Quote Properties
        public $id;
        public $quote;
        public $authorId;
        public $categoryId;


        // Constructor with DB

        public function __construct($db){

            $this->conn = $db;
        }

        // Get Quotes

        public function read(){

            //Create query
            $query = 'SELECT 
            q.id, 
            q.quote, 
            q.authorId, 
            q.categoryId 
            FROM
            ' . $this->table . ' q
            ORDER BY
                q.id';

        //Prepare Statement

        $stmt = $this->conn->prepare($query);

        //Execute query
        $stmt->execute();

        return $stmt;
            
        }


        //Read a single quote
        public function read_single(){

            
            //Create query
            $query = 'SELECT 
            q.id, 
            q.quote, 
            q.authorId, 
            q.categoryId 
            FROM
            ' . $this->table . ' q
            WHERE
                q.id = ?
            LIMIT 0,1';



            //Prepare statement
            $stmt = $this->conn->prepare($query);

            //Bind ID
            $stmt->bindParam(1, $this->id);

            //Execute query
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            //Set properties
            $this->quote = $row['quote'];
            $this->authorId = $row['authorId'];
            $this->categoryId = $row['categoryId'];

        }

        //Read all quotes associated with specific authorId

        public function read_authorId(){

            //Create query
            $query = 'SELECT 
            q.id, 
            q.quote, 
            q.authorId, 
            q.categoryId 
            FROM
            ' . $this->table . ' q
            WHERE
               q.authorId = ?';

        //Prepare Statement

        $stmt = $this->conn->prepare($query);

        //Bind Author ID
        $stmt->bindParam(1, $this->authorId);

        //Execute query
        $stmt->execute();

        return $stmt;
            }

            //Read all quotes associated with specific categoryId


            public function read_categoryId(){

                //Create query
                $query = 'SELECT 
                q.id, 
                q.quote, 
                q.authorId, 
                q.categoryId 
                FROM
                ' . $this->table . ' q
                WHERE
                   q.categoryId = ?';
    
            //Prepare Statement
    
            $stmt = $this->conn->prepare($query);
    
            //Bind Author ID
            $stmt->bindParam(1, $this->categoryId);
    
            //Execute query
            $stmt->execute();
    
            return $stmt;
                }

    
    //Read all quotes associated with specific authorId & categoryId
    
      public function read_both(){

                //Create query
                $query = 'SELECT 
                q.id, 
                q.quote, 
                q.authorId, 
                q.categoryId 
                FROM
                ' . $this->table . ' q
                WHERE
                   q.authorId = ? AND q.categoryId = ?';
    
            //Prepare Statement
    
            $stmt = $this->conn->prepare($query);
    
            //Bind Author ID & CategoryId
            $stmt->bindParam(1, $this->authorId);

            $stmt->bindParam(2, $this->categoryId);
    
            //Execute query
            $stmt->execute();
    
            return $stmt;
                }
    


        //Create Quote

        public function create(){
            //Create query

            $query = 'INSERT INTO ' . 
                    $this->table . '
                SET
                    quote = :quote,
                    categoryId = :categoryId,
                    authorId = :authorId';

          //Prepare statement 

          $stmt = $this->conn->prepare($query);

          //Clean data

          $this->quote = htmlspecialchars(strip_tags($this->quote));
          $this->categoryId = htmlspecialchars(strip_tags($this->categoryId));
          $this->authorId = htmlspecialchars(strip_tags($this->authorId));

          //Bind data
          $stmt->bindParam(':quote', $this->quote);
          $stmt->bindParam(':categoryId', $this->categoryId);
          $stmt->bindParam(':authorId', $this->authorId);
         
          //Execute query
          
          if($stmt->execute()){
              
            return true;

          }

          //Print error if something is not right
          printf("Error: %s.\n", $stmt->error);

          return false;
        }
        //Update Quote
        public function update(){
            //Create query

            $query = 'UPDATE ' . 
                    $this->table . '
                SET
                    quote = :quote,
                    categoryId = :categoryId,
                    authorId = :authorId

                WHERE
                    id = :id';

        //Prepare statement 

        $stmt = $this->conn->prepare($query);

        //Clean data

        $this->quote = htmlspecialchars(strip_tags($this->quote));
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->categoryId = htmlspecialchars(strip_tags($this->categoryId));
        $this->authorId = htmlspecialchars(strip_tags($this->authorId));

        //Bind data
        $stmt->bindParam(':quote', $this->quote);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':categoryId', $this->categoryId);
        $stmt->bindParam(':authorId', $this->authorId);
        
        //Execute query
        if($stmt->execute()){
            
            return true;

        }

        //Print error if something is not right
        printf("Error: %s.\n", $stmt->error);

        return false;
        }


        //Delete Quote

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







