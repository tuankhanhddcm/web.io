<div class="col-sm-12 " style="padding: 0;">
    <div class="silder_heading">
        <img src="http://localhost/web_mvc/public/img/kstore1.png" alt="" class="silder_heading--img">
        <ul class="header__navbar-list" style="margin-bottom: 15px;">
            <li class="header__navbar-item header__navbar-user">
                <a href="http://localhost/web_mvc/Admin/account" class="header__navbar-user-link">
                    <span class="header__navbar-user-name" style="padding-right: 5px;">Xin chào,</span>
                    <span class="header__navbar-user-name" style="padding-right: 10px;"><?= isset($_SESSION['admin']) ? $_SESSION['admin']['username'] : '' ?></span>
                    <img src="http://localhost/web_mvc/public/img/user.png" alt="" class="header__navbar-user-img">
                </a>
                <ul class="header__navbar-user-menu">
                    <li class="header__navbar-user-item">
                        <a href="http://localhost/web_mvc/Admin/account">Tài khoản của tôi</a>
                    </li>
                    <li class="header__navbar-user-item header__navbar-user-item--separate  ">
                        <button class="logout" onclick="logout();">Đăng xuất</button>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>