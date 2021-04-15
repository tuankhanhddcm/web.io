<?php 
    class Home extends Controller {
        public $sanpham;
        public function __construct(){
            $this->sanpham = $this->model("sanpham");
            $this ->danhmuc = $this ->model("Danhmucmodel");
            
        }

        public function trangchu(){
            $sp = $this->sanpham->getSP();
            $row = $this->sanpham->num_rows();
            $row = $row-count($sp);
            $this->view("index",[
                "page" =>"home",
                "sanpham" => $sp,
                "loaisp" =>$this->danhmuc->getloaisp(),
                "conlai" => $row
            ]);
            
        }

        public function tim_kiem(){
            $sort ='';
            $banchay ='';
            if(isset($_POST['input-search']) && $_POST['input-search'] !==' '){
                $text =$_POST['input-search'];
                $_SESSION['search'] =$text;
            }
            $sp = $this->sanpham->search_home($text,20,$sort,$banchay);
            $sl = count($sp);
            $this->view('index',[
                    'page' =>'search',
                    'sanpham' =>$sp,
                    'ketqua' =>$sl,
                    "loaisp" =>$this->danhmuc->getloaisp()
                ]);
            
            
        }
    }
