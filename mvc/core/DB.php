<?php 
    class DB{
        public $conn;
        protected $servername = "localhost";
        protected $username ="root";
        protected $pass = "";
        protected $dbname = "banhang";
    
        function __construct(){
            $this->conn = mysqli_connect($this->servername,$this->username,$this->pass);
            mysqli_select_db($this->conn,$this->dbname);
            mysqli_query($this->conn,"SET NAMES 'utf8'");
        }

        public function _query($qr){
            $query = mysqli_query($this->conn,$qr);

            $mang = array();
            while ($row = mysqli_fetch_assoc($query)){
                $mang[] = $row;
            }
            return $mang;
        }

        public function num_row($table){
            $sql = "SELECT * from $table ";
            return mysqli_num_rows(mysqli_query($this->conn,$sql));
        }
        
        public function fristquery($qr){
            $query = mysqli_query($this->conn,$qr);
            return  mysqli_fetch_assoc($query);
        }

        public function selectall($table,$column = ['*'],$oderbys = [],$limit = 12){
            $columns = implode(",",$column);
            if(!empty($oderbys)){ 
                $oderby = implode(" ",$oderbys);
                $sql = "SELECT ${columns} from ${table} order by ${oderby} limit ${limit}";
            }else{ 
                $sql = "SELECT ${columns} from ${table}  limit ${limit}";
            }
            $query = $this->_query($sql);
            return $query ;

        }

        public function find($table,$columns, $id){
            if ($columns){
                $sql ="select * from ${table} where ${columns} = '${id}'";
            }
            $query = $this->_query($sql);
            return $query ;
        }

        public function get_col($table,$col,$columns, $id){
            if ($columns){
                $sql ="select $col from ${table} where ${columns} = '${id}'";
            }
            $query = $this->fristquery($sql);
            return $query ;
        }
        

        public function loc($table,$dk,$val,$column){
            $sql ="select $column from ${table} where ${dk} = '${val}' group by $column";
            $query = $this->_query($sql);
            return $query ;
        }
    }
  
?>