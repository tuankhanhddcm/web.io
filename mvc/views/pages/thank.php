<?php
if (!isset($_SESSION['hd_detail']) && empty($_SESSION['hd_detail'])) {
    header('location:http://localhost/web_mvc/home');
} else {
?>
    <div class="main" >
        <section class="url-heading">
            <div class="grid">
                <div class="grid__row">
                    <div class="col-xs-12">
                        <ul class="url-list">
                            <li class="url-item home">
                                <a href="../home" class="url-link">Trang chủ</a>
                                <span><i class=' right-icon bx bx-chevron-right'></i></span>
                            </li>
                            <li class="url-item home">
                                <a href="../cart" class="url-link">Giỏ hàng</a>
                                <span><i class=' right-icon bx bx-chevron-right'></i></span>
                            </li>
                            <li class="url-item">
                                <span class="url-name">Cảm ơn</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <div class="container-fluid " style="background-color: white; margin-top: 50px; padding-bottom: 20px;">
            <div class="grid pay-wrap">
                <div class="grid__row">
                    <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
                        <div class="col-sm-12">
                            <div class="thank">
                                <i class='bx bxs-check-circle thank--icon'></i>
                                <span class="thank--text">Cảm ơn bạn đã đặt hàng !!!</span>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="grid__row">
                        <div class="col-sm-7 padding-9">
                            <div class="grid__row info-pay">
                                <div class="col-sm-6 ">
                                    <div class="pay-heading">
                                        <div class="pay-heading__item">
                                            <i class='bx bxs-contact pay-icon'></i>
                                            <h3 class="pay-text">Thông tin mua hàng </h3>
                                        </div>
                                        <div class="info-list">
                                            <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
                                                <div class="info-item">
                                                    <span class="info-user">Họ và tên:</span>
                                                    <span class="info-text"><?= $_SESSION['user']['ho_ten'] ?></span>
                                                </div>
                                                <div class="info-item">
                                                    <span class="info-user">Số điện thoại:</span>
                                                    <span class="info-text"><?= $_SESSION['user']['sdt'] ?></span>
                                                </div>
                                                <div class="info-item">
                                                    <span class="info-user">Email:</span>
                                                    <span class="info-text"><?= $_SESSION['user']['email'] ?></span>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="grid__row">
                                        <div class="col-sm-12">
                                            <div class="pay-heading">
                                                <div class="pay-heading__item">
                                                    <i class='bx bxs-map pay-icon'></i>
                                                    <h3 class="pay-text">Địa chỉ</h3>
                                                </div>
                                                <div class="pay-item">
                                                    <h3 class="pay-item__text"><?= $_SESSION['user']['diachi'] ?> </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="pay-heading">
                                                <div class="pay-heading__item">
                                                    <i class='bx bx-credit-card pay-icon'></i>
                                                    <h3 class="pay-text">Thanh toán</h3>
                                                </div>
                                                <div class="pay-item">
                                                    <i class='bx bx-money money-icon'></i>
                                                    <h3 class="pay-item__text">Thanh toán khi nhận hàng </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="oder-detail">
                                <div class="oder-detail__title">
                                    <i class='bx bx-clipboard pay-icon'></i>
                                    <h3 class="pay-text oder-detail-text ">Đơn hàng</h3>
                                    <h3 class="pay-text oder-detail-text ma_hd">#<?= $_SESSION['mahd'] ?></h3>
                                    <span class="cart-title__text oder-detail__text">(
                                        <span class="cart_count-product">
                                            <?php if (isset($_SESSION['hd_detail'])) {
                                                echo count($_SESSION['hd_detail']);
                                            }
                                            ?>
                                        </span>
                                        sản phẩm)
                                    </span>
                                </div>
                                <div class="oder-product">
                                    <div class="grid__row">
                                        <?php
                                        $tong = 0;
                                        foreach ($_SESSION['hd_detail'] as $key => $val) :
                                        ?>
                                            <div class="col-sm-12 padding-9">
                                                <div class="grid__row">
                                                    <div class="col-sm-3 padding-9">
                                                        <img class="oder-product__img" src="http://localhost/web_mvc/<?= $val["sp_img"] ?>" alt="">
                                                    </div>
                                                    <div class="col-sm-6 padding-9">
                                                        <div class="oder-product__item">
                                                            <span class="oder-product__name"><?= $val["sp_name"] ?></span>
                                                            <span class="oder-product__sl">x<?= $val["soluong"] ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 padding-9">
                                                        <div class="oder-product__price">

                                                            <span class="oder-product__price-text"><?= number_format($val["sp_giaban"]) ?>đ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                            $tong += $val['soluong'] * $val["sp_giaban"];
                                        endforeach;
                                        ?>
                                    </div>
                                </div>
                                <div class="oder-price">
                                    <div class="oder-total__temp">
                                        <span class="temp__price-text">Tạm tính:</span>
                                        <span class="temp__price-text"><?= number_format($tong) ?>đ</span>
                                    </div>
                                    <div class="oder-total__temp oder-sale">
                                        <span class="temp__price-text">Giảm giá:</span>
                                        <span class="temp__price-text">20%</span>
                                    </div>
                                    <div class="oder-total">
                                        <span class="oder-total__label">Tổng cộng:</span>
                                        <input type="hidden" name="total" id="total" value="<?= $tong ?>">
                                        <span class="oder-price__total"><?= number_format($tong) ?>đ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="thank--btn">
                            <a href="../home<?php unset($_SESSION['hd_detail']); unset($_SESSION['mahd']); ?>" class="btn_cus btn-thank">Tiếp tục mua hàng</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php } ?>