<?php 

class Cart extends Controller{

    public $sanpham;

    public function __construct()
    {
        $this->sanpham =$this->model("sanpham");
    }

    public function trangchu(){
        $sp =[];
        if(isset($_SESSION["cart"])){
            $sp = $_SESSION["cart"];

        }
        
        $this->view('index',[
            "page" =>"cart",
            "sanpham" =>$sp,
        ]);
    }

    public function addcart(){
        if(isset($_POST["productID"]) && isset($_POST["soluong"])){
            $productID = $_POST["productID"];
            
            $product = $this->sanpham->get_sp_byId("*","sp_ma",$productID);
            if(empty($_SESSION["cart"]) || !array_key_exists($productID,$_SESSION["cart"])){

                $product["soluongdat"]= $_POST["soluong"];
                $_SESSION["cart"][$productID] = $product;
            }else{
                $product["soluongdat"] = $_SESSION["cart"][$productID]["soluongdat"] + $_POST["soluong"];
                $_SESSION["cart"][$productID] = $product;

            }
            $messenger = "true";
        } else{
            $messenger = "false";
        }
        echo $messenger;
        
    }

    public function delete_cart(){
        if(isset($_SESSION['cart'])&& !empty($_SESSION['cart'])){
            if(isset($_POST["btn_xoa"])){
                $id = $_POST["productID"];
                if(array_key_exists($id,$_SESSION['cart'])){
                    unset($_SESSION['cart'][$id]);
                }
                $url = "";
                
            }
        }
        header("location:http://localhost/web_mvc/cart ");
    }
}

?>