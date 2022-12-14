<?php

// We made this class as a singleton class according to the singleton design pattern


  final class DBConnectionManager{

        public static $instance = null;

        private $conn;
		private $host;
		private $user;
		private $password;
		private $dbname;
       // private $port;

        private function __construct(){
            $config = simplexml_load_file(dirname(__DIR__).'/config.xml');           

			$this->host = $config->database->host;

            // Instead of storing the user in the XML file
            // which is less secure we could store the user and passowrd 
            // in an environment variable
            // and then read it in this code
			$this->user = $config->database->user;

            // In the command prompt of Windows set an environment vairable
            // c:/>set mvcuser=root
            // Then in PHP you read the environment variable:

           // $this->user = getenv("mvcuser");
			$this->password = $config->database->password;
			$this->dbname = $config->database->dbname;
           // $this->port = $config->database->port;
            
        }

        function getConnection(){

            // We will use the PDO PHP library to onnect to the database
            try{
               // $this->conn = new PDO("mysql:host=".$this->host.";port=".$this->port.";dbname=".$this->dbname,$this->user,$this->password);
				$this->conn = new PDO("mysql:host=".";dbname=".$this->dbname,$this->user,$this->password);
				
			} catch(PDOException $exception){
				
                echo "Database Connection error: " . $exception->getMessage();
               
           }         

           return $this->conn;

        }

        public static function getInstance(){

            if(is_null(Self::$instance))
                Self::$instance = new DBConnectionManager();

            return Self::$instance;
        }

    }

?>