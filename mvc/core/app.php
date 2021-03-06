<?php 
    class App {
        protected $controller ="Home";
        protected $action ="trangchu";
        protected $thamso =[];

        function __construct(){
            $mang = $this->xulyUrl();
            //controller
            if(!empty($mang)){
                if(file_exists("./mvc/controllers/".$mang[0].".php")){
                    $this->controller = $mang[0];
                    unset($mang[0]);
                }
            }
            require_once "./mvc/controllers/".$this->controller.".php";
            $this->controller = new $this->controller;

            //action
            if(isset($mang[1])){
                if(method_exists($this->controller, $mang[1])){
                    $this->action = $mang[1];
                }
                unset($mang[1]);
            }

            //thamso
            $this->thamso= $mang?array_values($mang) : [];

            call_user_func_array([$this->controller,$this->action],$this->thamso);
        }
        function xulyUrl(){
            if(isset($_GET['url'])){
                return explode("/",filter_var(trim($_GET['url'],"/")));
            }
        }
    }
?>