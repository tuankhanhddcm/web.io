<?php
    class Detail extends Controller{

        public $sanpham;
        public $thongsokythuat;
        public $Nhasanxuat;
        public $danhmuc;

        public function __construct(){
            $this->sanpham = $this->model("sanpham");
            $this->Nhasanxuat = $this->model("Nhasanxuat");
            $this->danhmuc = $this->model("Danhmucmodel");
            $this->thongsokythuat =$this->model(("Thongsokythuat"));
        }


        public function trangchu(){

            //model
            $tensp = substr($_GET['url'] ,strpos($_GET['url'],"/")+1);
            $sptheoloai = $this->sanpham->sptheoloai("sp_url",$tensp);
            $ma_sp = $this->sanpham->get_sp_byId("sp_ma","sp_url",$tensp);
            $ma_nsx = $this->sanpham->get_sp_byId("ma_nsx","sp_url",$tensp);
            $thongso = $this->thongsokythuat->get_thongso_byId("ma_sp",$ma_sp["sp_ma"]);
            $nsx = $this->Nhasanxuat->get_nsx_byId("ten_nsx","ma_nsx",$ma_nsx['ma_nsx']);
            //view
            $this->view('index',[
                "page" =>"chitietsanpham",
                "sanpham" => $sptheoloai,
                "thongso" =>$thongso,
                "nsx" => $nsx['ten_nsx'],
            ]);
            
        }

       
    }
?>