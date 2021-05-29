<div class="main">
    <section class="url-heading">
        <div class="grid">
            <div class="grid__row">
                <div class="col-xs-12">
                    <ul class="url-list">
                        <li class="url-item home">
                            <a href="../home" class="url-link">Trang chủ</a>
                            <span><i class=' right-icon bx bx-chevron-right'></i></span>

                        </li>
                        <li class="url-item">
                            <span class="url-name">So sánh</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="product-detail" style="padding-bottom: 50px;">
        <div class="grid">
            <div class="grid__row" style="border: 1px solid #e6e6e6; ">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6" style=" border-right: 1px solid #e6e6e6">
                            <a class="sosanh_link" href="http://localhost/web_mvc/Detail/<?= $data['sp_ht']['sp_url']; ?>">
                                <div class="card-item__img sosanh_img">
                                    <img src="http://localhost/web_mvc/<?= $data['sp_ht']["sp_img"]  ?>" alt="" class="card__img img-fluid">
                                </div>
                                <div class="card__name">
                                    <span class="card__name-sp"><?= $data['sp_ht']["sp_name"] ?></span>
                                </div>
                                <div class="card__body">
                                    <?php if ($data['sp_ht']['sp_giagiam'] > 0) {
                                        $phantram = ((float)$data['sp_ht']['sp_giagiam'] / (float)$data['sp_ht']['sp_giaban'] - 1) * 100;
                                    ?>
                                        <strong class="card__price"><?= number_format($data['sp_ht']['sp_giagiam']) ?>đ</strong>
                                        <strong class="card__oldprice"><?= number_format($data['sp_ht']["sp_giaban"]) ?>đ</strong>
                                        <span class="card__precent"><?= round($phantram, 0) ?>%</span>
                                    <?php } else { ?>
                                        <strong class="card__price"><?= number_format($data['sp_ht']["sp_giaban"]) ?>đ</strong>
                                    <?php } ?>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a class="sosanh_link" href="http://localhost/web_mvc/Detail/<?= $data['sp_ss']['sp_url']; ?>">
                                <div class="card-item__img sosanh_img">
                                    <img src="http://localhost/web_mvc/<?= $data['sp_ss']["sp_img"]  ?>" alt="" class="card__img img-fluid">
                                </div>
                                <div class="card__name">
                                    <span class="card__name-sp"><?= $data['sp_ss']["sp_name"] ?></span>
                                </div>
                                <div class="card__body">
                                    <?php if ($data['sp_ss']['sp_giagiam'] > 0) {
                                        $phantram = ((float)$data['sp_ss']['sp_giagiam'] / (float)$data['sp_ss']['sp_giaban'] - 1) * 100;
                                    ?>
                                        <strong class="card__price"><?= number_format($data['sp_ss']['sp_giagiam']) ?>đ</strong>
                                        <strong class="card__oldprice"><?= number_format($data['sp_ss']["sp_giaban"]) ?>đ</strong>
                                        <span class="card__precent"><?= round($phantram, 0) ?>%</span>
                                    <?php } else { ?>
                                        <strong class="card__price"><?= number_format($data['sp_ss']["sp_giaban"]) ?>đ</strong>
                                    <?php } ?>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12" style="padding:  0px;">
                    <div class="box-detail detail_border">
                        <strong>Thông số kỹ thuật chi tiết</strong>
                        <div class="check_box">
                            <input type="hidden" id="ma_loai" value="<?= $data['sp_ht']["ma_loai"] ?>">
                            <input type="checkbox" name="" id="check_tskt" value="1">
                            <label for="">Chỉ xem điểm khác biệt</label>
                        </div>
                    </div>
                    <div class="detail_thongso ">
                        <div class="thongso">
                            <?php
                            switch ($data['sp_ht']['ma_loai']) {
                                case 1:
                                    require_once './mvc/views/layout/sstv.php';
                                    break;
                                case 2:
                                    require_once './mvc/views/layout/ssmaylanh.php';
                                    break;
                                case 3:
                                    require_once './mvc/views/layout/sstulanh.php';
                                    break;
                                case 4:
                                    require_once './mvc/views/layout/ssloa.php';
                                    break;
                                case 5:
                                    require_once './mvc/views/layout/sslonuong.php';
                                    break;
                                case 6:
                                    require_once './mvc/views/layout/ssmaygiat.php';
                                    break;
                            }

                            ?>
                        </div>
                        <div class="box-detail detail_ts kich_thuoc">
                            <strong>Kích thước</strong>
                            <div class="grid__row">
                                <div class="col-sm-6" style="border-right:1px solid #e6e6e6 ;">
                                    <span class="span_ts kich_thuoc_ht "><?= $data['sp_ht']["kich_thuoc"] ?></span>
                                </div>
                                <div class="col-sm-6">
                                    <span class="span_ts kich_thuoc_ss"><?= $data['sp_ss']["kich_thuoc"] ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="box-detail detail_ts khoi_luong">
                            <strong>Khối lượng</strong>
                            <div class="grid__row">
                                <div class="col-sm-6" style="border-right:1px solid #e6e6e6 ;">
                                    <span class="span_ts khoi_luong_ht"><?= $data['sp_ht']["khoi_luong"] ?></span>
                                </div>
                                <div class="col-sm-6">
                                    <span class="span_ts khoi_luong_ss"><?= $data['sp_ss']["khoi_luong"] ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="box-detail detail_ts bao_hanh">
                            <strong>Bảo hành</strong>
                            <div class="grid__row">
                                <div class="col-sm-6" style="border-right:1px solid #e6e6e6 ;">
                                    <span class="span_ts bao_hanh_ht"><?= $data['sp_ht']["bao_hanh"] ?></span>
                                </div>
                                <div class="col-sm-6">
                                    <span class="span_ts bao_hanh_ss"><?= $data['sp_ss']["bao_hanh"] ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="box-detail detail_ts nam_sx">
                            <strong>Năm ra mắt</strong>
                            <div class="grid__row">
                                <div class="col-sm-6" style="border-right:1px solid #e6e6e6 ;">
                                    <span class="span_ts nam_sx_ht"><?= $data['sp_ht']["nam_sx"] ?></span>
                                </div>
                                <div class="col-sm-6">
                                    <span class="span_ts nam_sx_ss"><?= $data['sp_ss']["nam_sx"] ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="box-detail detail_ts noi_san_xuat">
                            <strong>Nơi sản xuất</strong>
                            <div class="grid__row">
                                <div class="col-sm-6" style="border-right:1px solid #e6e6e6 ;">
                                    <span class="span_ts noi_san_xuat_ht"><?= $data['sp_ht']["noi_san_xuat"] ?></span>
                                </div>
                                <div class="col-sm-6">
                                    <span class="span_ts noi_san_xuat_ss"><?= $data['sp_ss']["noi_san_xuat"] ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="box_button">
                            <div class="grid__row">
                                <div class="col-sm-6" style="border-right: 1px solid #e6e6e6; padding-top: 20px">
                                    <button class="btn_cus btn-sl-cart btn_ss btn_sosanh_them" type="button" data-idsp="<?= $data['sp_ht']['sp_ma'] ?>">
                                        <i class='btn-pay-icon bx bxs-cart-add'></i>
                                        Thêm vào giỏ hàng
                                    </button>
                                    <button class="btn_cus btn--primary btn-sl-sell btn_ss btn_sosanh_mua" data-idsp="<?= $data['sp_ht']['sp_ma'] ?>" type="button">Mua ngay</button>
                                </div>
                                <div class="col-sm-6" style="padding-top: 20px ;">
                                    <button class="btn_cus btn-sl-cart btn_ss btn_sosanh_them" type="button" data-idsp="<?= $data['sp_ss']['sp_ma'] ?>">
                                        <i class='btn-pay-icon bx bxs-cart-add'></i>
                                        Thêm vào giỏ hàng
                                    </button>
                                    <button class="btn_cus btn--primary btn-sl-sell btn_ss btn_sosanh_mua" data-idsp="<?= $data['sp_ss']['sp_ma'] ?>" type="button">Mua ngay</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>