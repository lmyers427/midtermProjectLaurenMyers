<?php

class Database{
    //Db Params
    
    private $host = 'tvcpw8tpu4jvgnnq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
    private $db_name = 'stl0wfgdrd8zcznq';
    private $username = 'uqnxczhpexp14jsl';
    private $password = null;
    private $conn;

    // private $host = 'localhost';
    // private $db_name = 'quotesdb';
    // private $username = 'root';
    // //private $password = null;
    // private $conn;
      
      

    


    //DB Connect 

    public function connect(){
        $this->conn = null;

        try {

            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, 
            $this->username $this->password = getenv('DB_PW'));
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){

            echo 'Connection Error : '. $e->getMessage();

        }

        return $this->conn;

    }
}