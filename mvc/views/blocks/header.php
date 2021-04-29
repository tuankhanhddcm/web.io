<header class="header">
    <div class="grid">
        <nav class="header__navbar">
            <ul class="header__navbar-list header__navbar-socials">
                <li class="header__navbar-item">
                    Kết nối
                    <i class='bx bxl-facebook-circle nav__icon'></i>
                    <i class='bx bxl-google nav__icon'></i>
                </li>
            </ul>
            <ul class="header__navbar-list">
                <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
                    <li class="header__navbar-item header__navbar-user">
                        <a href="http://localhost/web_mvc/Account" class="header__navbar-user-link">
                            <img src="http://localhost/web_mvc/public/img/user.png" alt="" class="header__navbar-user-img">
                            <span class="header__navbar-user-name"><?= $_SESSION['user']['username'] ?></span>
                        </a>
                        <ul class="header__navbar-user-menu">
                            <li class="header__navbar-user-item">
                                <a href="http://localhost/web_mvc/Account">Tài khoản của tôi</a>
                            </li>
                            <li class="header__navbar-user-item">
                                <a href="http://localhost/web_mvc/Account/history">Đơn mua</a>
                            </li>
                            <li class="header__navbar-user-item header__navbar-user-item--separate  ">
                                <button class="logout" onclick="logout();">Đăng xuất</button>
                            </li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li class="header__navbar-item header__navbar-item--separate">
                        <!-- Button trigger modal -->
                        <button type="button" class="  btn-lg " id="btn-dangky" data-toggle="modal" data-target="#form-sign">
                            Đăng ký
                        </button>
                    </li>
                    <li class="header__navbar-item ">
                        <button type="button" class="  btn-lg " id="btn-dangnhap" data-toggle="modal" data-target="#form-sign">
                            Đăng nhập
                        </button>
                    </li>
                <?php } ?>
                <?php ob_start(); ?>
            </ul>
        </nav>
        <!-- header search -->
        <div class="header-with-search">
            <div class="header__logo">
                <a href="http://localhost/web_mvc/home" class="header__logo-link" title="Về trang chủ">
                    <img src="http://localhost/web_mvc/public/img/kstore1.png" alt="" class="logo">
                </a>
            </div>
            <div class="header__search">
                <form class="header__search" style="margin-left: 0px;" action="http://localhost/web_mvc/Home/tim_kiem" method="post">
                    <div class="header__search-input-wrap">
                        <input type="text" class="header__search-input" id="input-search" name="input-search" onkeyup="search_header()" placeholder="Nhập để tìm kiếm sản phẩm">
                        <div class="header__search-history">
                            <ul class="header__search-history-list" id='list-search'>

                            </ul>
                        </div>
                    </div>
                    <button class="header__search-btn" type="submit">
                        <i class=' header__search-btn-icon bx bx-search'></i>
                    </button>
                </form>
            </div>
            <!--  header cart -->
            <div class="header__cart">
                <div class="header__Cart-wrap ">
                    <a href="http://localhost/web_mvc/cart" class="cart-link">
                        <i class='header__cart-icon bx bx-cart-alt'></i>
                        <div id="num_order">
                            <span class="header__cart-notice"></span>
                        </div>
                    </a>
                    <div id="sp_cart">
                        
                    </div>
                    <!-- <div class="header__cart-list cart" >
                        <div class="header__cart-list--has-cart">
                            <h4 class="header__cart-heading">Sản phẩm đã thêm</h4>
                            <ul class="header__cart-list-item " id="sp_cart">

                            </ul>
                            <a href="http://localhost/web_mvc/cart" class="btn-cart btn-cart-them">Xem Giỏ Hàng</a>
                        </div>
                    </div> -->
                    <div class="no-cart">
                        <!-- <div class="header__cart-list header__cart-list--no-cart ">
                            <img src="http://localhost/web_mvc/public/img/cartempty.png" alt="" class="header__cart-no-cart-img">
                            <span class="header__cart-list-no-cart-msg ">Chưa có sản phẩm</span>
                        </div> -->
                    </div>


                </div>
            </div>
        </div>
    </div>
</header>
<!-- Modal đăng ký đăng nhập -->
<div class="modal fade " id="form-sign" tabindex="-1" role="dialog" aria-labelledby="form-sign">
    <div class="  modal-dialog modal-dialog-centered  " id="modal-form">
        <div class="modal-content">
            <!-- dangky form -->
            <div class="auth-form">
                <div class="auth-form__container">
                    <button type="button" class="close close_reload" id="btn-close" onclick="location.reload();" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs sign-header " id="navId">
                        <li class="nav-item " id="form-tab">
                            <a href="#tab1Id" class="nav-link active " id="dangnhap_tab" data-toggle="tab">Đăng nhập</a>
                        </li>
                        <li class="nav-item " id="form-tab">
                            <a href="#tab2Id" class="nav-link  " id="dangky_tab" data-toggle="tab">Đăng ký</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab1Id" role="tabpanel" aria-label="dangnhap_tab">
                            <div class="sign-form">
                                <div class="error__wrap" style="margin-bottom: 20px;">
                                    <div class="pay-input ">
                                        <input type="text" class="form__input user " onkeyup="check('.user')" name="username" placeholder=" " value="">
                                        <label for="" class="form__label  ">Tên đăng nhập</label>
                                    </div>
                                    <div style="display: flex;">
                                        <i class='bx bxs-error-circle user_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                        <span class="error_user error"></span>
                                    </div>
                                </div>
                                <div class="error__wrap" style="margin-bottom: 20px;">
                                    <div class="pay-input ">
                                        <input type="password" class="form__input passs" onkeyup="check('.passs')" name="pass" placeholder=" " value="">
                                        <label for="" class="form__label  ">Mật khẩu</label>
                                    </div>
                                    <div style="display: flex;">
                                        <i class='bx bxs-error-circle passs_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                        <span class="error_passs error"></span>
                                    </div>
                                </div>
                                <div class="sign-header__aside">
                                    <div class="sign-header__help">
                                        <a href="" class="sign-header__help-link sign-header__help-forgot">Quên mật khẩu?</a>
                                        <span class="sign-header__help-separate"></span>
                                        <a href="/" class="sign-header__help-link">Cần trợ giúp?</a>
                                    </div>
                                </div>
                                <div class="btn-sign__controller">
                                    <button type="submit" class="btn-sign__dangky " onclick="login('1')" id="login" name="login">Đăng nhập</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab2Id" role="tabpanel" aria-label="dangky_tab">
                            <div class="sign-form">
                                <div class="error__wrap" style="margin-bottom: 20px;">
                                    <div class="pay-input">
                                        <input type="text" class="form__input dk " name="hoten" onkeyup="check('#hoten')" id="hoten" placeholder=" " value="">
                                        <label for="" class="form__label  ">Họ và Tên</label>
                                    </div>
                                    <div style="display: flex;">
                                        <i class='bx bxs-error-circle hoten_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                        <span class="error_hoten error"></span>
                                    </div>
                                </div>
                                <div class="error__wrap" style="margin-bottom: 20px;">
                                    <div class="pay-input ">
                                        <input type="text" class="form__input dk" name="username" id="username" onkeyup="check_user();" placeholder=" " value="">
                                        <label for="" class="form__label  ">Tên đăng nhập</label>
                                    </div>
                                    <div style="display: flex;">
                                        <i class='bx bxs-error-circle username_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                        <span class="error_username error"></span>
                                    </div>
                                </div>
                                <div class="error__wrap" style="margin-bottom: 20px;">
                                    <div class="pay-input ">
                                        <input type="text" class="form__input dk" name="email" id="email" onkeyup="email('#email')" placeholder=" " value="">
                                        <label for="" class="form__label  ">Email</label>
                                    </div>
                                    <div style="display: flex;">
                                        <i class='bx bxs-error-circle email_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                        <span class="error_email error"></span>
                                    </div>
                                </div>
                                <div class="error__wrap" style="margin-bottom: 20px;">
                                    <div class="pay-input ">
                                        <input type="text" class="form__input dk" name="sdt" id="sdt" onkeyup="sdt()" placeholder=" " value="">
                                        <label for="" class="form__label  ">Só điện thoại</label>
                                    </div>
                                    <div style="display: flex;">
                                        <i class='bx bxs-error-circle sdt_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                        <span class="error_sdt error"></span>
                                    </div>
                                </div>
                                <div class="error__wrap" style="margin-bottom: 20px;">
                                    <div class="pay-input ">
                                        <input type="password" class="form__input dk" name="pass" id="pass" onkeyup="pass();" placeholder=" " value="">
                                        <label for="" class="form__label  ">Mật khẩu</label>
                                    </div>
                                    <div style="display: flex;">
                                        <i class='bx bxs-error-circle pass_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                        <span class="error_pass error"></span>
                                    </div>
                                </div>
                                <div class="error__wrap" style="margin-bottom: 20px;">
                                    <div class="pay-input ">
                                        <input type="password" class="form__input dk " name="pass_again" id="pass_again" onkeyup="check_pass()" placeholder=" " value="">
                                        <label for="" class="form__label  ">Nhập lại mật khẩu</label>
                                    </div>
                                    <div style="display: flex;">
                                        <i class='bx bxs-error-circle pass_again_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                        <span class="error_pass_again error"></span>
                                    </div>
                                </div>
                                <div class="btn-sign__controller">
                                    <button type="button" class="btn-sign__dangky " id="dangky">Đăng ký</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="btn-sign-socials">
                    <a href="" class="btn-sign-socials__face">
                        <i class=' icon-social__face bx bxl-facebook-square'></i>
                        <span class="btn-sign__social_text">Kết nối với Facebook</span>
                    </a>
                    <a href="" class="btn-sign-socials__gg">
                        <i class=' icon-social__gg bx bxl-google'></i>
                        <span class="btn-sign__social_text">Kết nối với Google</span>
                    </a>
                </div> -->
            </div>
        </div>
    </div>
</div>
<div id="toast">
</div>