<?php 

    class Admin extends Controller {
        public $sanpham;
        public $Danhmuc;
        public $Nhasanxuat;
        public $Hoadon;

        public function __construct()
        {
            $this->sanpham = $this->model('sanpham');
            $this->Danhmuc = $this->model("Danhmucmodel");
            $this->Nhasanxuat = $this->model("Nhasanxuat");
            $this->Hoadon = $this->model('Hoadon');
        }

        public function trangchu(){
            $date = date('Y-m-d', time());
            $newdate = date('Y-m-d', strtotime('+1 day', strtotime($date)));
            $olddate = date('Y-m-d', strtotime('-1 day', strtotime($date)));
            $count_hd = count($this->Hoadon->hd_theo_ngay($date,$newdate));
            $tongsp=0;
            foreach($this->Hoadon->hd_theo_ngay($date,$newdate,0,0,'chitiethoadon') as $val){
                $tongsp += $val['soluong'];

            }
            $total= 0;
            foreach($this->Hoadon->hd_theo_ngay($date,$newdate) as $val){
                $total +=$val['total_money'];
            }
            $old_total = 0;
            foreach($this->Hoadon->hd_theo_ngay($olddate,$date) as $val){
                $old_total +=$val['total_money'];
            }

            if($total > $old_total){
                $sum ='+'.round((float)(($total - $old_total)/$total*100),0);
            }else{
                $sum ='-'.round((float)(($old_total - $total)/$old_total*100),0);
            }
            $this->view('admin',[
                "page" =>'home',
                "so_hd" =>$count_hd,
                "so_sp" =>$tongsp,
                "sum" =>$sum,
                "total" => $total

            ]);
        }

        public function list_sp(){
            $loai = $this->Danhmuc->getloaisp();
            $nsx = $this->Nhasanxuat->select_all_nsx();
            unset($_SESSION['tskt']);
            unset($_SESSION['tskt_sp']);
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
            unset($_SESSION['tskt_sp']);
            $this->view("admin",[
                "page" =>"update_product",
                "sp" =>$sanpham,
                "loai" =>$loai,
                "nsx" =>$nsx,
            ]);
        }

        public function detail_sp($ma){
            $sanpham = $this->sanpham->sptheoloai("sp_ma",$ma);
            $tskt = $this->sanpham->sptheotskt("sp_ma",$ma);
            $_SESSION['tskt_sp']=$tskt;
            unset($_SESSION['tskt']);
            $this->view("admin",[
                "page" =>"detail_product",
                "sp" =>$sanpham,
            ]);
        }


    }
?>