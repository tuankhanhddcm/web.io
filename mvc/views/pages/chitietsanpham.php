<div class="main">
    <?php foreach ($data["sanpham"] as $val) : ?>
        <section class="url-heading">
            <div class="grid">
                <div class="grid__row">
                    <div class="col-xs-12">
                        <ul class="url-list">
                            <li class="url-item home">
                                <a href="../home" class="url-link">Trang chủ</a>
                                <span><i class=' right-icon bx bx-chevron-right'></i></span>
                                <a href=" ../danhmuc/<?= $val["ma_loai"] ?>" class="url-link"><?= $val['ten_loai'] ?></a>
                                <span><i class=' right-icon bx bx-chevron-right'></i></span>
                            </li>
                            <li class="url-item">
                                <span class="url-name"><?= $val["sp_name"]  ?></span>
                            </li>
                        </ul>
                        <div class="product-detail__name">
                            <h1 class="product-detail__name-text"><?= $val["sp_name"]  ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="product-detail">
            <div class="grid">
                <div class="grid__row">
                    <div class="col-sm-3">
                        <div class="product-detail__img">
                            <img class="product-detail__img-main" src=" http://localhost/web_mvc/<?= $val["sp_img"] ?>" alt="">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="product-detail-wrap">
                            <div class="product-detail__price">
                                <strong class="detail__price"><?= number_format($val["sp_giaban"] - $val["sp_giaban"] * 0.2) ?>đ</strong>
                                <strong class="detail__oldprice"><?= number_format($val["sp_giaban"]) ?>đ</strong>
                                <span class="detail__precent">-20%</span>
                            </div>
                            <div class="product-detail__sale">
                                <div class="detail-title">
                                    <h3 class="detail-text">Khuyễn mãi đặc biệt (SL có hạn)</h3>
                                </div>
                                <ul class="detail-sale__list">
                                    <li class="detail-sale-item">
                                        <i class='bx bxs-right-arrow'></i>
                                        <span>Miễn phí 12 tháng xem truyền hình gói Gia đình trên ứng dụng CLIPTV</span>
                                    </li>
                                    <li class="detail-sale-item">
                                        <i class='bx bxs-right-arrow'></i>
                                        <span>Miễn phí 12 tháng xem truyền hình gói Gia đình trên ứng dụng CLIPTV</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-detail-pay">
                            <div class="detail-sl">
                                <h3 class="detail-sl-text">Số lượng:</h3>
                                <div class="detail-sl_btn">
                                    <button type="button" onclick="giamsl('<?= $val['sp_ma'] ?>')" class="btn-calc btn-sl_tru tru">
                                        <i class='btn-sl__icon bx bx-minus'></i>
                                    </button>
                                    <input class="btn-sl sl" name="soluong" id="<?= $val['sp_ma'] ?>" min="1" value="1">
                                    <button type="button" onclick="tangsl('<?= $val['sp_ma'] ?>')" class=" btn-calc btn-sl_cong cong">
                                        <i class='btn-sl__icon bx bx-plus'></i>
                                    </button>
                                </div>
                                <span class="detail-sl_title">Tình trạng:</span>
                                <?php if ($val["sp_sl"] > 0) { ?>
                                    <span class="detail-sl_status">Còn hàng</span>
                                <?php } else { ?>
                                    <span class="detail-sl_status " style="color: red;">Tạm hết hàng</span>
                                <?php } ?>
                            </div>
                            <div class="btn-sl__pay">
                                <?php if ($val["sp_sl"] > 0) { ?>
                                    <input type="hidden" name="productID" id="productID" value="<?= $val['sp_ma'] ?>">
                                    <button class="btn_cus btn-sl-cart" type="button" onclick="addcart();showproduct()" id="addcart">
                                        <i class='btn-pay-icon bx bxs-cart-add'></i>
                                        Thêm vào giỏ hàng
                                    </button>
                                    <button class="btn_cus btn--primary btn-sl-sell" type="button" id="paycart">Mua ngay</button>
                                <?php } else { ?>
                                    <input type="hidden" name="productID" id="productID" value="<?= $val['sp_ma'] ?>">
                                    <button disabled style="opacity: .6;cursor: default;" class="btn_cus btn-sl-cart" type="button" onclick="addcart();showproduct()" id="addcart">
                                        <i class='btn-pay-icon bx bxs-cart-add'></i>
                                        Thêm vào giỏ hàng
                                    </button>
                                    <button disabled style="opacity: .6; cursor: default;" class="btn_cus btn--primary btn-sl-sell" type="button" id="paycart">Mua ngay</button>
                                <?php } ?>

                            </div>

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-detail-info">
                            <h2 class="detail-info__text">Thông số kỹ thuật</h2>
                            <?php foreach ($data['thongso'] as $thongso) : ?>
                                <ul class="detail-info-list">
                                    <li>
                                        <span class="detail-info-name">Loại tivi:</span>
                                        <span class="detail-info-value"><?php echo $thongso['loai_sp'] . ", " . $thongso["kich_co_tv"] . " ich, " . $thongso["do_phan_giai"] ?></span>
                                    </li>
                                    <li>
                                        <span class="detail-info-name">Hệ điều hành:</span>
                                        <span class="detail-info-value"><?= $thongso["he_dieu_hanh"]  ?></span>
                                    </li>
                                    <li>
                                        <span class="detail-info-name">Ứng dụng:</span>
                                        <span class="detail-info-value"><?= $thongso["ung_dung"]  ?></span>
                                    </li>
                                    <li>
                                        <span class="detail-info-name">Công nghệ hình ảnh:</span>
                                        <span class="detail-info-value"><?= $thongso["cong_nghe"]  ?></span>
                                    </li>
                                    <li>
                                        <span class="detail-info-name">Tính năng thông minh:</span>
                                        <span class="detail-info-value"><?= $thongso["tinh_nang"]  ?></span>
                                    </li>
                                    <li>
                                        <span class="detail-info-name">Bảo hành:</span>
                                        <span class="detail-info-value"><?= $thongso["bao_hanh"]  ?></span>
                                    </li>
                                    <li>
                                        <span class="detail-info-name">Kích thước:</span>
                                        <span class="detail-info-value"><?= $thongso["kich_thuoc"]  ?></span>
                                    </li>
                                    <li>
                                        <span class="detail-info-name">Năm ra mắt:</span>
                                        <span class="detail-info-value"><?= $thongso["nam_sx"]  ?></span>
                                    </li>
                                    <li>
                                        <span class="detail-info-name">Hãng:</span>
                                        <span class="detail-info-value"><?= $data["nsx"]  ?></span>
                                    </li>
                                </ul>
                            <?php endforeach; ?>
                            <button type="button" class="btn_cus btn-detail-info " data-toggle="modal" data-target="#thongsokythuat">Xem chi tiết thông số kỹ thuật</button>
                            <!-- Modal -->
                            <div class="modal fade" id="thongsokythuat" tabindex="-1" role="dialog" aria-labelledby="info-text" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="info-text">Thông số kỹ thuật</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body body-info">
                                            <?php foreach ($data['thongso'] as $thongso) : ?>
                                                <ul class="detail-info-list">
                                                    <li>
                                                        <span class="detail-info-name">Loại tivi:</span>
                                                        <span class="detail-info-value"><?= $thongso['loai_sp'] ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="detail-info-name">Kích cỡ màn hình:</span>
                                                        <span class="detail-info-value"><?= $thongso['kich_co_tv'] ?> ich</span>
                                                    </li>
                                                    <li>
                                                        <span class="detail-info-name">Độ phân giải:</span>
                                                        <span class="detail-info-value"><?= $thongso['do_phan_giai'] ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="detail-info-name">Hệ điều hành:</span>
                                                        <span class="detail-info-value"><?= $thongso['he_dieu_hanh'] ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="detail-info-name">Ứng dụng:</span>
                                                        <span class="detail-info-value"><?= $thongso['ung_dung'] ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="detail-info-name">Công nghệ hình ảnh:</span>
                                                        <span class="detail-info-value"><?= $thongso['cong_nghe'] ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="detail-info-name">Tính năng thông minh:</span>
                                                        <span class="detail-info-value"><?= $thongso['tinh_nang'] ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="detail-info-name">kết nối:</span>
                                                        <span class="detail-info-value"><?= $thongso['ket_noi'] ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="detail-info-name">Công nghệ loa:</span>
                                                        <span class="detail-info-value"><?= $thongso['loa'] ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="detail-info-name">Công suất:</span>
                                                        <span class="detail-info-value"><?= $thongso['cong_suat'] ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="detail-info-name">Kích thước:</span>
                                                        <span class="detail-info-value"><?= $thongso['kich_thuoc'] ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="detail-info-name">Khối lượng:</span>
                                                        <span class="detail-info-value"><?= $thongso['khoi_luong'] ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="detail-info-name">Nơi sản xuất:</span>
                                                        <span class="detail-info-value"><?= $thongso['noi_san_xuat'] ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="detail-info-name">Bảo hành:</span>
                                                        <span class="detail-info-value"><?= $thongso['bao_hanh'] ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="detail-info-name">Năm ra mắt:</span>
                                                        <span class="detail-info-value"><?= $thongso['nam_sx'] ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="detail-info-name">Hãng:</span>
                                                        <span class="detail-info-value"><?= $data['nsx'] ?></span>
                                                    </li>
                                                </ul>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end modal -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>