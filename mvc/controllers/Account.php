<?php
class Account extends Controller
{

    public $Usermodel;
    public $Hoadon;


    public function __construct()
    {
        if(!isset($_SESSION['user']) && empty($_SESSION['user'])){
            header('location: http://localhost/web_mvc');
        }else{

            $this->Usermodel = $this->model('Usermodel');
            $this->Hoadon = $this->model("Hoadon");
        }
        
    }


    public function trangchu(){
        $this->view('index',[
            "page" => "account",
            "layout" =>"user_info"
        ]);
    }
    
    public function history(){
        $this->view('index',[
            "page" => "account",
            "layout" =>"history"
        ]);
    }

    public function change(){
        $this->view('index',[
            "page" => "account",
            "layout" =>"change_pass"
        ]);
    }

    // public function diachi(){
    //     $this->view('index',[
    //         "page" => "account",
    //         "layout" =>"diachi"
    //     ]);
    // }
    
    public function set_name(){
        if(isset($_POST['hoten']) && !empty($_POST['hoten'])){
            $hoten = $_POST['hoten'];
            $kq = $this->Usermodel->update_name($_SESSION['user']['username'],$hoten);
            if($kq=='true'){
                $_SESSION['user']['ho_ten'] = $hoten;
            }
        }
        echo $kq;

    }

    public function set_pass(){
        if(!empty($_POST['old_pass']) && !empty($_POST['new_pass']) &&!empty($_POST['new_pass_again'])){
            $old_pass = $_POST['old_pass'];
            $new_pass = $_POST['new_pass'];
            $new_pass_again =$_POST['new_pass_again'];
            if($new_pass ==$new_pass_again){
                $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
                if (password_verify($old_pass, $_SESSION['user']['password'])) {
                    $output ='true';
                    $kq = $this->Usermodel->update_pass($_SESSION['user']['username'],$new_pass);
                    if($kq == 'true'){
                        $_SESSION['user']['password'] = $new_pass;
                        $output ='true';
                    }else{
                        $output ='false';
                    }
                }else{
                    $output ='false';
                }
            }
            echo $output;
        }

    }

    public function oders($ma_hd){
        if($ma_hd !='' && isset($_SESSION['user']) && !empty($_SESSION['user'])){
            $user = $_SESSION['user']['username'];
            $hd = $this->Hoadon->select_hd_user($user,0,0,$ma_hd);
            $hd_detail = $this->Hoadon->select_oders_detail($user,$ma_hd);
            if($hd !=''){
                $this->view('index',[
                    'page' =>'account',
                    'layout' => 'detail_history',
                    'hd' =>$hd,
                    'hd_detail' => $hd_detail
                ]);
            }
           
        }
    }

}
