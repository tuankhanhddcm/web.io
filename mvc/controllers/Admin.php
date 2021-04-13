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
            $loai = $this->Danhmuc->getloaisp();
            $nsx = $this->Nhasanxuat->select_all_nsx();
            $this->view('admin',[
                "page" =>'list_product',
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

        public function update_sp($ma){
            $sanpham = $this->sanpham->sptheoloai("sp_ma",$ma);
            $loai = $this->Danhmuc->getloaisp();
            $nsx = $this->Nhasanxuat->select_all_nsx();
            $tskt = $this->sanpham->sptheotskt("sp_ma",$ma);
            $_SESSION['tskt']=$tskt;
            $this->view("admin",[
                "page" =>"update_product",
                "sp" =>$sanpham,
                "loai" =>$loai,
                "nsx" =>$nsx,
            ]);
        }


        
    }
?>