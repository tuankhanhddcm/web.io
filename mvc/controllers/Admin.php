<?php

class Admin extends Controller
{
    public $sanpham;
    public $Danhmuc;
    public $Nhasanxuat;
    public $Hoadon;
    public $User;

    public function __construct()
    {

        if (!isset($_SESSION['admin']) || empty($_SESSION['admin'])) {
            header('location: http://localhost/web_mvc/login');
        } else {
            $this->sanpham = $this->model('sanpham');
            $this->Danhmuc = $this->model("Danhmucmodel");
            $this->Nhasanxuat = $this->model("Nhasanxuat");
            $this->Hoadon = $this->model('Hoadon');
            $this->User = $this->model('Usermodel');
        }
    }

    public function trangchu()
    {
        $date = date('Y-m-d', time());
        $newdate = date('Y-m-d', strtotime('+1 day', strtotime($date)));
        $olddate = date('Y-m-d', strtotime('-1 day', strtotime($date)));
        $count_hd = count($this->Hoadon->hd_theo_ngay($date, $newdate));
        $tongsp = 0;
        foreach ($this->Hoadon->hd_theo_ngay($date, $newdate, 0, 0, 'chitiethoadon') as $val) {
            $tongsp += $val['soluong'];
        }
        $total = 0;
        foreach ($this->Hoadon->hd_theo_ngay($date, $newdate) as $val) {
            $total += $val['total_money'];
        }

        $old_total = 0;
        foreach ($this->Hoadon->hd_theo_ngay($olddate, $date) as $val) {
            $old_total += $val['total_money'];
        }

        if ($total > $old_total) {
            $sum = '+' . round((float)(($total - $old_total) / $total * 100), 0);
        } else if ($old_total > $total) {
            $sum = '-' . round((float)(($old_total - $total) / $old_total * 100), 0);
        } else {
            $sum = 0;
        }
        $this->view('admin', [
            "page" => 'home',
            "so_hd" => $count_hd,
            "so_sp" => $tongsp,
            "sum" => $sum,
            "total" => $total

        ]);
    }

    public function list_sp()
    {
        $loai = $this->Danhmuc->getloaisp();
        $nsx = $this->Nhasanxuat->select_all_nsx();
        unset($_SESSION['tskt']);
        unset($_SESSION['tskt_sp']);
        $this->view('admin', [
            "page" => 'list_product',
            "loai" => $loai,
            "nsx" => $nsx
        ]);
    }

    public function create_sp()
    {
        $loai = $this->Danhmuc->getloaisp();
        $nsx = $this->Nhasanxuat->select_all_nsx();
        $this->view("admin", [
            "page" => "insert_product",
            "loai" => $loai,
            "nsx" => $nsx
        ]);
    }

    public function update_sp($ma)
    {
        $sanpham = $this->sanpham->sptheoloai("sp_ma", $ma);
        $loai = $this->Danhmuc->getloaisp();
        $nsx = $this->Nhasanxuat->select_all_nsx();
        $tskt = $this->sanpham->sptheotskt("sp_ma", $ma);
        $_SESSION['tskt'] = $tskt;
        unset($_SESSION['tskt_sp']);
        $this->view("admin", [
            "page" => "update_product",
            "sp" => $sanpham,
            "loai" => $loai,
            "nsx" => $nsx,
        ]);
    }

    public function detail_sp($ma)
    {
        $sanpham = $this->sanpham->sptheoloai("sp_ma", $ma);
        $tskt = $this->sanpham->sptheotskt("sp_ma", $ma);
        $_SESSION['tskt_sp'] = $tskt;
        unset($_SESSION['tskt']);
        $this->view("admin", [
            "page" => "detail_product",
            "sp" => $sanpham,
        ]);
    }

    public function oders()
    {
        $this->view('admin', [
            "page" => "oders",
        ]);
    }

    public function list_user()
    {
        $text = '';
        // $row = $this->User->sum_user_hd($text,"dem");
        $user = $this->User->user_hd($text);
        $this->view('admin', [
            "page" => "list_user",
            "user" => $user,

        ]);
    }

    public function detail_user($user)
    {
        if ($user != '') {
            $kq = $this->User->user_byID($user);
        }
        $this->view('admin', [
            "page" => "detail_user",
            "user" => $kq
        ]);
    }

    public function account(){
        $this->view("admin",[
            "page" =>"account"
        ]);
    }

    public function coupon(){
        $this->view("admin",[
            "page" =>"coupon"
        ]);
    }
    public function doanhso(){
        
        $this->view("admin",[
            "page" =>"doanhso"
        ]);
    }
    public function create_coupon(){
        
        $this->view("admin",[
            "page" =>"insert_coupon"
        ]);
    }
}
