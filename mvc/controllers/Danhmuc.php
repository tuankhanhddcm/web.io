<?php
    class Danhmuc extends Controller{

        public $sanpham;
        public $Nhasanxuat;

        public function __construct()
        {
            $this->sanpham= $this->model("sanpham");
            $this->Nhasanxuat = $this->model("Nhasanxuat");
            $this->danhmuc = $this->model("Danhmucmodel");
        }

        public function trangchu(){
            $ma_loai =substr($_GET['url'] ,strpos($_GET['url'],"/")+1);
            $tenloai = $this->danhmuc->gettenloai($ma_loai);
            $nsx = $this->Nhasanxuat->select_all_nsx();
            $sp = $this->sanpham->loc_sp("ma_loai",$ma_loai,"ma_nsx");
            
            // lọc loai san pham theo nha san xuat
            $mang =[];
            
            foreach ($sp as $v){
                foreach($nsx as $k){
                    if($v['ma_nsx']==$k["ma_nsx"]){
                        array_push($mang, $k);
                    }
                }
            }
         
            $this->view("index",[
                "page" => "danhmuc",
                "loaisp" => $tenloai,
                "ma_loai" => $ma_loai,
                "nsx" => $mang,
                
            ]);

        }

        

    }

?>