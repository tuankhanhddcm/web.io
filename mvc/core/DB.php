<?php 
    class DB{
        public $conn;
        protected $servername = "localhost";
        protected $username ="root";
        protected $pass = "";
        protected $dbname = "";
    
        function __construct(){
            $this->conn = mysqli_connect($this->servername,$this->username,$this->pass);
            mysqli_select_db($this->conn,$this->dbname);
            mysqli_query($this->conn,"SET NAMES 'utf8'");
        }
    }
  
?>