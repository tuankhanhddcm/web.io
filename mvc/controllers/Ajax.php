<?php
class Ajax extends Controller
{

    public $sanpham;
    public $usermodel;
    public $Danhmuc;
    public $Nhasanxuat;

    public function __construct()
    {
        $this->sanpham = $this->model("sanpham");
        $this->usermodel = $this->model("Usermodel");
        $this->Danhmuc = $this->model("Danhmucmodel");
        $this->Nhasanxuat = $this->model("Nhasanxuat");
    }


    public function banchay()
    {
        if (isset($_POST['ma_loai'])) {
            $ma_loai = $_POST['ma_loai'];
            $data = $this->sanpham->filter_banchay($ma_loai);
            $col = 4;
        } else if (isset($_POST['banchay']) && !empty($_POST['banchay']) && isset($_SESSION['search']) && !empty($_SESSION['search'])) {
            $data = $this->sanpham->search_home($_SESSION['search'], 20, $sort = '', $_POST['banchay']);
            $col = 5;
        }
        $ouput = "";
        if (!empty($data)) {
            foreach ($data as $row) {
                $giasale = number_format($row['sp_giaban'] - $row['sp_giaban'] * 0.2);
                $gia = number_format($row['sp_giaban']);
                $ouput .= '
                    <div class="col-2-' . $col . ' ">
                        <a class="card-item " href="../Detail/' . $row['sp_url'] . '">
                            <div class="card-item__img">
                                <img src="http://localhost/web_mvc/' . $row['sp_img'] . ' " class="card__img">
                            </div>
                            <div class="card__name">
                                <span class="card__name-sp">' . $row['sp_name'] . '</span>
                            </div>
                            <div class="card__body">
                                <strong class="card__price">' . $giasale . 'đ</strong>
                                <strong class="card__oldprice">' . $gia . 'đ</strong>
                                <span class="card__precent">-20%</span>
                            </div>
                        </a>
                    </div>
                    ';
            }
        } else {
            $ouput = '   <div class="danhmuc_rong ">
                                <h2 class="danhmuc-rong__text">Không có sản phẩm nào!!!</h2>
                            </div>';
        }
        echo $ouput;
    }


    // loc san pham
    public function filter_data()
    {
        if (isset($_POST["action"])) {
            $nsx = [];
            $kich_co = [];
            $gia = [];
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
            if (isset($_POST['order'])) {

                if ($_POST['order'] == 'desc') {
                    $order = $_POST['order'];
                } else {
                    $order = $_POST['order'];
                }
            }

            $data = $this->sanpham->filter_data($ma_loai, $gia, $nsx, $kich_co, $order);
            $ouput = "";
            if (!empty($data) && isset($data) && $data !== null) {
                foreach ($data as $row) {
                    $giasale = number_format($row['sp_giaban'] - $row['sp_giaban'] * 0.2);
                    $gia = number_format($row['sp_giaban']);
                    $ouput .= '
                        <div class="col-2-4 ">
                            <a class="card-item " href="../Detail/' . $row['sp_url'] . '">
                                <div class="card-item__img">
                                    <img src="http://localhost/web_mvc/' . $row['sp_img'] . ' " class="card__img">
                                </div>
                                <div class="card__name">
                                    <span class="card__name-sp">' . $row['sp_name'] . '</span>
                                </div>
                                <div class="card__body">
                                    <strong class="card__price">' . $giasale . 'đ</strong>
                                    <strong class="card__oldprice">' . $gia . 'đ</strong>
                                    <span class="card__precent">-20%</span>
                                </div>
                            </a>
                        </div>
                        ';
                }
            } else {
                $ouput = '   <div class="danhmuc_rong ">
                                    <h2 class="danhmuc-rong__text">Không có sản phẩm nào!!!</h2>
                                </div>';
            }
            echo $ouput;
        }
    }


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
        if (isset($_POST['banchay']) && !empty($_POST['banchay'])) {
            $banchay = $_POST['banchay'];
        }
        $sp = $this->sanpham->search_home($text, 20, $sort, $banchay);
        $ouput = "";
        if (!empty($sp) && isset($sp) && $sp !== null) {
            foreach ($sp as $row) {
                $giasale = number_format($row['sp_giaban'] - $row['sp_giaban'] * 0.2);
                $gia = number_format($row['sp_giaban']);
                $ouput .= '
                    <div class="col-2-5 ">
                        <a class="card-item " href="../Detail/' . $row['sp_url'] . '">
                            <div class="card-item__img">
                                <img src="http://localhost/web_mvc/' . $row['sp_img'] . ' " class="card__img">
                            </div>
                            <div class="card__name">
                                <span class="card__name-sp">' . $row['sp_name'] . '</span>
                            </div>
                            <div class="card__body">
                                <strong class="card__price">' . $giasale . 'đ</strong>
                                <strong class="card__oldprice">' . $gia . 'đ</strong>
                                <span class="card__precent">-20%</span>
                            </div>
                        </a>
                    </div>
                    ';
            }
        }
        echo $ouput;
    }


    public function sp_cart()
    {
        if (isset($_SESSION["cart"])  && !empty($_SESSION['cart'])) {
            $mang = [];
            foreach ($_SESSION["cart"] as  $val) {

                array_push($mang, $val);
            }
            $sp = range(1, count($mang));
            for ($n = 0; $n < 6; $n++) {
                if (isset($mang[$n])) {
                    $sp[$n] = $mang[$n];
                }
            }
        }
        $kq = "";
        foreach ($sp as $val) :
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

        endforeach;
        echo $kq;
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
                    $tt += $_SESSION['cart'][$key]['soluongdat'] * $_SESSION['cart'][$key]['sp_giaban'];
                }
            }
            foreach ($_SESSION['cart'] as $val) {
                $tong += $val['soluongdat'] * $val["sp_giaban"];
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

    public function login()
    {
        if (isset($_POST['user']) && isset($_POST['pass']) && !empty($_POST['user']) && !empty($_POST['pass'])) {
            $kq = $this->usermodel->check_login($_POST['user']);
            $rs = '';
            $out = '';
            if ($kq != null) {
                $out = 'true';
                if (password_verify($_POST['pass'], $kq['password'])) {
                    $_SESSION['user'] = $kq;
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


    public function search_product()
    {
        if (isset($_POST['text']) && !empty($_POST['text'])) {
            $text = $_POST['text'];
            $kq = $this->sanpham->search($text);
            $out = "";
            if ($kq) {
                foreach ($kq as $val) {
                    $out .= ' <li class="header__cart-item" style="padding-top: 15px;">
                                    <a href="http://localhost/web_mvc/Detail/' . $val['sp_url'] . '" class="header__cart-item">
                                        <div class="header__search--img">
                                            <img src="http://localhost/web_mvc/' . $val['sp_img'] . '" alt="" class="header__cart-img">
                                        </div>
                                        <div class="header__search-item-info">
                                            <div class="header__search--info">
                                                <h5 class="header__search-item-name">' . $val['sp_name'] . '</h5>
                                                <div class="header__search--price">
                                                    <span class="header__search-item-price">' . number_format($val["sp_giaban"] - $val["sp_giaban"] * 0.2) . 'đ</span>
                                                    <span class="header__search--price_sale ">' . number_format($val["sp_giaban"]) . 'đ</span>
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
        if(isset($_POST['trang']) && !empty($_POST['trang'])){
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
       
        $kq = $this->sanpham->list_product($text, $ma_loai,$nsx,$start,$limit);
        $row =count($sotrang);
        $out = "";
        if ($kq) {
            foreach ($kq as $val) {
                $out .= '<tr class="body-table">
                                <td style="width: 50px;border-left: 1px solid rgba(0,0,0,.1);"><img src="http://localhost/web_mvc/' . $val["sp_img"] . '" alt="" style="width: 50px;min-height: 10px;"></td>
                                <td>' . $val["sp_ma"] . '</td>
                                <td><a href="" style="color: #357ebd;">' . $val["sp_name"] . '</a> </td>
                                <td style="text-align: center;">' . $val["sp_sl"] . '</td>
                                <td style="color: black;font-weight: 400;text-align: end;">' . number_format($val['sp_gia']) . 'đ</td>
                                <td style="color: black;font-weight: 400;text-align: end;">' . number_format($val['sp_gia']) . 'đ</td>
                                <td>' . $val["ten_loai"] . '</td>
                                <td>' . $val["ten_nsx"] . '</td>
                                <td style="display: flex;align-items: center;justify-content: center;padding-top: 20px;border-right: none;">
                                    <button type="button" class=" btn-update" title="Sửa"><i class="fa fa-pencil-square-o"></i></button>
                                    <button type="button" class=" btn-copy" title="Copy"><i class="bx bx-copy-alt"></i></button>
                                    <button type="button" class=" btn-deletd" title="Xóa"><i class="bx bxs-trash"></i></button>
                                </td>
                            </tr>';
            }
            $out.=$this->_trang($row,$page,$limit,9);
        } else {
            $out .= '<tr class="no_product" ><td  colspan="9">Không tìm thấy sản phẩm</td></tr>';
        }
        
        echo $out;
    }


    public function insert_sp()
    {
        if (
            !empty($_POST['tensp']) && !empty($_POST['sl']) && !empty($_POST['gia']) && !empty($_POST['giaban'])
            && !empty($_POST['maloai']) && !empty($_POST['mansx']) && !empty($_POST['img'])
        ) {
            $tensp = $_POST['tensp'];
            $ma_loai = $_POST['maloai'];
            $ma_nsx = $_POST['mansx'];
            $sp_mota = $_POST['sp_mota'];
            $sl = $_POST['sl'];
            $img = $_POST['img'];
            $gia = $_POST['gia'];
            $giaban = $_POST['giaban'];

            $sp_url = str_replace(' ', '-', $tensp);
            $updated = date("Y-m-d H:i:s", time());
            $row = $this->sanpham->num_rows();
            $max_id = $this->sanpham->max_id('sanpham', 'sp_ma', 'SP');
            if ($max_id !== null) {
                $id = (int)(str_replace('SP', '', $max_id['sp_ma'])) + 1;
            } else {
                $id = $row + 1;
            }

            if ($id < 10) {
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
            $sp_img = "public/img/upload/" . $img;
            $kq = $this->sanpham->insert_product($masp, $tensp, $sl, $gia, $giaban, $sp_url, $sp_img, $sp_mota, $ma_loai, $ma_nsx, $updated);
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
                $ouput.=$this->_trang($row,$page,$limit);
            }
            if( $table =="loaisanpham"){
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
                $ouput.=$this->_trang($row,$page,$limit);
            }
            
            echo $ouput;
        }
    }


    public function _trang($row,$page,$limit,$colspan=2)
    {
        $ouput = '
        <tr>
                <td colspan="'.$colspan.'" style="border: none;">
            <div align="center">
            <ul class="pagination justify-content-end" style="margin-right: 30px">
            ';
        $total_links = ceil($row / $limit);
        $previous_link = '';
        $next_link = '';
        $page_link = '';

        if ($total_links > 4) {
            if ($page < 5) {
                for ($count = 1; $count <= 5; $count++) {
                    $page_array[] = $count;
                }

                $page_array[] = '...';
                $page_array[] = $total_links;
            } else {
                $end_limit = $total_links - 5;
                if ($page > $end_limit) {
                    $page_array[] = 1;
                    $page_array[] = '...';
                    for ($count = $end_limit; $count <= $total_links; $count++) {
                        $page_array[] = $count;
                    }
                } else {
                    $page_array[] = 1;
                    $page_array[] = '...';
                    for ($count = $page - 1; $count <= $page + 1; $count++) {
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
        return $ouput;
    }
}
