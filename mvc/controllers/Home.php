<?php 
    class Home extends Controller {
        public $sanpham;
        public function __construct(){
            $this->sanpham = $this->model("sanpham");
            $this ->danhmuc = $this ->model("Danhmucmodel");
            
        }

        public function trangchu(){
            $this->view("index",[
                "page" =>"home",
                "sanpham" =>$this->sanpham->getSP(),
                "loaisp" =>$this->danhmuc->getloaisp(),
            ]);
            
        }

        public function tim_kiem(){
            
        }
    }
?>