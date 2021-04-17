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
            $ma_nsx = $this->sanpham->get_sp_byId("ma_nsx","sp_url",$tensp);
            $thongso = $this->thongsokythuat->get_thongso_byId($sptheoloai["sp_ma"]);
            $nsx = $this->Nhasanxuat->get_nsx_byId("ten_nsx","ma_nsx",$ma_nsx['ma_nsx']);

            if($sptheoloai['sp_giagiam'] >0){
                $gia= $sptheoloai['sp_giagiam'];
            }else {
                $gia= $sptheoloai['sp_giaban'];
            }
            $ma_sp =$sptheoloai['sp_ma'];
            $loai_sp = $sptheoloai['ma_loai'];
            $gia_end = $gia + 4000000;
            $sp_gia = $this->sanpham->sptheogia($gia,$gia_end,$loai_sp,$ma_sp);
            //xu ly mo ta san pham
            $mota = array_values(explode('.',$sptheoloai['sp_mota']));
            $cong_nghe = array_values(explode(',',$thongso['cong_nghe']));
            //view
            $this->view('index',[
                "page" =>"chitietsanpham",
                "sanpham" => $sptheoloai,
                "thongso" =>$thongso,
                "nsx" => $nsx['ten_nsx'],
                "sp_gia" => $sp_gia,
                "mota" =>$mota,
                "congnghe" =>$cong_nghe
            
            ]);
            
        }

       
    }
?>