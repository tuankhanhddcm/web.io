<?php 
    class Home extends Controller {
        public $sanpham;
        public function __construct(){
            $this->sanpham = $this->model("sanpham");
            $this ->danhmuc = $this ->model("Danhmucmodel");
            
        }

        public function trangchu(){
            $sp = $this->sanpham->getSP();
            $sp_sale = $this->sanpham->getSP(['*'],[],1000);
            $row = $this->sanpham->num_rows();
            $row = $row-count($sp);
            $this->view("index",[
                "page" =>"home",
                "sanpham" => $sp,
                "loaisp" =>$this->danhmuc->getloaisp(),
                "conlai" => $row,
                "sp_sale" =>$sp_sale
            ]);
            
        }

        public function tim_kiem(){
            $sort ='';
            $banchay ='';
            if(isset($_POST['input-search']) && $_POST['input-search'] !==' '){
                $text =$_POST['input-search'];
                $_SESSION['search'] =$text;
            }
            $row = $this->sanpham->search_home($text,1000,$sort,$banchay);
            $sp = $this->sanpham->search_home($text,1000,$sort,$banchay);
            $sl = count($sp);
            $count = 0;
            if (!empty($row)) {
                $rows = count($row);
                if ($rows > count($sp)) {
                    $count = $rows - count($sp);
                }
            }
            $this->view('index',[
                    'page' =>'search',
                    'sanpham' =>$sp,
                    'ketqua' =>$sl,
                    "loaisp" =>$this->danhmuc->getloaisp(),
                    "sl" =>$count
                ]);
            
            
        }
    }
