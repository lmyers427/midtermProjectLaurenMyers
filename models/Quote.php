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
        public $categoryName;
        public $authorName;


        // Constructor with DB

        public function __construct($db){

            $this->conn = $db;
        }

        // Get Quotes

        public function read(){
            
            //Create query
            try{
            $query = 'SELECT
            a.author as authorName, 
            c.category as categoryName,
            q.id, 
            q.quote
            FROM
            ' . $this->table . ' q
            INNER JOIN 
            authors a ON q.authorId = a.id
            INNER JOIN
            categories c ON q.categoryId = c.id
            ORDER BY
                q.id';
            }
            catch(Exception $e){

                echo $e->getMessage("Something went wrong");
            }
                
               
                

        //Prepare Statement

        $stmt = $this->conn->prepare($query);

        //Execute query
        $stmt->execute();

        return $stmt;
            
        }


        //Read a single quote
        public function read_single(){

            try{
                //Create query
                $query = 'SELECT 
                q.id, 
                q.quote, 
                a.author as authorName,
                c.category as categoryName
                FROM
                ' . $this->table . ' q
                 INNER JOIN 
                 authors a ON q.authorId = a.id
                 INNER JOIN
                 categories c ON q.categoryId = c.id
                WHERE
                   q.id = ?';
                }
                catch(Exception $e){
    
                echo $e->getMessage("Something went wrong");
                 } 
    
            //Prepare Statement
    
            $stmt = $this->conn->prepare($query);
    
            //Bind Author ID
            $stmt->bindParam(1, $this->id);
    
            //Execute query
            $stmt->execute();
    
            return $stmt;
        }

        //Read all quotes associated with specific authorId

        public function read_authorId(){
            try{
            //Create query
            $query = 'SELECT 
            q.id, 
            q.quote, 
            a.author as authorName,
            c.category as categoryName
            FROM
            ' . $this->table . ' q
             INNER JOIN 
             authors a ON q.authorId = a.id
             INNER JOIN
             categories c ON q.categoryId = c.id
            WHERE
               q.authorId = ?';
            }
            catch(Exception $e){

            echo $e->getMessage("Something went wrong");
             } 

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

                try{
                    //Create query
                    $query = 'SELECT 
                    q.id, 
                    q.quote, 
                    a.author as authorName,
                    c.category as categoryName
                    FROM
                    ' . $this->table . ' q
                     INNER JOIN 
                     authors a ON q.authorId = a.id
                     INNER JOIN
                     categories c ON q.categoryId = c.id
                    WHERE
                       q.categoryId = ?';
                    }
                    catch(Exception $e){
        
                    echo $e->getMessage("Something went wrong");
                     } 
    
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

        try{
            //Create query
            $query = 'SELECT 
            q.id, 
            q.quote, 
            a.author as authorName,
            c.category as categoryName
            FROM
            ' . $this->table . ' q
             INNER JOIN 
             authors a ON q.authorId = a.id
             INNER JOIN
             categories c ON q.categoryId = c.id
             WHERE
             q.authorId = ? AND q.categoryId = ?';
            }
            catch(Exception $e){

            echo $e->getMessage("Something went wrong with the query");
             } 

            
    
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

            $this->id = $this->conn->lastInsertId();
              
            return true;

          }

          //Print error 
         printf("Error: %s.\n", $stmt->error);



          return false;
        }
        //Update Quote
        public function update(){
            try{
            
            //Create query

            $query = 'UPDATE ' . 
                    $this->table . '
                SET
                    quote = :quote,
                    categoryId = :categoryId,
                    authorId = :authorId

                WHERE
                    id = :id';


            }catch(Exception $e){

                echo $e->getMessage("Something went wrong with the query");
         } 
            

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

        if( $stmt->execute()){
            
            return true;

        }
        else{

        return false;

        }
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







