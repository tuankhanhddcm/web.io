<?php 

    class Admin extends Controller {
        public $sanpham;
        public $Danhmuc;
        public $Nhasanxuat;

        public function __construct()
        {
            $this->sanpham = $this->model('sanpham');
            $this->Danhmuc = $this->model("Danhmucmodel");
            $this->Nhasanxuat = $this->model("Nhasanxuat");
        }

        public function trangchu(){
            $this->view('admin',[
                "page" =>'home',
            ]);
        }

        public function list_sp(){
            $sp = $this->sanpham->list_product('','','',10);
            $loai = $this->Danhmuc->getloaisp();
            $nsx = $this->Nhasanxuat->select_all_nsx();
            $this->view('admin',[
                "page" =>'list_product',
                "sanpham" =>$sp,
                "loai" =>$loai,
                "nsx" =>$nsx
            ]);
        }

        public function create_sp(){
            $loai = $this->Danhmuc->getloaisp();
            $nsx = $this->Nhasanxuat->select_all_nsx();
            $this->view("admin",[
                "page" =>"insert_product",
                "loai" =>$loai,
                "nsx" =>$nsx    
            ]);
        }
    }
?>