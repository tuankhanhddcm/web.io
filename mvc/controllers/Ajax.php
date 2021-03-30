<?php
    class Ajax extends Controller {

        public $sanpham;
        public $usermodel;

        public function __construct()
        {
            $this->sanpham = $this->model("sanpham");
            $this->usermodel= $this->model("Usermodel");
            
        }
        
           
        public function banchay(){
            if(isset($_POST['ma_loai'])){
                $ma_loai = $_POST['ma_loai'];
                $data = $this->sanpham->filter_banchay($ma_loai);
                $ouput ="";
                    if(!empty($data)){
                        foreach ($data as $row){
                            $giasale =number_format($row['sp_giaban'] - $row['sp_giaban'] * 0.2);
                            $gia =number_format($row['sp_giaban']);
                            $ouput .='
                            <div class="col-2-4 ">
                                <a class="card-item " href="../Detail/'.$row['sp_url'].'">
                                    <div class="card-item__img">
                                        <img src="http://localhost/web_mvc/'.$row['sp_img'].' " class="card__img">
                                    </div>
                                    <div class="card__name">
                                        <span class="card__name-sp">'.$row['sp_name'].'</span>
                                    </div>
                                    <div class="card__body">
                                        <strong class="card__price">'. $giasale.'đ</strong>
                                        <strong class="card__oldprice">'.$gia.'đ</strong>
                                        <span class="card__precent">-20%</span>
                                    </div>
                                </a>
                            </div>
                            ';   
                        }
                    }else {
                        $ouput ='   <div class="danhmuc_rong ">
                                        <h2 class="danhmuc-rong__text">Không có sản phẩm nào!!!</h2>
                                    </div>';
                    }
                    echo $ouput;
            }
        }


        // loc san pham
        public function filter_data(){
            if(isset($_POST["action"])){
                $nsx =[];
                $kich_co =[];
                $gia=[];
                if(isset($_POST['ma_loai'])){
                    $ma_loai =$_POST['ma_loai'];
                }
                if(isset($_POST['nsx'])){
                    $nsx=$_POST['nsx'];
                }
                if(isset($_POST['kich_co'])){
                    $kich_co=$_POST['kich_co'];
                }
                if(isset($_POST['gia'])){
                    $gia=$_POST['gia'];
                    
                }
                if(isset($_POST['order'])){
                   
                    if($_POST['order'] =='desc'){
                        $order = $_POST['order'];
                        
                    }else{
                        $order = $_POST['order'];
                    }
                    
                }

                $data = $this->sanpham->filter_data($ma_loai,$gia,$nsx,$kich_co,$order);
                $ouput ="";
                if(!empty($data) && isset($data) && $data !==null){
                    foreach ($data as $row){
                        $giasale =number_format($row['sp_giaban'] - $row['sp_giaban'] * 0.2);
                        $gia =number_format($row['sp_giaban']);
                        $ouput .='
                        <div class="col-2-4 ">
                            <a class="card-item " href="../Detail/'.$row['sp_url'].'">
                                <div class="card-item__img">
                                    <img src="http://localhost/web_mvc/'.$row['sp_img'].' " class="card__img">
                                </div>
                                <div class="card__name">
                                    <span class="card__name-sp">'.$row['sp_name'].'</span>
                                </div>
                                <div class="card__body">
                                    <strong class="card__price">'. $giasale.'đ</strong>
                                    <strong class="card__oldprice">'.$gia.'đ</strong>
                                    <span class="card__precent">-20%</span>
                                </div>
                            </a>
                        </div>
                        ';   
                    }
                }else {
                    $ouput ='   <div class="danhmuc_rong ">
                                    <h2 class="danhmuc-rong__text">Không có sản phẩm nào!!!</h2>
                                </div>';
                }
                echo $ouput;
            }
            
        }

        public function sp_cart(){
            if(isset($_SESSION["cart"])  && !empty($_SESSION['cart'])){
                $mang =[];
                foreach ($_SESSION["cart"] as  $val){
                    
                        array_push($mang , $val);
                }
                $sp =range(1,count($mang));
                for($n = 0; $n <6;$n++){
                   if(isset($mang[$n])){
                       $sp[$n] = $mang[$n];
                   }
                       
                }
            }
            $kq ="";
            foreach($sp as $val ):   
                $kq .='  <li class="header__cart-item">
                            <a href="http://localhost/web_mvc/Detail/'.$val["sp_url"] .'" class="header__cart-item">
                                <div class="header_img">
                                    <img src=" http://localhost/web_mvc/'.$val["sp_img"] .'" alt="" class="header__cart-img">
                                </div>
                                <div class="header__cart-item-info">
                                    <div class="header__cart-item-head">
                                        <h5 class="header__cart-item-name">'.$val["sp_name"] .'</h5>
                                        <div class="header__cart-item-price-wrap">
                                            <span class="header__cart-item-price">'.number_format($val["sp_giaban"]) .'đ</span>
                                            <span class="header__cart-item-nhan">x</span>
                                            <span class="header__cart-item-soluong">'.$val["soluongdat"] .'</span>
                                        </div>
                                    </div>
                                
                                </div>
                            </a>
                        </li>';      
                                
            endforeach;
            echo $kq;
        }
        
        public function sl_cart(){
            $sl = 0;
            if(isset($_SESSION["cart"]) && !empty($_SESSION['cart'])){
                $sl= count($_SESSION['cart']);
            }
            echo $sl;
        }
        

        public function updatecart(){
            if($_SESSION['cart'] && !empty($_SESSION['cart'])){
                $tong =0;
                $tt = 0;
                if(isset($_POST['id']) && isset($_POST['qty'])){
                    
                    $qty = $_POST['qty'];
                    foreach( $qty as $key => $val){
                            $_SESSION['cart'][$key]['soluongdat'] = $val;
                            $tt +=$_SESSION['cart'][$key]['soluongdat']*$_SESSION['cart'][$key]['sp_giaban'];
                    }   
                   
                }   
                foreach($_SESSION['cart'] as $val){
                    $tong += $val['soluongdat']*$val["sp_giaban"];
                }
                $val1 = number_format($tt).'đ';
                $val2 = number_format($tong).'đ';
                $mang= [$val1,$val2];
            }
            echo json_encode( $mang);
        }



        //dang ky user
        public function dangky(){
            if(isset($_POST['dangky'])){
                if(isset($_POST["hoten"]) && isset($_POST["username"])&& isset($_POST["email"]) &&
                    isset($_POST["sdt"]) && isset($_POST["pass"]) && isset($_POST["pass_again"])&&
                    !empty($_POST["hoten"]) && !empty($_POST["username"])&& !empty($_POST["email"]) &&
                    !empty($_POST["sdt"]) && !empty($_POST["pass"]) && !empty($_POST["pass_again"])){
                        $hoten = $_POST["hoten"];
                        $username = $_POST["username"];
                        $email = $_POST["email"];
                        $sdt = $_POST["sdt"];
                        $pass = $_POST["pass"];
                        $pass_again = $_POST["pass_again"];
                        if($pass_again == $pass){
                            $pass = password_hash($pass, PASSWORD_DEFAULT);
                        }

                        $fb_id = null;
                        $gg_id =null;
                        $diachi ="";
                        $avatar = "";
                        $user_group_id = 1;
                        $updated = date("Y-m-d H:i:s",time());
                        $kq = $this->usermodel->inseruser($username,$pass,$hoten,$sdt,$email,$diachi,$fb_id,$gg_id, $avatar, $user_group_id,$updated);
                        echo $kq;
                }
                
            }
        }

        public function check_user(){
            if(isset($_POST['username'])){
                echo $this->usermodel->checkuser(($_POST['username']));
            }
        }
        public function check_sdt(){
            if(isset($_POST['sdt'])){
                echo $this->usermodel->checksdt(($_POST['sdt']));
            }
        }

        public function login(){
            if(isset($_POST['user']) && isset($_POST['pass']) && !empty($_POST['user']) && !empty($_POST['pass'])){
                $kq = $this->usermodel->check_login($_POST['user']);
                $rs ='';
                $out ='';
                if($kq !=null){
                    $out = 'true';
                    if(password_verify($_POST['pass'],$kq['password'])){
                        $_SESSION['user'] = $kq;
                        $rs = 'true';
                    }else{
                        $rs ='false';
                    }
                    
                }else{
                    $out = 'false';
                }
                echo json_encode([$out,$rs]) ;
            }
        }


        public function search_product(){
            if(isset($_POST['text']) && !empty($_POST['text'])){
                $text =$_POST['text'];
                $kq = $this->sanpham->search($text);
                $out = "";
                if($kq){
                    foreach($kq as $val){
                        $out .=' <li class="header__cart-item" style="padding-top: 15px;">
                                    <a href="http://localhost/web_mvc/Detail/'.$val['sp_url'].'" class="header__cart-item">
                                        <div class="header__search--img">
                                            <img src="http://localhost/web_mvc/'.$val['sp_img'].'" alt="" class="header__cart-img">
                                        </div>
                                        <div class="header__search-item-info">
                                            <div class="header__search--info">
                                                <h5 class="header__search-item-name">'.$val['sp_name'].'</h5>
                                                <div class="header__search--price">
                                                    <span class="header__search-item-price">'.number_format($val["sp_giaban"]-$val["sp_giaban"]*0.2).'đ</span>
                                                    <span class="header__search--price_sale ">'.number_format($val["sp_giaban"]).'đ</span>
                                                    <span class="header__search--percent_sale ">-20%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>';
                    }
                    echo $out;
                }
            }
        }
}

?>