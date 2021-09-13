<?php
    /**
     *
     */
    class DbConfig {

        private $conn;
        
        public function __construct() {
        }

        public function DB_CONNECT(){

            return $this->conn = new PDO("mysql:host=localhost;dbname=harmel","root","norsuadmin18");
           
        }
        

    }
    
?>