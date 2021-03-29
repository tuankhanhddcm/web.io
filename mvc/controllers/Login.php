<?php
class Login extends Controller
{

    public $Usermodel;

    public function __construct()
    {
        $this->Usermodel = $this->model('Usermodel');
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
    
}
