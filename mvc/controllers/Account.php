<?php
class Account extends Controller
{

    public $Usermodel;

    public function __construct()
    {
        $this->Usermodel = $this->model('Usermodel');
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
    
}
