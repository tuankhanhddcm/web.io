<?php
class Login extends Controller
{

    public $Usermodel;

    public function __construct()
    {
        $this->Usermodel = $this->model('Usermodel');
    }

    public function trangchu(){
        $this->view("login", []);
    }

    public function logout(){
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
            $kq ='true';
        }else{
            $kq ='false';
        }
        echo $kq;
    }

    public function login()
    {
        $this->view("login", []);
    }

    public function logout_admin()
    {
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
            $kq = 'true';
        } else {
            $kq = 'false';
        }
        echo $kq;
    }

    public function user(){
        $this->view('index',[
            "page" => "account"
        ]);
    }
    
    
}
