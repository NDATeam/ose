<?php
    session_start();

    class Database {
        
        private $host  = 'localhost';
        private $user  = 'root';
        private $password   = "";
        private $database  = "oes";
        
        private $conn;
        
        public function getConnection(){		
            $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database); 
            
            if($this->conn->connect_error){
                die("Error failed to connect to MySQL: " . $this->conn->connect_error);
            } else {
                return $this->conn;
            }
        }
    }
?>