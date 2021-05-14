<?php
class Ajax extends Controller
{

    public $sanpham;
    public $usermodel;
    public $Danhmuc;
    public $Nhasanxuat;
    public $Thongsokythuat;
    public $Hoadon;
    public $Coupon;

    public function __construct()
    {
        $this->sanpham = $this->model("sanpham");
        $this->usermodel = $this->model("Usermodel");
        $this->Danhmuc = $this->model("Danhmucmodel");
        $this->Nhasanxuat = $this->model("Nhasanxuat");
        $this->Thongsokythuat = $this->model("Thongsokythuat");
        $this->Hoadon = $this->model("Hoadon");
        $this->Coupon = $this->model("Coupon");
    }





    // loc san pham
    public function filter_data()
    {
        if (isset($_POST["action"])) {
            $nsx = [];
            $kich_co = [];
            $gia = [];
            $loai_sp = [];
            if (isset($_POST['ma_loai'])) {
                $ma_loai = $_POST['ma_loai'];
            }

            if (isset($_POST['nsx'])) {
                $nsx = $_POST['nsx'];
            }

            if (isset($_POST['kich_co'])) {
                $kich_co = $_POST['kich_co'];
            }

            if (isset($_POST['gia'])) {
                $gia = $_POST['gia'];
            }

            if (isset($_POST['loai_sp'])) {
                $loai_sp = $_POST['loai_sp'];
            }

            if (isset($_POST['kieu_tu']) && !empty($_POST['kieu_tu'])) {
                $loai_sp = $_POST['kieu_tu'];
            }
            if (isset($_POST['order'])) {

                if ($_POST['order'] == 'desc') {
                    $order = $_POST['order'];
                } else {
                    $order = $_POST['order'];
                }
            }
            $sl = 0;
            if ($_POST['sl'] > 0) {
                $sl = $_POST['sl'];
            }

            if ($_POST['limit'] > 0) {
                $limit = $_POST['limit'];
            }


            $data = $this->sanpham->filter_data($ma_loai, $gia, $nsx, $kich_co, $loai_sp, $order, $sl, $limit);
            $temp = $this->sanpham->filter_data($ma_loai, $gia, $nsx, $kich_co, $loai_sp, $order);
            $count = 0;
            if (!empty($temp)) {
                $row = count($temp);
                if ($row > count($data)) {
                    $count = $row - count($data);
                }
            }
            $ouput = "";
            if (!empty($data) && isset($data) && $data !== null) {
                foreach ($data as $row) {

                    $gia = number_format($row['sp_giaban']);

                    if ($row['sp_giagiam'] > 0) {
                        $giasale = number_format($row['sp_giagiam']);
                        $phantram = ($row['sp_giagiam'] / $row['sp_giaban'] - 1) * 100;
                        $ouput .= '
                        <div class="col-2-4 ">
                            <a class="card-item " href="http://localhost/web_mvc/Detail/' . $row['sp_url'] . '">
                                <div class="card-item__img">
                                    <img src="http://localhost/web_mvc/' . $row['sp_img'] . ' " class="card__img">
                                </div>
                                <div class="card__name">
                                    <span class="card__name-sp">' . $row['sp_name'] . '</span>
                                </div>
                                <div class="card__body">
                                    <strong class="card__price">' . $giasale . 'đ</strong>
                                    <strong class="card__oldprice">' . $gia . 'đ</strong>
                                    <span class="card__precent">' . round($phantram, 0) . '%</span>
                                </div>
                            </a>
                        </div>
                        ';
                    } else {
                        $ouput .= '
                        <div class="col-2-4 ">
                            <a class="card-item " href="http://localhost/web_mvc/Detail/' . $row['sp_url'] . '">
                                <div class="card-item__img">
                                    <img src="http://localhost/web_mvc/' . $row['sp_img'] . ' " class="card__img">
                                </div>
                                <div class="card__name">
                                    <span class="card__name-sp">' . $row['sp_name'] . '</span>
                                </div>
                                <div class="card__body">
                                    <strong class="card__price">' . $gia . 'đ</strong>
                                </div>
                            </a>
                        </div>
                        ';
                    }
                }
            } else {
                $ouput = '  <div class="danhmuc_rong ">
                                <h2 class="danhmuc-rong__text">Không có sản phẩm nào!!!</h2>
                            </div>';
            }

            $mang = [$count, $ouput];
            echo json_encode($mang);
        }
    }

    // lọc sản phẩm tìm kiếm
    public function filter_search()
    {
        $sort = '';
        $banchay = '';
        $text = '';
        if (isset($_SESSION['search']) && !empty($_SESSION['search'])) {
            $text = $_SESSION['search'];
        }
        if (isset($_POST['sort']) && !empty($_POST['sort'])) {
            $sort = $_POST['sort'];
        }
        // if (isset($_POST['banchay']) && !empty($_POST['banchay'])) {
        //     $banchay = $_POST['banchay'];
        // }
        if ($_POST['limit'] > 0) {
            $limit = $_POST['limit'];
        }

        $temp = $this->sanpham->search_home($text, 0, $sort, $banchay);
        $sp = $this->sanpham->search_home($text, $limit, $sort, $banchay);
        $count = 0;
        if (!empty($temp)) {
            $row = count($temp);
            if ($row > count($sp)) {
                $count = $row - count($sp);
            }
        }
        $ouput = "";
        if (!empty($sp) && isset($sp) && $sp !== null) {
            foreach ($sp as $row) {
                $gia = number_format($row['sp_giaban']);
                if ($row['sp_giagiam'] > 0) {
                    $giasale = number_format($row['sp_giagiam']);
                    $phantram = ($row['sp_giagiam'] / $row['sp_giaban'] - 1) * 100;
                    $ouput .= '
                        <div class="col-2-5 ">
                            <a class="card-item " href="http://localhost/web_mvc/Detail/' . $row['sp_url'] . '">
                                <div class="card-item__img">
                                    <img src="http://localhost/web_mvc/' . $row['sp_img'] . ' " class="card__img">
                                </div>
                                <div class="card__name">
                                    <span class="card__name-sp">' . $row['sp_name'] . '</span>
                                </div>
                                <div class="card__body">
                                    <strong class="card__price">' . $giasale . 'đ</strong>
                                    <strong class="card__oldprice">' . $gia . 'đ</strong>
                                    <span class="card__precent">' . round($phantram, 0) . '%</span>
                                </div>
                            </a>
                        </div>
                        ';
                } else {
                    $ouput .= '
                        <div class="col-2-5 ">
                            <a class="card-item " href="http://localhost/web_mvc/Detail/' . $row['sp_url'] . '">
                                <div class="card-item__img">
                                    <img src="http://localhost/web_mvc/' . $row['sp_img'] . ' " class="card__img">
                                </div>
                                <div class="card__name">
                                    <span class="card__name-sp">' . $row['sp_name'] . '</span>
                                </div>
                                <div class="card__body">
                                    <strong class="card__price">' . $gia . 'đ</strong>
                                </div>
                            </a>
                        </div>
                        ';
                }
            }
        } else {
            $ouput .= '
                <div class="danhmuc_rong ">
                    <h2 class="danhmuc-rong__text">Không có sản phẩm nào!!!</h2>
                </div>
                ';
        }

        $mang = [$count, $ouput];
        echo json_encode($mang);
    }


    public function sp_cart()
    {
        $ouput = '';
        $kq = "";
        if (!empty($_SESSION['cart'])) {
            $mang = [];
            foreach ($_SESSION["cart"] as  $val) {
                array_push($mang, $val);
            }
            if (count($mang) == 6) {
                $sp = range(1, 6);
            } elseif (count($mang) < 6) {
                $sp = range(1, count($mang));
            }

            for ($n = 0; $n < 6; $n++) {
                if (isset($mang[$n])) {
                    $sp[$n] = $mang[$n];
                }
            }
            $kq .= '
            <div class="header__cart-list cart" >
            <div class="header__cart-list--has-cart">
                <h4 class="header__cart-heading">Sản phẩm đã thêm</h4>
                <ul class="header__cart-list-item " id="sp_cart">
            ';
            foreach ($sp as $val) :
                if (count($sp) <= 6) {
                    if ($val['sp_giagiam'] > 0) {
                        $kq .= '  <li class="header__cart-item">
                                <a href="http://localhost/web_mvc/Detail/' . $val["sp_url"] . '" class="header__cart-item">
                                    <div class="header_img">
                                        <img src=" http://localhost/web_mvc/' . $val["sp_img"] . '" alt="" class="header__cart-img">
                                    </div>
                                    <div class="header__cart-item-info">
                                        <div class="header__cart-item-head">
                                            <h5 class="header__cart-item-name">' . $val["sp_name"] . '</h5>
                                            <div class="header__cart-item-price-wrap">
                                                <span class="header__cart-item-price">' . number_format($val["sp_giagiam"]) . 'đ</span>
                                                <span class="header__cart-item-nhan">x</span>
                                                <span class="header__cart-item-soluong">' . $val["soluongdat"] . '</span>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </a>
                            </li>';
                    } else {
                        $kq .= '  <li class="header__cart-item">
                                    <a href="http://localhost/web_mvc/Detail/' . $val["sp_url"] . '" class="header__cart-item">
                                        <div class="header_img">
                                            <img src=" http://localhost/web_mvc/' . $val["sp_img"] . '" alt="" class="header__cart-img">
                                        </div>
                                        <div class="header__cart-item-info">
                                            <div class="header__cart-item-head">
                                                <h5 class="header__cart-item-name">' . $val["sp_name"] . '</h5>
                                                <div class="header__cart-item-price-wrap">
                                                    <span class="header__cart-item-price">' . number_format($val["sp_giaban"]) . 'đ</span>
                                                    <span class="header__cart-item-nhan">x</span>
                                                    <span class="header__cart-item-soluong">' . $val["soluongdat"] . '</span>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </a>
                                </li>';
                    }
                }
            endforeach;
            $kq .= '
                        </ul>
                    <a href="http://localhost/web_mvc/cart" class="btn-cart btn-cart-them">Xem Giỏ Hàng</a>
                </div>
            </div>
            ';
        } else {
            $ouput = '
                <div class="header__cart-list header__cart-list--no-cart ">
                    <img src="http://localhost/web_mvc/public/img/cartempty.png" alt="" class="header__cart-no-cart-img">
                    <span class="header__cart-list-no-cart-msg ">Chưa có sản phẩm</span>
                </div>
            ';
        }
        echo json_encode([$ouput, $kq]);
    }

    public function sl_cart()
    {
        $sl = 0;
        if (isset($_SESSION["cart"]) && !empty($_SESSION['cart'])) {
            $sl = count($_SESSION['cart']);
        }
        echo $sl;
    }


    public function updatecart()
    {
        if ($_SESSION['cart'] && !empty($_SESSION['cart'])) {
            $tong = 0;
            $tt = 0;
            if (isset($_POST['id']) && isset($_POST['qty'])) {

                $qty = $_POST['qty'];
                foreach ($qty as $key => $val) {
                    $_SESSION['cart'][$key]['soluongdat'] = $val;
                    if ($_SESSION['cart'][$key]['sp_giagiam'] > 0) {
                        $tt += $_SESSION['cart'][$key]['soluongdat'] * $_SESSION['cart'][$key]['sp_giagiam'];
                    } else {
                        $tt += $_SESSION['cart'][$key]['soluongdat'] * $_SESSION['cart'][$key]['sp_giaban'];
                    }
                }
            }
            foreach ($_SESSION['cart'] as $val) {
                if ($_SESSION['cart'][$key]['sp_giagiam'] > 0) {
                    $tong += $val['soluongdat'] * $val["sp_giagiam"];
                } else {
                    $tong += $val['soluongdat'] * $val["sp_giaban"];
                }
            }
            $val1 = number_format($tt) . 'đ';
            $val2 = number_format($tong) . 'đ';
            $mang = [$val1, $val2];
        }
        echo json_encode($mang);
    }




    //dang ky user
    public function dangky()
    {
        if (isset($_POST['dangky'])) {
            if (
                isset($_POST["hoten"]) && isset($_POST["username"]) && isset($_POST["email"]) &&
                isset($_POST["sdt"]) && isset($_POST["pass"]) && isset($_POST["pass_again"]) &&
                !empty($_POST["hoten"]) && !empty($_POST["username"]) && !empty($_POST["email"]) &&
                !empty($_POST["sdt"]) && !empty($_POST["pass"]) && !empty($_POST["pass_again"])
            ) {
                $hoten = $_POST["hoten"];
                $username = $_POST["username"];
                $email = $_POST["email"];
                $sdt = $_POST["sdt"];
                $pass = $_POST["pass"];
                $pass_again = $_POST["pass_again"];
                if ($pass_again == $pass) {
                    $pass = password_hash($pass, PASSWORD_DEFAULT);
                }

                $fb_id = null;
                $gg_id = null;
                $diachi = "";
                $avatar = "";
                $user_group_id = 1;
                $updated = date("Y-m-d H:i:s", time());
                $kq = $this->usermodel->inseruser($username, $pass, $hoten, $sdt, $email, $diachi, $fb_id, $gg_id, $avatar, $user_group_id, $updated);
                echo $kq;
            }
        }
    }

    public function check_user()
    {
        if (isset($_POST['username'])) {
            echo $this->usermodel->checkuser(($_POST['username']));
        }
    }
    public function check_name($table)
    {
        if (isset($_POST['name'])) {
            if ($table == 'danhmuc') {
                echo $this->Danhmuc->check_loai(($_POST['name']));
            }
            if ($table == 'nsx') {
                echo $this->Nhasanxuat->check_nsx(($_POST['name']));
            }
        }
    }

    public function check_sdt()
    {
        if (isset($_POST['sdt'])) {
            echo $this->usermodel->checksdt(($_POST['sdt']));
        }
    }

    public function login($id)
    {
        if (isset($_POST['user']) && isset($_POST['pass']) && !empty($_POST['user']) && !empty($_POST['pass'])) {
            $kq = $this->usermodel->check_login($_POST['user'], $id);
            $rs = '';
            $out = '';
            if ($kq != null) {
                $out = 'true';
                if (password_verify($_POST['pass'], $kq['password'])) {
                    if ($id == 1) {
                        $_SESSION['user'] = $kq;
                    } elseif ($id == 2) {
                        $_SESSION['admin'] = $kq;
                    }
                    $rs = 'true';
                } else {
                    $rs = 'false';
                }
            } else {
                $out = 'false';
            }
            echo json_encode([$out, $rs]);
        }
    }

    //  trên ajax
    public function search_product()
    {
        if (isset($_POST['text']) && !empty($_POST['text']) && $_POST['text'] != '') {
            $text = $_POST['text'];
            $kq = $this->sanpham->search($text);
            $out = "";
            if ($kq != null) {
                foreach ($kq as $val) {
                    if ($val['sp_giagiam'] > 0) {
                        $phantram = ($val['sp_giagiam'] / $val['sp_giaban'] - 1) * 100;
                        $out .= ' <li class="header__cart-item" style="padding-top: 15px;">
                                    <a href="http://localhost/web_mvc/Detail/' . $val['sp_url'] . '" class="header__cart-item">
                                        <div class="header__search--img">
                                            <img src="http://localhost/web_mvc/' . $val['sp_img'] . '" alt="" class="header__cart-img">
                                        </div>
                                        <div class="header__search-item-info">
                                            <div class="header__search--info">
                                                <h5 class="header__search-item-name">' . $val['sp_name'] . '</h5>
                                                <div class="header__search--price">
                                                    <span class="header__search-item-price">' . number_format($val["sp_giagiam"]) . 'đ</span>
                                                    <span class="header__search--price_sale ">' . number_format($val["sp_giaban"]) . 'đ</span>
                                                    <span class="header__search--percent_sale ">-' . round($phantram, 0) . '%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>';
                    } else {
                        $out .= ' <li class="header__cart-item" style="padding-top: 15px;">
                                    <a href="http://localhost/web_mvc/Detail/' . $val['sp_url'] . '" class="header__cart-item">
                                        <div class="header__search--img">
                                            <img src="http://localhost/web_mvc/' . $val['sp_img'] . '" alt="" class="header__cart-img">
                                        </div>
                                        <div class="header__search-item-info">
                                            <div class="header__search--info">
                                                <h5 class="header__search-item-name">' . $val['sp_name'] . '</h5>
                                                <div class="header__search--price">
                                                    <span class="header__search-item-price">' . number_format($val["sp_giaban"]) . 'đ</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>';
                    }
                }
            } else {
                $out .= ' <li class="header__cart-item" style="padding-top: 15px;">
                            <div class="danhmuc_rong ">
                                <h2 class="danhmuc-rong__text" style="margin:10px; font-size: 2.5rem;">Không tìm thấy sản phẩm nào!!!</h2>
                            </div>
                        </li>';
            }
            echo $out;
        }
    }

    // lọc sp của trang admin
    public function filter_admin()
    {
        $text = '';
        $ma_loai = '';
        $nsx = '';
        if (isset($_POST['text']) && !empty($_POST['text'])) {
            $text = $_POST['text'];
        }
        if (isset($_POST['ma_loai']) && !empty($_POST['ma_loai'])) {
            $ma_loai = $_POST['ma_loai'];
        }
        if (isset($_POST['nsx']) && !empty($_POST['nsx'])) {
            $nsx = $_POST['nsx'];
        }
        if (isset($_POST['trang']) && !empty($_POST['trang'])) {
            $page = 1;
            $limit = 8;
            if ($_POST['trang'] > 1) {
                $start = (($_POST['trang'] - 1) * $limit);
                $page = $_POST['trang'];
            } else {
                $start = 0;
            }
        }
        $sotrang = $this->sanpham->list_product($text, $ma_loai, $nsx);

        $kq = $this->sanpham->list_product($text, $ma_loai, $nsx, $start, $limit);
        $row = count($sotrang);
        $out = "";
        if ($kq) {
            foreach ($kq as $val) {
                $ma = $val['sp_ma'];
                $out .= '<tr class="body-table">
                                <td style="width: 50px;border-left: 1px solid rgba(0,0,0,.1);"><img src="http://localhost/web_mvc/' . $val["sp_img"] . '" alt="" style="width: 50px;min-height: 10px;"></td>
                                <td>' . $val["sp_ma"] . '</td>
                                <td><a href="http://localhost/web_mvc/Admin/detail_sp/' . $val['sp_ma'] . '" style="color: #357ebd;">' . $val["sp_name"] . '</a> </td>
                                <td style="text-align: center;">' . $val["sp_sl"] . '</td>
                                <td style="color: black;font-weight: 400;text-align: end;">' . number_format($val['sp_gia']) . 'đ</td>
                                <td style="color: black;font-weight: 400;text-align: end;">' . number_format($val['sp_giaban']) . 'đ</td>
                                <td>' . $val["ten_loai"] . '</td>
                                <td>' . $val["ten_nsx"] . '</td>
                                <td style="display: flex;align-items: center;justify-content: center;padding-top: 20px;border-right: none;">
                                    <a  style="display: block;padding-right: 10px;" href="http://localhost/web_mvc/Admin/update_sp/' . $ma . '" type="button" class=" btn-update"  title="Sửa"><i class="fa fa-pencil-square-o"></i></a>
                                    <button type="button" data-mydata="' . $val['sp_ma'] . '" class="btn-deletd"  id="' . $val['sp_ma'] . '" title="Xóa"><i class="bx bxs-trash"></i></button>
                                </td>
                            </tr>';
            }
            $out .= $this->_trang($row, $page, $limit, 9);
        } else {
            $out .= '<tr class="no_product" ><td  colspan="9">Không tìm thấy sản phẩm</td></tr>';
        }

        echo $out;
    }


    public function sp($method)
    {

        if (
            !empty($_POST['tensp']) && !empty($_POST['sl']) && !empty($_POST['gia']) && !empty($_POST['giaban'])
            && !empty($_POST['maloai']) && !empty($_POST['mansx'])
        ) {
            $tensp = $_POST['tensp'];
            $ma_loai = $_POST['maloai'];
            $ma_nsx = $_POST['mansx'];
            $sp_mota = $_POST['sp_mota'];
            $sl = $_POST['sl'];

            $gia = $_POST['gia'];
            $giaban = $_POST['giaban'];
            if (!empty($_POST['giagiam'])) {
                $giagiam = $_POST['giagiam'];
            } else {
                $giagiam = 0;
            }


            $sp_url = str_replace(' ', '-', $tensp);
            $updated = date("Y-m-d H:i:s", time());
            $row = $this->sanpham->num_rows();
            $max_id = $this->sanpham->max_id('sanpham', 'sp_ma', 'SP');
            if ($max_id !== null) {
                $id = (int)(str_replace('SP', '', $max_id['sp_ma'])) + 1;
            } else {
                $id = $row + 1;
            }
            if (!empty($_POST['ma_sp'])) {
                $masp = $_POST['ma_sp'];
            } elseif ($id < 10) {
                $masp = 'SP00000' . ($id);
            } else if ($id < 100) {
                $masp = 'SP0000' . ($id);
            } else if ($id < 1000) {
                $masp = 'SP000' . ($id);
            } else if ($id < 10000) {
                $masp = 'SP00' . ($id);
            } else if ($id < 100000) {
                $masp = 'SP0' . ($id);
            } else if ($id < 1000000) {
                $masp = 'SP' . ($id);
            }
            $img_sp = $this->sanpham->get_sp_byId("sp_img", 'sp_ma', $masp);
            if (!empty($_POST['img'])) {
                $img = $_POST['img'];
                $sp_img = "public/img/upload/" . $img;
            } elseif ($img_sp != '') {
                $sp_img = $img_sp['sp_img'];
            }

            if ($method == 'insert') {
                $kq = $this->sanpham->insert_product($masp, $tensp, $sl, $gia, $giaban, $giagiam, $sp_url, $sp_img, $sp_mota, $ma_loai, $ma_nsx, $updated);
            } elseif ($method == 'update') {
                $kq = $this->sanpham->update_product($masp, $tensp, $sl, $gia, $giaban, $giagiam, $sp_url, $sp_img, $sp_mota, $ma_loai, $ma_nsx, $updated);
            }
            echo $masp;
        }
    }

    public function upload_file($text)
    {
        if (isset($_FILES['file'])) {
            $file_type = explode('.', $_FILES['file']['name']);
            $path = $text;
            $file_type = $file_type[(count($file_type) - 1)];
            if ($file_type === 'jpg' || $file_type === 'png' || $file_type === 'gif' || $file_type === 'jfif' || $file_type === 'jpeg') {
                move_uploaded_file($_FILES['file']['tmp_name'], './public/img/' . $path . '/' . $_FILES['file']['name']);
            }
        }
    }

    public function insert_group($table)
    {
        if (!empty($_POST['ten']) && !empty($_POST['img'])) {
            $updated = date("Y-m-d H:i:s", time());
            $ten = $_POST['ten'];
            if ($table == 'danhmuc') {
                $img = 'public/img/danhmuc/' . $_POST['img'];
                $row = $this->Danhmuc->num_rows();
                $ma = $row + 1;
                $this->Danhmuc->insert_loai($ma, $ten, $img, $updated);
            }
            if ($table == "nsx") {
                $img = 'public/img/nsx/' . $_POST['img'];
                $row = $this->Nhasanxuat->num_rows();
                $ma = $row + 1;
                $this->Nhasanxuat->insert_nsx($ma, $ten, $img, $updated);
            }
        }
    }

    public function page($table, $limit)
    {
        if (isset($_POST['trang']) && !empty($_POST['trang'])) {
            $page = 1;
            $limit = $limit;
            if ($_POST['trang'] > 1) {
                $start = (($_POST['trang'] - 1) * $limit);
                $page = $_POST['trang'];
            } else {
                $start = 0;
            }
            $ouput = '';
            if ($table == 'nhasanxuat') {
                $row = $this->Nhasanxuat->num_rows();
                $kq = $this->Danhmuc->phan_trang($table, $start, $limit);
                if ($kq) {
                    foreach ($kq as $val) {
                        $ouput .= '
                        <tr>
                        <td class="text_td item_' . $val['ma_nsx'] . '" style=" padding-top: 15px;">' . $val['ten_nsx'] . '</td>
                        <td style="display: flex;align-items: center;justify-content: center;padding-top: 10px;border-right: none;">
                          <button type="button" class=" btn-update" title="Sửa"><i class="fa fa-pencil-square-o"></i></button>
                          <button type="button" class=" btn-deletd" title="Xóa"><i class="bx bxs-trash"></i></button>
                        </td>
                        </tr>
                        ';
                    }
                }
                $ouput .= $this->_trang($row, $page, $limit);
            }
            if ($table == "loaisanpham") {
                $row = $this->Danhmuc->num_rows();

                $kq = $this->Danhmuc->phan_trang($table, $start, $limit);
                if ($kq) {
                    foreach ($kq as $val) {
                        $ouput .= '
                        <tr>
                        <td class="text_td item_' . $val['ma_loai'] . '" style=" padding-top: 15px;">' . $val['ten_loai'] . '</td>
                        <td style="display: flex;align-items: center;justify-content: center;padding-top: 10px;border-right: none;">
                          <button type="button" class=" btn-update" title="Sửa"><i class="fa fa-pencil-square-o"></i></button>
                          <button type="button" class=" btn-deletd" title="Xóa"><i class="bx bxs-trash"></i></button>
                        </td>
                        </tr>
                        ';
                    }
                }
                $ouput .= $this->_trang($row, $page, $limit);
            }

            echo $ouput;
        }
    }


    public function _trang($row, $page, $limit, $colspan = 2)
    {
        $ouput = "";
        if ($row > 0) {
            $ouput = '
        <tr class="tr_oder">
                <td colspan="' . $colspan . '" style="border: none;">
            <div align="center">
            <ul class="pagination justify-content-end" style="margin-right: 30px">
            ';
            $total_links = ceil($row / $limit);
            $previous_link = '';
            $next_link = '';
            $page_link = '';

            if ($total_links > 3) {
                if ($page < 4) {
                    for ($count = 1; $count <4; $count++) {
                        $page_array[] = $count;
                    }

                    $page_array[] = '...';
                    $page_array[] = $total_links;
                } else {
                    $end_limit = $total_links - 3;
                    if ($page > $end_limit) {
                        $page_array[] = 1;
                        $page_array[] = '...';
                        for ($count = $end_limit + 1; $count <= $total_links; $count++) {
                            $page_array[] = $count;
                        }
                    } else {
                        $page_array[] = 1;
                        $page_array[] = '...';
                        for ($count = $page; $count <= $page + 1; $count++) {
                            $page_array[] = $count;
                        }

                        $page_array[] = '...';
                        $page_array[] = $total_links;
                    }
                }
            } else {
                for ($count = 1; $count <= $total_links; $count++) {
                    $page_array[] = $count;
                }
            }
            for ($count = 0; $count < count($page_array); $count++) {
                if ($page == $page_array[$count]) {
                    $page_link .= '
            <li class="page-item active">
            <a class="page-link" href="javascript:void(0)" data-page_number=' . $page . '>' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
            </li>
            ';
                    $previous_id = $page_array[$count] - 1;
                    if ($previous_id > 0) {
                        $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $previous_id . '">Quay lại</a></li>';
                    } else {
                        $previous_link = '
                <li class="page-item disabled">
                <a class="page-link" href="#">Quay lại</a>
                </li>
                ';
                    }
                    $next_id = $page_array[$count] + 1;
                    if ($next_id > $total_links) {
                        $next_link = '
                <li class="page-item disabled">
                <a class="page-link" href="#">Tiếp</a>
                </li> 
                ';
                    } else {
                        $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $next_id . '">Tiếp</a></li>';
                    }
                } else {
                    if ($page_array[$count] == '...') {
                        $page_link .= '
                <li class="page-item disabled">
                <a class="page-link" href="#">...</a>
                </li>
                ';
                    } else {
                        $page_link .= '
                <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $page_array[$count] . '">' . $page_array[$count] . '</a></li>
                ';
                    }
                }
            }
            $ouput .= $previous_link . $page_link . $next_link;
            $ouput .= '
                </ul>
            </div>
            
            </td>
            </tr>
            ';
        }
        return $ouput;
    }

    public function thongsokythuat()
    {
        if (isset($_POST['loaisp']) && !empty($_POST['loaisp'])) {
            switch ((int)$_POST['loaisp']) {
                case 1:
                    echo require_once "./mvc/views/layout/tskt_tv.php";
                    break;
                case 2:
                    echo require_once "./mvc/views/layout/tskt_maylanh.php";
                    break;
                case 3:
                    echo require_once "./mvc/views/layout/tskt_tulanh.php";
                    break;
                case 4:
                    echo require_once "./mvc/views/layout/tskt_loa.php";
                    break;
                case 5:
                    echo require_once "./mvc/views/layout/tskt_lonuong.php";
                    break;
                case 6:
                    echo require_once "./mvc/views/layout/tskt_maygiat.php";
                    break;
            }
        }
    }
    public function tskt($method)
    {
        $loai_sp = null;
        $kich_thuoc = null;
        $kl = null;
        $bh = null;
        $cong_nghe = null;
        $nam = null;
        $tien_ich = null;
        $cong_suat = null;
        $tv_ich = null;
        $phan_giai = null;
        $hdh = null;
        $ket_noi = null;
        $tv_loa = null;
        $kieu_tu = null;
        $so_canh = null;
        $dung_tich = null;
        $cn_kk = null;
        $chat_lieu = null;
        $noi_sx = null;
        $updated = date("Y-m-d H:i:s", time());
        if ($_POST['loai_sp'] !== '') {
            $loai_sp = $_POST['loai_sp'];
        }
        if ($_POST['kich_thuoc'] !== '') {
            $kich_thuoc = $_POST['kich_thuoc'];
        }
        if ($_POST['kl'] !== '') {
            $kl = $_POST['kl'];
        }
        if ($_POST['noi_sx'] !== '') {
            $noi_sx = $_POST['noi_sx'];
        }
        if ($_POST['bh'] !== '') {
            $bh = $_POST['bh'];
        }
        if ($_POST['cong_nghe'] !== '') {
            $cong_nghe = $_POST['cong_nghe'];
        }
        if ($_POST['nam'] !== '') {
            $nam = $_POST['nam'];
        }
        if ($_POST['tien_ich'] !== '') {
            $tien_ich = $_POST['tien_ich'];
        }
        if ($_POST['cong_suat'] !== '') {
            $cong_suat = $_POST['cong_suat'];
        }

        if ($_POST['tv_ich'] !== '') {
            $tv_ich = $_POST['tv_ich'];
        }

        if ($_POST['phan_giai'] !== '') {
            $phan_giai = $_POST['phan_giai'];
        }

        if ($_POST['hdh'] !== '') {
            $hdh = $_POST['hdh'];
        }

        if ($_POST['ket_noi'] !== '') {
            $ket_noi = $_POST['ket_noi'];
        }
        if ($_POST['tv_loa'] !== '') {
            $tv_loa = $_POST['tv_loa'];
        }
        if ($_POST['kieu_tu'] !== '') {
            $kieu_tu = $_POST['kieu_tu'];
        }
        if ($_POST['so_canh'] !== '') {
            $so_canh = $_POST['so_canh'];
        }
        if ($_POST['dung_tich'] !== '') {
            $dung_tich = $_POST['dung_tich'];
        }

        if ($_POST['cn_kk'] !== '') {
            $cn_kk = $_POST['cn_kk'];
        }

        if ($_POST['chat_lieu'] !== '') {
            $chat_lieu = $_POST['chat_lieu'];
        }

        if ($_POST['masp'] !== '') {
            $masp = $_POST['masp'];
            if ($method == 'insert') {
                $kq = $this->Thongsokythuat->_insert($masp, $kieu_tu, $so_canh, $dung_tich, $cong_nghe, $chat_lieu, $noi_sx, $nam, $loai_sp, $tv_ich, $phan_giai, $kich_thuoc, $tien_ich, $cn_kk, $ket_noi, $cong_suat, $tv_loa, $hdh, $kl, $bh, $updated);
            } elseif ($method == 'update') {
                $kq = $this->Thongsokythuat->_update($masp, $kieu_tu, $so_canh, $dung_tich, $cong_nghe, $chat_lieu, $noi_sx, $nam, $loai_sp, $tv_ich, $phan_giai, $kich_thuoc, $tien_ich, $cn_kk, $ket_noi, $cong_suat, $tv_loa, $hdh, $kl, $bh, $updated);
            }
        }
        echo $kq;
    }

    public function more_sp()
    {
        if (isset($_POST['limit']) && $_POST['limit'] != "") {
            $limit = $_POST['limit'];
        }

        $sp = $this->sanpham->getSP(['*'], [], $limit);
        $row = $this->sanpham->num_rows();
        $dem = (int)$row - count($sp);
        if (!empty($sp)) {
            $ouput = "";
            foreach ($sp as $row) {
                $giasale = number_format($row['sp_giaban'] - $row['sp_giaban'] * 0.2);
                $gia = number_format($row['sp_giaban']);
                if ($row['sp_giagiam'] > 0) {
                    $giasale = number_format($row['sp_giagiam']);
                    $phantram = ($row['sp_giagiam'] / $row['sp_giaban'] - 1) * 100;
                    $ouput .= '
                    <div class="col-sm-2 ">
                        <a class="card-item " href="http://localhost/web_mvc/Detail/' . $row['sp_url'] . '">
                            <div class="card-item__img">
                                <img src="http://localhost/web_mvc/' . $row['sp_img'] . ' " class="card__img">
                            </div>
                            <div class="card__name">
                                <span class="card__name-sp">' . $row['sp_name'] . '</span>
                            </div>
                            <div class="card__body">
                                <strong class="card__price">' . $giasale . 'đ</strong>
                                <strong class="card__oldprice">' . $gia . 'đ</strong>
                                <span class="card__precent">' . round($phantram, 0) . '%</span>
                            </div>
                        </a>
                    </div>
                    ';
                } else {
                    $ouput .= '
                    <div class="col-sm-2 ">
                        <a class="card-item " href="http://localhost/web_mvc/Detail/' . $row['sp_url'] . '">
                            <div class="card-item__img">
                                <img src="http://localhost/web_mvc/' . $row['sp_img'] . ' " class="card__img">
                            </div>
                            <div class="card__name">
                                <span class="card__name-sp">' . $row['sp_name'] . '</span>
                            </div>
                            <div class="card__body">
                                <strong class="card__price">' . $gia . 'đ</strong>
                            </div>
                        </a>
                    </div>
                    ';
                }
            }
        }
        $mang = [$dem, $ouput];
        echo json_encode($mang);
    }

    public function delete_sp($id)
    {
        $kq = $this->sanpham->delete($id);
        echo $kq;
    }


    // show hóa đơn user
    public function show_hd($limit)
    {
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            if (isset($_POST['trang']) && !empty($_POST['trang'])) {
                $page = 1;
                $limit = $limit;
                if ($_POST['trang'] > 1) {
                    $start = (($_POST['trang'] - 1) * $limit);
                    $page = $_POST['trang'];
                } else {
                    $start = 0;
                }
                $ouput = '';
                $row = count($this->Hoadon->select_hd_user($_SESSION['user']['username']));
                $hd = $this->Hoadon->select_hd_user($_SESSION['user']['username'], $start, $limit);

                if ($hd) {
                    foreach ($hd as $val) {
                        switch ($val["trangthai"]) {
                            case 0:
                                $text = "Chờ xác nhận";
                                $html = '<button class="btn_cus btn_huy" data-id="' . $val['ma_hd'] . '">Hủy đơn</button>';
                                $class = 'txt_wait';
                                break;
                            case 1:
                                $text = "Đã xác nhận";
                                $html = '<button class="btn_cus btn_huy" data-id="' . $val['ma_hd'] . '">Hủy đơn</button>';
                                $class = 'txt_check';
                                break;
                            case 2:
                                $text = "Đã giao hàng";
                                $html = '<span class="span_huy" style="color:#333">Không có yêu cầu</span>';
                                $class = 'txt_success';
                                break;
                            case 3:
                                $text = "Chờ xử lý";
                                $html = '<span class="span_huy">Đã gửi yêu cầu</span>';
                                $class = 'txt_wait';
                                break;
                            case 4:
                                $text = "Đơn hàng đã hủy";
                                $html = '<span class="span_huy">Đã xử lý yêu cầu</span>';
                                $class = 'txt_delete';
                                break;
                        }
                        $diachi = $val["khachhang"] == $_SESSION["user"]["username"] ? $_SESSION["user"]["diachi"] : "";
                        $ouput .= '
                        <tr>
                            <td >
                                <a href="http://localhost/web_mvc/Account/oders/' . $val['ma_hd'] . '">' . $val["ma_hd"] . '</a>
                            </td>
                            <td>' . $val["date"] . '</td>
                            <td>' . $diachi . '</td>
                            <td style="width: 120px;">' . number_format($val['total_money']) . ' đ</td>
                            <td style="width: 140px;"><span class="' . $class . ' txt_' . $val['ma_hd'] . ' ">' . $text . '</span></td>
                            <td style="width: 125px;" id="' . $val['ma_hd'] . '">
                                ' . $html . '
                            </td>
                        </tr>
                        ';
                    }
                    $ouput .= $this->_trang($row, $page, $limit, 6);
                } else {
                    $ouput .= '
                    <tr  class="no_product" >
                        <td colspan="9" style="text-align: center;">Không có đơn hàng nào !!!</td>
                    </tr>
                ';
                }

                echo $ouput;
            }
        }
    }
    public function show_hd_admin($limit)
    {
        if (isset($_POST['trang']) && !empty($_POST['trang'])) {
            $page = 1;
            $limit = $limit;
            if ($_POST['trang'] > 1) {
                $start = (($_POST['trang'] - 1) * $limit);
                $page = $_POST['trang'];
            } else {
                $start = 0;
            }
            $ouput = '';
            $date = date('Y-m-d', time());
            $newdate = date('Y-m-d', strtotime('+1 day', strtotime($date)));
            $row = count($this->Hoadon->hd_theo_ngay($date, $newdate));
            $hd = $this->Hoadon->hd_theo_ngay($date, $newdate, $start, $limit);
            if (!empty($hd)) {
                foreach ($hd as $val) {
                    $style = '';
                    switch ($val["trangthai"]) {

                        case 0:
                            $option = '
                            <select class=" select select-oders " data-id="' . $val['ma_hd'] . '"  data-dropup-auto="false" data-size="5" >
                            <option    selected value="0">Chờ xác nhận</option>
                            <option     value="1">Đã xác nhận</option>
                            <option    value="2">Đã giao hàng</option>
                            </select>
                            ';
                            $html = '<span class="span_huy" style="color:#333">Không có yêu cầu</span>';
                            break;
                        case 1:
                            $option = '
                                <select class=" select select-oders " data-id="' . $val['ma_hd'] . '"  data-dropup-auto="false" data-size="5" >
                                <option    value="0">Chờ xác nhận</option>
                                <option    selected value="1">Đã xác nhận</option>
                                <option    value="2">Đã giao hàng</option>
                                </select>';
                            $html = '<span class="span_huy" style="color:#333">Không có yêu cầu</span>';
                            break;
                        case 2:
                            $option = '
                                <select class=" select select-oders " data-id="' . $val['ma_hd'] . '"  data-dropup-auto="false" data-size="5" >
                                <option     value="0">Chờ xác nhận</option>
                                <option     value="1">Đã xác nhận</option>
                                <option     selected value="2">Đã giao hàng</option>
                                </select>';
                            $html = '<span class="span_huy" style="color:#333">Không có yêu cầu</span>';
                            break;
                        case 3:
                            $option = 'Yêu cầu hủy đơn';
                            $style = "color:red";
                            $html = '<button class="btn_cus btn_huy" data-id="' . $val['ma_hd'] . '" >Hủy đơn</button>';
                            break;
                        case 4:
                            $option = 'Đơn hàng đã hủy';
                            $style = "color:red";
                            $html = '<button class="btn_cus btn_delete" data-id="' . $val['ma_hd'] . '" >Xóa đơn</button>';
                            break;
                    }
                    $ouput .= '
                        <tr>
                            <td>
                                <button class="btn_cus btn-oders"   data-id="' . $val['ma_hd'] . '" data-toggle="modal" data-target="#detail_oder">' . $val["ma_hd"] . '</button>
                            </td>
                            <td>' . $val["khachhang"] . '</td>
                            <td>' . $val['email'] . '</td>
                            <td>' . $val['diachi'] . '</td>
                            <td>' . $val['sdt'] . '</td>
                            <td style="width: 120px;">' . number_format($val['total_money']) . ' đ</td>
                            <td style="width: 160px;">' . $val['date'] . '</td>
                            <td class="span_' . $val['ma_hd'] . '" style="width: 170px;font-weight:bold;' . $style . '">' . $option . '</td>
                            <td id="td_ad_' . $val['ma_hd'] . '" style="width: 120px;">
                                ' . $html . '
                            </td>
                        </tr>
                        ';
                }
                $ouput .= $this->_trang($row, $page, $limit, 9);
            } else {
                $ouput .= '
                        <tr  class="no_product">
                            <td colspan="9">Không có đơn hàng nào hôm nay !!!</td>
                        </tr>
                    ';
            }
            echo $ouput;
        }
    }

    public function filter_hd_ad($limit)
    {
        $search = '';
        $date = '';
        if (!empty($_POST['search'])) {
            $search = $_POST['search'];
        }
        if (!empty($_POST['date'])) {
            $date = $_POST['date'];
        }
        if (!empty($_POST['trang'])) {
            $page = 1;
            $limit = $limit;
            if ($_POST['trang'] > 1) {
                $start = (($_POST['trang'] - 1) * $limit);
                $page = $_POST['trang'];
            } else {
                $start = 0;
            }

            $ouput = '';
            $rows = $this->Hoadon->filter_hd($search, $date);
            if (!empty($rows)) {
                $row = count($rows);
            } else {
                $row = 0;
            }
            $hd = $this->Hoadon->filter_hd($search, $date, $start, $limit);

            if (!empty($hd)) {
                foreach ($hd as $val) {
                    $style = "";
                    switch ($val["trangthai"]) {
                        case 0:
                            $option = '
                            <select class=" select select-oders " data-id="' . $val['ma_hd'] . '"  data-dropup-auto="false" data-size="5" >
                            <option    selected value="0">Chờ xác nhận</option>
                            <option     value="1">Đã xác nhận</option>
                            <option    value="2">Đã giao hàng</option>
                            </select>
                            ';
                            $html = '<span class="span_huy" style="color:#333">Không có yêu cầu</span>';
                            break;
                        case 1:
                            $option = '
                                <select class=" select select-oders " data-id="' . $val['ma_hd'] . '"  data-dropup-auto="false" data-size="5" >
                                <option    value="0">Chờ xác nhận</option>
                                <option    selected value="1">Đã xác nhận</option>
                                <option    value="2">Đã giao hàng</option>
                                </select>';
                            $html = '<span class="span_huy" style="color:#333">Không có yêu cầu</span>';
                            break;
                        case 2:
                            $option = '
                                <select class=" select select-oders " data-id="' . $val['ma_hd'] . '"  data-dropup-auto="false" data-size="5" >
                                <option     value="0">Chờ xác nhận</option>
                                <option     value="1">Đã xác nhận</option>
                                <option     selected value="2">Đã giao hàng</option>
                                </select>';
                            $html = '<span class="span_huy" style="color:#333">Không có yêu cầu</span>';
                            break;
                        case 3:
                            $option = 'Yêu cầu hủy đơn';
                            $style = "color:red";
                            $html = '<button class="btn_cus btn_huy" data-id="' . $val['ma_hd'] . '" >Hủy đơn</button>';
                            break;
                        case 4:
                            $option = 'Đơn hàng đã hủy';
                            $style = "color:red";
                            $html = '<button class="btn_cus btn_delete" data-id="' . $val['ma_hd'] . '" >Xóa đơn</button>';
                            break;
                    }
                    $ouput .= '
                        <tr>
                            <td style="padding-top:12px">
                                <button class="btn_cus btn-oders"   data-id="' . $val['ma_hd'] . '" data-toggle="modal" data-target="#detail_oder">' . $val["ma_hd"] . '</button>
                            </td>
                            <td>' . $val["khachhang"] . '</td>
                            <td>' . $val['email'] . '</td>
                            <td>' . $val['diachi'] . '</td>
                            <td>' . $val['sdt'] . '</td>
                            <td style="width: 120px;">' . number_format($val['total_money']) . ' đ</td>
                            <td style="width: 160px;">' . $val['date'] . '</td>
                            <td class="span_' . $val['ma_hd'] . '" style="width: 170px; font-weight: bold;font-size: 1.45rem;' . $style . '">' . $option . '</td>
                            <td id="td_ad_' . $val['ma_hd'] . '" style="width: 120px;">
                                ' . $html . '
                            </td>
                        </tr>
                        ';
                }
                $ouput .= $this->_trang($row, $page, $limit, 9);
            } else {
                $ouput .= '
                        <tr  class="no_product">
                            <td colspan="9">Không có đơn hàng nào !!!</td>
                        </tr>
                    ';
            }
            echo $ouput;
        }
    }

    public function show_detail_ad()
    {
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $id = $_POST['id'];
            $hd_detail = $this->Hoadon->select_hd_detail($id);
            $ouput = '';
            if (!empty($hd_detail)) {
                foreach ($hd_detail as $val) {
                    if ($val['sp_giagiam'] > 0) {
                        $giagiam = number_format($val['sp_giaban'] - $val['sp_giagiam']);
                        $tong = number_format($val['sp_giagiam'] * $val['soluong']);
                    } else {
                        $giagiam = 0;
                        $tong = number_format($val['sp_giaban'] * $val['soluong']);
                    }
                    $ouput .= '
                    <tr>
                    <td style="width: 350px">
                        <div class="product-item">
                            <a href="" class="product-link">
                                <img src="http://localhost/web_mvc/' . $val['sp_img'] . '" alt="">
                                <div class="product-info">
                                    <p>' . $val['sp_name'] . '</p>
                                </div>
                            </a>
                        </div>
                    </td>
                    <td style="text-align: center;">' . $val['soluong'] . '</td>
                    <td>' . number_format($val['sp_giaban']) . ' đ</td>
                    <td>' . $giagiam . ' đ</td>
                    <td>' . $tong . ' đ</td>
                </tr>
                    ';
                }
            }
            echo $ouput;
        }
    }

    public function set_status()
    {
        if (isset($_POST['val'])  && isset($_POST['id'])) {
            $kq = $this->Hoadon->set_status_hd($_POST['val'], $_POST['id']);
            if (isset($_POST['dk']) && $_POST['dk'] != 0) {
                $kq = $this->Hoadon->set_delete_hd($_POST['id']);
            }

            if ($kq == 'true') {
                $ouput = '<span class="span_huy">Đã gửi yêu cầu</span>';
            }
            $mang = [$ouput, $kq];
            echo json_encode($mang);
        }
    }



    public function delete_hoadon()
    {
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $kq = $this->Hoadon->delete_hd($_POST['id']);
            echo $kq;
        }
    }


    public function search_user($limit)
    {
        $text = '';
        if (isset($_POST['text']) && !empty($_POST['text'])) {
            $text = $_POST['text'];
        }
        if (isset($_POST['trang'])) {
            $page = 1;
            $limit = $limit;
            if ($_POST['trang'] > 1) {
                $start = (($_POST['trang'] - 1) * $limit);
                $page = $_POST['trang'];
            } else {
                $start = 0;
            }
            $ouput = '';
            $temp = $this->usermodel->user_hd($text, "user");
            $user_hd = $this->usermodel->user_hd($text, "user", $start, $limit);
            $user = $this->usermodel->user_hd($text, "hoadon");
            if (!empty($temp)) {
                $row = count($temp);
            } else {
                $row = 0;
            }
            if (!empty($temp) && !empty($user_hd)) {

                if ($page > 1) {
                    $count = $limit + 1;
                } else {
                    $count = 1;
                }
                $mang = array();

                foreach ($user_hd as $v) {
                    $mang[$v['username']] = $v;
                    $mang[$v['username']]['total'] = 0;
                    $mang[$v['username']]['so_hd'] = 0;
                    if (!empty($user)) {
                        foreach ($user as $val) {

                            if ($v['username'] == $val['khachhang']) {

                                $mang[$v['username']]['total'] = $val['total'];
                                $mang[$v['username']]['so_hd'] = $val['so_hd'];
                                break;
                            }
                        }
                    }
                }
                foreach ($mang as $val) {
                    $ouput .= '
                                <tr>   
                                    <td >' . $count . '</td>
                                    <td ><a class="btn-user" data-user="' . $val['username'] . '" href="http://localhost/web_mvc/Admin/detail_user/' . $val['username'] . '" >' . $val["ho_ten"] . '</a> </td>
                                    <td >' . $val["username"] . '</td>
                                    <td >' . $val["sdt"] . '</td>
                                    <td >' . $val["email"] . '</td>
                                    <td  >' . $val["diachi"] . '</td>
                                    <td >' . $val["so_hd"] . '</td>
                                    <td >' . number_format($val["total"]) . ' đ</td>
                                
                                </tr>
        
                            ';
                    $count += 1;
                }
                $ouput .= $this->_trang($row, $page, $limit, 8);
            } else {
                $ouput .= '
                    <tr  class="no_product">
                        <td colspan="8">Không có khách hàng nào !!!</td>
                    </tr>
                    ';
            }

            echo $ouput;
        }
    }

    public function detail_khachhang($limit)
    {
        if (isset($_POST['trang'])) {
            $page = 1;
            $limit = $limit;
            if ($_POST['trang'] > 1) {
                $start = (($_POST['trang'] - 1) * $limit);
                $page = $_POST['trang'];
            } else {
                $start = 0;
            }
        }
        if (!empty($_POST['user_kh'])) {
            $user = $_POST['user_kh'];

            $temp = $this->Hoadon->select_hd_user($user);
            $kq = $this->Hoadon->select_hd_user($user, $start, $limit);
            if (!empty($temp)) {
                $row = count($temp);
            } else {
                $row = 0;
            }
            $ouput = '';
            if ($kq != null) {
                if ($page > 1) {
                    $count = $limit + 1;
                } else {
                    $count = 1;
                }
                foreach ($kq as $val) {
                    switch ($val["trangthai"]) {
                        case 0:
                            $text = "Chờ xác nhận";

                            $class = 'txt_wait';
                            break;
                        case 1:
                            $text = "Đã xác nhận";

                            $class = 'txt_check';
                            break;
                        case 2:
                            $text = "Đã giao hàng";

                            $class = 'txt_success';
                            break;
                        case 3:
                            $text = "Chờ xử lý";

                            $class = 'txt_wait';
                            break;
                        case 4:
                            $text = "Đơn hàng đã hủy";

                            $class = 'txt_delete';
                            break;
                    }
                    $ouput .= '
                        <tr> 
                            <td style ="text-align:center;padding-top:20px; font-size:1.6rem;font-weight:400;">' . $count . '</td>
                            <td style="padding-top:12px">
                                <button class="btn_cus btn-oders"   data-id="' . $val['ma_hd'] . '" data-toggle="modal" data-target="#detail_oder">' . $val["ma_hd"] . '</button>
                            </td>
                            <td style ="text-align:center;padding-top:20px; font-size:1.6rem;font-weight:400;">' . $val["date"] . '</td>
                            <td style ="text-align:center;padding-top:20px; font-size:1.6rem;font-weight:400;" >' . number_format($val["total_money"]) . ' đ</td>
                            <td style ="text-align:center;padding-top:20px; font-size:1.6rem;font-weight:400;" ><span class="' . $class . ' " >' . $text . '</span></td>
                        </tr>
        
                    ';
                    $count += 1;
                }
                $ouput .= $this->_trang($row, $page, $limit, 5);
            } else {
                $ouput .= '
                    <tr  class="no_product">
                        <td colspan="9">Không có đơn hàng nào !!!</td>
                    </tr>
                    ';
            }
            echo $ouput;
        }
    }

    public function doanhso($limit)
    {
        $from ='';
        $to ='';
        if (!empty($_POST['from']) && !empty($_POST['to'])) {
            $from = $_POST['from'];
            $to = $_POST['to'];
        }
        if (isset($_POST['trang'])) {
            $page = 1;
            if ($_POST['trang'] > 1) {
                $start = (($_POST['trang'] - 1) * $limit);
                $page = $_POST['trang'];
            } else {
                $start = 0;
            }
        }
        $temp = $this->Hoadon->doanh_so($from, $to);
        $ds = $this->Hoadon->doanh_so($from, $to, $start, $limit);
        if (!empty($temp)) {
            $row = count($temp);
        } else {
            $row = 0;
        }
        $output = '';
        $doanhso =0;
        $von = 0;
        $lai =0;
        $so_don =0;
        if (!empty($ds)) {
            
            $so_don =count($ds);
            foreach ($ds as $val) {
                if($val['trangthai']==2){
                    $text = "Đã giao hàng";
                }
                $doanhso +=$val['total_money'];
                $von +=$val['gia'];
                $loinhuan = $val['total_money']-$val['gia'];
                $lai +=$loinhuan;
                $output .= '
                    <tr>
                        <td style="padding-top:12px">
                            <button class="btn_cus btn-oders"   data-id="' . $val['ma_hd'] . '" data-toggle="modal" data-target="#detail_oder">' . $val["ma_hd"] . '</button>
                        </td>
                        <td style="padding-top:20px; font-size:1.6rem;font-weight:400;">' . $val["date"] . '</td>
                        <td style="padding-top:20px; font-size:1.6rem;font-weight:400;">' . $val['khachhang'] . '</td>
                        <td style="padding-top:20px; font-size:1.6rem;font-weight:400;text-align:center">' . $val['soluong'].'</td>
                        <td style="padding-top:20px; font-size:1.6rem;text-align:center;"><span style="background-color: #0B87C9;color: #fff;padding: 5px;border-radius: 4px;
                        font-weight: 600;">' . $text . '</span></td>
                        <td style="padding-top:20px; font-size:1.6rem;font-weight:400;text-align:center">' . number_format($val['total_money']). ' đ</td>
                        <td style="padding-top:20px; font-size:1.6rem;font-weight:400;text-align:center">' . number_format($val['gia']). ' đ</td>
                        <td style="padding-top:20px; font-size:1.6rem;font-weight:400;text-align:center">' . number_format($loinhuan). ' đ</td>
                    </tr>
                    ';
            }
            $output .=$this->_trang($row,$page,$limit,8);
            
        }else{
            $output .= '
                <tr  class="no_product">
                    <td colspan="8" style="font-size:1.6rem;font-weight:400;">Không có dữ liệu !!!</td>
                </tr>
            ';
        }
        
        echo json_encode(['html'=>$output,'so_don'=>$so_don,'doanhso'=>number_format($doanhso),'von'=>number_format($von),'loinhuan'=>number_format($lai)]);
    }

    public function coupon($limit){
        $text = '';
        $soluong = '';
        if (isset($_POST['text']) && !empty($_POST['text'])) {
            $text = $_POST['text'];
        }
        if (isset($_POST['sl']) && !empty($_POST['sl'])) {
            $soluong = $_POST['sl'];
        }
        if (isset($_POST['trang'])) {
            $page = 1;
            $limit = $limit;
            if ($_POST['trang'] > 1) {
                $start = (($_POST['trang'] - 1) * $limit);
                $page = $_POST['trang'];
            } else {
                $start = 0;
            }
            $ouput = '';
            $temp = $this->Coupon->select($text,$soluong,0,0 );
            $coupon = $this->Coupon->select($text, $soluong, $start, $limit);
            
            if (!empty($temp)) {
                $row = count($temp);
            } else {
                $row = 0;
            }
            if (!empty($temp) && !empty($coupon)) {

                if ($page > 1) {
                    $count = $limit + 1;
                } else {
                    $count = 1;
                }
                
                foreach ($coupon as $val) {
                    $ouput .= '
                                <tr style="text-align:center;">   
                                    <td >' . $count . '</td>
                                    <td >' . $val["ma_code"] . '</td>
                                    <td >' . $val["so_luong"] . '</td>
                                    <td >' . $val["phan_tram"] . '%</td>
                                    <td >' . $val["created"] . '</td>
                                    <td style="display: flex;align-items: center;justify-content: center;border-right: none;">
                                    <button type="button" data-mydata="' . $val['id'] . '" class="btn-deleted" title="Xóa"><i class="bx bxs-trash"></i></button>
                                </td>
                                </tr>
        
                            ';
                    $count += 1;
                }
                $ouput .= $this->_trang($row, $page, $limit, 6);
            } else {
                $ouput .= '
                    <tr  class="no_product">
                        <td colspan="8">Không có mã giảm giá nào !!!</td>
                    </tr>
                    ';
            }

            echo $ouput;
        }
    }

    public function insert_coupon(){
        if(isset($_POST['ma']) && isset($_POST['sl']) && isset($_POST['phan_tram'])){
            $ma = $_POST['ma'];
            $phantram = $_POST['phan_tram'];
            $sl = $_POST['sl'];
            $kq = $this->Coupon->insert($ma,$sl,$phantram);
            echo $kq;
        }
    }
    public function delete_coupon(){
        if(isset($_POST['id'])){
            $kq = $this->Coupon->delete($_POST['id']);
            echo $kq;
        }
    }

    public function check_coupon(){
        if(isset($_POST['ma'])){
            $ma = $_POST['ma'];
            $kq = $this->Coupon->check($ma);
            $_SESSION['code_sale'] =$kq[2];
            echo json_encode($kq);
            
        }
    }
    public function update_sl_coupon(){
        if(isset($_POST['ma']) && isset($_POST['sl'])){
            if($_SESSION['code'] != $_POST['ma']){
                $kq =$this->Coupon->update_sl($_POST['ma'],$_POST['sl']);
                $_SESSION['code']=$_POST['ma'];
            }
        }
    }
}
