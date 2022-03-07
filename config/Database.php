<?php

class Database{
    //Db Params
    private $host = 'tvcpw8tpu4jvgnnq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
    private $db_name = 'stl0wfgdrd8zcznq';
    private $username = 'uqnxczhpexp14jsl';
   private $password = getenv('DB_PW');
    private $conn;


    //DB Connet 

    public function connect(){
        $this->conn = null;

        try {

            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, 
            $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){

            echo 'Connection Error : '. $e->getMessage();

        }

        return $this->conn;

    }
}