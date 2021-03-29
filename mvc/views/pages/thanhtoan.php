<?php
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("location: http://localhost/web_mvc/");
} else {
?>
    <div class="main">
        <section class="url-heading">
            <div class="grid">
                <div class="grid__row">
                    <div class="col-xs-12">
                        <ul class="url-list">
                            <li class="url-item home">
                                <a href="./home" class="url-link">Trang chủ</a>
                                <span><i class=' right-icon bx bx-chevron-right'></i></span>
                            </li>
                            <li class="url-item home">
                                <a href="./cart" class="url-link">Giỏ hàng</a>
                                <span><i class=' right-icon bx bx-chevron-right'></i></span>
                            </li>
                            <li class="url-item">
                                <span class="url-name">Thanh toán</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <div class="container-fluid " style="background-color: white;">
            <div class="grid pay-wrap">
                <div class="grid__row">
                    <div class="col-sm-7 padding-9">
                        <div class="grid__row">
                            <div class="col-sm-6 ">
                                <div class="pay-heading">
                                    <div class="pay-heading__item">
                                        <i class='bx bxs-contact pay-icon'></i>
                                        <h3 class="pay-text">Thông tin nhận hàng</h3>
                                    </div>
                                    <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
                                        <div class="error__wrap" style="margin: 20px 0px 40px 0;">
                                            <div class="pay-input ">
                                                <!-- add: disabled input-block, label-block -->
                                                <input type="text" class="form__input hoten " onkeyup="check('.hoten')" placeholder=" " value="<?= $_SESSION['user']['ho_ten'] ?>">
                                                <label for="" class="form__label  ">Họ và Tên</label>
                                            </div>
                                            <div style="display: flex;">
                                                <i class='bx bxs-error-circle hoten_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                                <span class="error_hoten error"></span>
                                            </div>
                                        </div>
                                        <div class="error__wrap" style="margin: 20px 0px 40px 0;">
                                            <div class="pay-input ">
                                                <input type="text" class="form__input sdt_disable sdt" disabled placeholder=" " value="<?= $_SESSION['user']['sdt'] ?>">
                                                <label for="" class="form__label ">Số điện thoại</label>
                                            </div>
                                        </div>
                                        <div class="error__wrap" style="margin: 20px 0px 40px 0;">
                                            <div class="pay-input">
                                                <input type="email" class="form__input email " onkeyup="email('.email');" placeholder=" " value="<?= $_SESSION['user']['email'] ?>">
                                                <label for="" class="form__label">Email</label>
                                            </div>
                                            <div style="display: flex;">
                                                <i class='bx bxs-error-circle email_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                                <span class="error_email error"></span>
                                            </div>
                                        </div>

                                        <div class="error__wrap" style="margin: 20px 0px 40px 0;">
                                            <div class="pay-input">
                                                <textarea class="form__input" name="" id="note" cols="30" rows="20" placeholder=" " style="height: 80px;"></textarea>
                                                <label for="" class="form__label">Ghi chú (tùy chọn)</label>
                                            </div>

                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="grid__row">
                                    <div class="col-sm-12 " style="padding: 0 0 0 20px;">
                                        <div class="pay-heading">
                                            <div class="pay-heading__item">
                                                <i class='bx bxs-map pay-icon'></i>
                                                <h3 class="pay-text">Địa chỉ</h3>
                                            </div>
                                            <div class="error__wrap select-search " style="margin-bottom: 20px;">
                                                <span class="label-select">Tỉnh thành:</span>
                                                <select class="select select-tinh form-control" id="tinh" data-dropup-auto="false" title="Chọn tỉnh thành" data-size='5' data-live-search="true">
                                                    <?php foreach ($data['diachi'] as $val) : ?>
                                                        <option id="<?= $val['id'] ?>" value="<?= $val['id'] ?>"><?= $val['_name'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div style="display: flex;">
                                                    <i class='bx bxs-error-circle tinh_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                                    <span class="error_tinh error"></span>
                                                </div>
                                            </div>
                                            <div class="error__wrap select-search " style="margin-bottom: 20px;">
                                                <span class="label-select">Quận huyện:</span>
                                                <select class=" select  form-control" id="district" disabled data-dropup-auto="false" title="Chọn quận huyện" data-size='5' data-live-search="true">
                                                    
                                                </select>
                                            </div>
                                            <div class="error__wrap select-search " style="margin-bottom: 20px;">
                                                <span class="label-select">Phường xã:</span>
                                                <select class=" select select-ward form-control" id="ward" disabled data-dropup-auto="false" title="Chọn phường xã" data-size='5' data-live-search="true">
                                                    
                                                </select>
                                            </div>
                                            <div class="error__wrap select-search " style="margin-bottom: 20px;">
                                                <span class="label-select">Đường:</span>
                                                <select class=" select select-street form-control" id="street" disabled data-dropup-auto="false" title="Chọn đường" data-size='5' data-live-search="true">
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 " style="padding: 0 0 0 20px;">
                                        <div class="pay-heading">
                                            <div class="pay-heading__item">
                                                <i class='bx bx-credit-card pay-icon'></i>
                                                <h3 class="pay-text">Thanh toán</h3>
                                            </div>
                                            <div class="pay-item">
                                                <i class='bx bx-money money-icon'></i>
                                                <h3 class="pay-item__text">Thanh toán khi nhận hàng</h3>
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
                                <span class="cart-title__text oder-detail__text">(
                                    <span class="cart_count-product">
                                        <?php if (isset($_SESSION['cart'])) {
                                            echo count($_SESSION['cart']);
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
                                    foreach ($_SESSION['cart'] as $key => $val) :
                                    ?>
                                        <div class="col-sm-12 padding-9">
                                            <div class="grid__row">
                                                <div class="col-sm-3 padding-9">
                                                    <img class="oder-product__img" src="http://localhost/web_mvc/<?= $val["sp_img"] ?>" alt="">
                                                </div>
                                                <div class="col-sm-6 padding-9">
                                                    <div class="oder-product__item">
                                                        <span class="oder-product__name"><?= $val["sp_name"] ?></span>
                                                        <span class="oder-product__sl">x<?= $val["soluongdat"] ?></span>
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
                                        $tong += $val['soluongdat'] * $val["sp_giaban"];
                                    endforeach;
                                    ?>
                                </div>
                            </div>
                            <div class="oder-price">
                                <div class="code_wrap">
                                    <div class="oder-total__temp">
                                        <div class="pay-input code-div ">
                                            <input type="text" class="form__input text_code--sale" id="code-sale"  placeholder=" " value="">
                                            <label for="" class="form__label label-code">Nhập mã giảm giá</label>
                                        </div>
                                        <button type="button" class="btn_cus btn-pay btn-code" id="btn-sale">Áp dụng</button>
                                    </div>

                                    <div style="display: flex;">
                                        <i class='bx bxs-error-circle ' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                        <span class="error_code error"></span>
                                    </div>
                                </div>

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
                                <div class="oder-btn">
                                    <a href="./cart" class="oder-link">
                                        <i class='bx bxs-chevron-left left-icon'></i>
                                        <span class="back-cart">Quay về giỏ hàng</span>
                                    </a>
                                    <button type="button" class="btn_cus btn-pay" id="btn-tt">ĐẶT HÀNG</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>