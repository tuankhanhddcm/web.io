<?php
class Payment extends Controller
{

    public  $Usermoder;
    public  $Hoadon;
    public $Sanpham;
    public $Diachi;

    public function __construct()
    {
      
            $this->Usermoder = $this->model("Usermodel");
            $this->Hoadon = $this->model("Hoadon");
            $this->Sanpham = $this->model("sanpham");
            $this->Diachi = $this->model('Diachi');
        
    }

    public function trangchu()
    {
        if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
            header("location: http://localhost/web_mvc/");
        } else {
        $tinh = $this->Diachi->select_tinh('province');
        $dist = $this->Diachi->select_tinh('district');
        $ward = $this->Diachi->select_tinh('ward');
        $street = $this->Diachi->select_tinh('street');

        $dc = explode(",", $_SESSION['user']['diachi']);

        $this->view('index', [
            "page" => "thanhtoan",
            'tinh' => $tinh,
            'dist' => $dist,
            'ward' => $ward,
            "street" => $street,
            "dc" => $dc,
        ]);
        }
    }

    public function checkuser_status()
    {
        if (!isset($_SESSION['user'])) {
            $kq = "false";
        } else {
            $kq = "true";
        }
        echo ($kq);
    }

    public function thanhtoan()
    {
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            unset($_SESSION['hd_detail']); 
            unset($_SESSION['mahd']);
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $updated = date("Y-m-d H:i:s", time());
            $date = date("Y-m-d H:i:s", time());
            if (isset($_POST['hoten']) && isset($_POST['email']) && isset($_POST['sdt']) && isset($_POST['note']) && isset($_POST['total']) && isset($_POST['diachi'])) {
                if (empty($_POST['hoten']) && empty($_POST['email']) && empty($_POST['diachi'])) {
                    $hoten = $_SESSION['user']['ho_ten'];
                    $email = $_SESSION['user']['email'];
                } else {
                    $hoten = $_POST['hoten'];
                    $diachi = $_POST['diachi'];
                    $_SESSION['user']['ho_ten'] = $hoten;
                    $email = $_POST['email'];
                    $_SESSION ['user']['email'] =$email;
                    $_SESSION['user']['diachi'] = $diachi;
                }
                $note = $_POST['note'];
                $user =  $_SESSION['user']['username'];
                $sdt = $_SESSION['user']['sdt'];
                $pass = $_SESSION['user']['password'];
                $avatar = $_SESSION['user']['avatar'];
                $total = $_POST['total'];
                $kq = $this->Usermoder->update_user($user, $pass, $hoten, $sdt, $email, $diachi, $avatar, $updated);
                if ($kq == 'true') {
                    $row = $this->Hoadon->num_rows();
                    $max_id = $this->Hoadon->max_id('hoadon', 'ma_hd', 'HD');
                    if ($max_id !== null) {
                        $id = (int)(str_replace('HD', '', $max_id['ma_hd'])) + 1;
                    } else {
                        $id = $row + 1;
                    }

                    if ($id < 10) {
                        $mahd = 'HD00000' . ($id);
                    } else if ($id < 100) {
                        $mahd = 'HD0000' . ($id);
                    } else if ($id < 1000) {
                        $mahd = 'HD000' . ($id);
                    } else if ($id < 10000) {
                        $mahd = 'HD00' . ($id);
                    } else if ($id < 100000) {
                        $mahd = 'HD0' . ($id);
                    } else if ($id < 1000000) {
                        $mahd = 'HD' . ($id);
                    }
                    $res = $this->Hoadon->insert_hd($mahd, $user, $date, $total, $note, $updated);
                    if ($res == 'true') {
                        foreach ($_SESSION['cart'] as $k => $v) {
                            $sp = $this->Sanpham->find_sp_byID('sp_ma', $k);
                            if ($sp) {
                                $update_sl = $sp[0]['sp_sl'] - (int)$v['soluongdat'];
                                $this->Sanpham->update_sl($k, $update_sl);
                            }
                            $sl = $v['soluongdat'];
                            $gia = $v['sp_giaban'];
                            $kq_detail = $this->Hoadon->insert_detail($mahd, $k, $sl, $gia, $updated);
                        }
                        if ($kq_detail == 'true') {
                            unset($_SESSION['cart']);
                        }
                    }
                    $detail = $this->Hoadon->select_hd_detail($mahd);
                    $_SESSION['hd_detail'] = $detail;
                    $_SESSION['mahd'] = $mahd;
                   
                   
                }
            }
        }
    }

    public function camon()
    {
        $this->view('index', [
            'page' => 'thank'
        ]);
    }


    public function district()
    {
        if (isset($_POST['provi']) && !empty($_POST['provi'])) {
            $kq = $this->Diachi->select_district($_POST['provi']);
            if ($kq) {
                $out = "";
                foreach ($kq as $val) {
                    $out .= "<option id=" . $val['id'] . " value=" . $val['id'] . "  >" . $val['_prefix'] . " " . $val['_name'] . "</option>";
                }
                echo $out;
            }
        }
    }
    public function ward()
    {
        if (isset($_POST['dis']) && !empty($_POST['dis'])) {
            $kq = $this->Diachi->select_ward($_POST['dis']);
            if ($kq) {
                $out = "";
                foreach ($kq as $val) {
                    $out .= "<option id=" . $val['id'] . " value=" . $val['id'] . "  >" . $val['_prefix'] . " " . $val['_name'] . "</option>";
                }
                echo $out;
            }
        }
    }
    public function street()
    {
        if (isset($_POST['dis']) && !empty($_POST['dis'])) {
            $kq = $this->Diachi->select_street($_POST['dis']);
            if ($kq) {
                $out = "";
                foreach ($kq as $val) {
                    $out .= "<option id=" . $val['id'] . " value=" . $val['id'] . "  >" . $val['_prefix'] . " " . $val['_name'] . "</option>";
                }
                echo $out;
            }
        }
    }
}
