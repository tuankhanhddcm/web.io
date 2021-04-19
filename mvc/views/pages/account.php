<div class="main" >
    <section class="url-heading" style="border-bottom: 1px solid #3333;">
        <div class="grid">
            <div class="grid__row">
                <div class="col-xs-12">
                    <ul class="url-list">
                        <li class="url-item home">
                            <a href="../home" class="url-link">Trang chủ</a>
                            <span><i class=' right-icon bx bx-chevron-right'></i></span>
                        </li>
                        <li class="url-item">
                            <span class="url-name">Trang khách hàng</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="account" style="min-height: 334px;">
        <div class="container">
            <div class="grid__row">
                <div class="col-sm-3">
                    <div class="user-info">
                        <div class="user-name">
                            <div class="user-avatar">
                                <i class='bx bx-user'></i>
                                <!-- <img src="https://yt3.ggpht.com/yti/ANoDKi4u6XzxVZups14lSw3SRRGG-7S4XqREzn0-rVCo=s88-c-k-c0x00ffffff-no-rj-mo" alt="" class="user_img"> -->
                            </div>
                            <div class="user_text">
                                <h4 class="user_text-account">Tài khoản của</h4>
                                <h4 class="user_text-name">Khanh Nguyen</h4>
                            </div>
                        </div>
                        <ul class="user-wrap">
                            <li class="">
                                <a href="http://localhost/web_mvc/Account/edit" class="account-link user_active">
                                    <i class='bx bxs-user'></i>
                                    <span class="account_text">Thông tin tài khoảng</span>
                                </a>
                            </li>
                            <li>
                                <a href="http://localhost/web_mvc/Account/history" class="account-link">
                                    <i class="bx bx-clipboard"></i>
                                    <span class="account_text">Quản lý đơn hàng</span>
                                </a>
                            </li>
                            <li>
                                <a href="http://localhost/web_mvc/Account/change" class="account-link">
                                    <i class='bx bx-key'></i>
                                    <span class="account_text">Thay đổi mật khẩu</span>

                                </a>
                            </li>
                            <li>
                                <a href="" class="account-link">
                                    <i class='bx bxs-map'></i>
                                    <span class="account_text">Sổ địa chỉ</span>
                                </a>
                            </li>

                        </ul>

                    </div>
                </div>
                <div class="col-sm-9">
                    <?php require_once "./mvc/views/layout/" . $data['layout'] . ".php" ?>
                </div>

            </div>
        </div>
    </div>

</div>
</div>