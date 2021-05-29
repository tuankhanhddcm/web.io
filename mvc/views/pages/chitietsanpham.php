<div class="main">
    <section class="url-heading">
        <div class="grid">
            <div class="grid__row">
                <div class="col-xs-12">
                    <ul class="url-list">
                        <li class="url-item home">
                            <a href="../home" class="url-link">Trang chủ</a>
                            <span><i class=' right-icon bx bx-chevron-right'></i></span>
                            <a href=' http://localhost/web_mvc/danhmuc/<?= $data["sanpham"]["ma_loai"] ?>' class="url-link"><?= $data["sanpham"]['ten_loai'] ?></a>
                            <span><i class=' right-icon bx bx-chevron-right'></i></span>
                        </li>
                        <li class="url-item">
                            <span class="url-name"><?= $data["sanpham"]["sp_name"]  ?></span>
                        </li>
                    </ul>
                    <div class="product-detail__name">
                        <h1 class="product-detail__name-text"><?= $data["sanpham"]["sp_name"]  ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="product-detail">
        <div class="grid">
            <div class="grid__row">
                <div class="col-sm-8">
                    <div class="grid__row">
                        <div class="col-sm-5">
                            <div class="product-detail__img">
                                <img class="product-detail__img-main" src=" http://localhost/web_mvc/<?= $data["sanpham"]["sp_img"] ?>" alt="">
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-detail-wrap">
                                <div class="product-detail__price">
                                    <?php if ($data['sanpham']['sp_giagiam'] > 0) {
                                        $phantram = ((float)$data['sanpham']['sp_giagiam'] / (float)$data['sanpham']['sp_giaban'] - 1) * 100;
                                    ?>
                                        <strong class="detail__price"><?= number_format($data['sanpham']['sp_giagiam']) ?>đ</strong>
                                        <strong class="detail__oldprice"><?= number_format($data['sanpham']["sp_giaban"]) ?>đ</strong>
                                        <span class="detail__precent"><?= round($phantram, 0) ?>%</span>
                                    <?php } else { ?>
                                        <strong class="detail__price"><?= number_format($data['sanpham']["sp_giaban"]) ?>đ</strong>
                                    <?php } ?>
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
                                        <button type="button" onclick="giamsl('<?= $data['sanpham']['sp_ma'] ?>')" class="btn-calc btn-sl_tru tru">
                                            <i class='btn-sl__icon bx bx-minus'></i>
                                        </button>
                                        <input class="btn-sl sl" name="soluong" id="<?= $data["sanpham"]['sp_ma'] ?>" min="1" value="1">
                                        <button type="button" onclick="tangsl('<?= $data['sanpham']['sp_ma'] ?>')" class=" btn-calc btn-sl_cong cong">
                                            <i class='btn-sl__icon bx bx-plus'></i>
                                        </button>
                                    </div>
                                    <span class="detail-sl_title">Tình trạng:</span>
                                    <?php if ($data["sanpham"]["sp_sl"] > 0) { ?>
                                        <span class="detail-sl_status">Còn hàng</span>
                                    <?php } else { ?>
                                        <span class="detail-sl_status " style="color: red;">Tạm hết hàng</span>
                                    <?php } ?>
                                </div>
                                <div class="btn-sl__pay">
                                    <?php if ($data["sanpham"]["sp_sl"] > 0) { ?>
                                        <input type="hidden" name="productID" id="productID" value="<?= $data["sanpham"]['sp_ma'] ?>">
                                        <button class="btn_cus btn-sl-cart" type="button" onclick="addcart();" id="addcart">
                                            <i class='btn-pay-icon bx bxs-cart-add'></i>
                                            Thêm vào giỏ hàng
                                        </button>
                                        <button class="btn_cus btn--primary btn-sl-sell" type="button" id="paycart">Mua ngay</button>
                                    <?php } else { ?>
                                        <input type="hidden" name="productID" id="productID" value="<?= $data["sanpham"]['sp_ma'] ?>">
                                        <button disabled style="opacity: .6;cursor: default;" class="btn_cus btn-sl-cart" type="button" onclick="addcart();" id="addcart">
                                            <i class='btn-pay-icon bx bxs-cart-add'></i>
                                            Thêm vào giỏ hàng
                                        </button>
                                        <button disabled style="opacity: .6; cursor: default;" class="btn_cus btn--primary btn-sl-sell" type="button" id="paycart">Mua ngay</button>
                                    <?php } ?>

                                </div>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="product-detail_mota">
                                <h3 class="title_mota">Đặc điểm nổi bật</h3>
                                <ul>
                                    <?php foreach ($data['mota'] as $val) :
                                        if ($val != '') { ?>
                                            <li><?= $val ?></li>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-detail-info">
                        <h2 class="detail-info__text">Thông số kỹ thuật</h2>
                        <ul class="detail-info-list">
                            <?php if (isset($data['thongso']) && !empty($data['thongso'])) {
                                switch ($data['sanpham']['ma_loai']) {
                                    case 1:
                                        echo ' 
                                        <li>
                                        <span class="detail-info-name">Loại tivi:</span>
                                        <span class="detail-info-value">' . $data["thongso"]['loai_sp'] . ', ' . $data["thongso"]["kich_co_tv"] . ' ich, ' . $data["thongso"]["do_phan_giai"] . ' </span>
                                    </li>
                                    <li>
                                        <span class="detail-info-name">Hệ điều hành:</span>
                                        <span class="detail-info-value">' . $data["thongso"]["he_dieu_hanh"] . '</span>
                                    </li>
                                    <li>
                                        <span class="detail-info-name">Ứng dụng:</span>
                                        <span class="detail-info-value">' . $data["thongso"]["ung_dung"] . '</span>
                                    </li>
                                    <li>
                                        <span class="detail-info-name">Công nghệ hình ảnh:</span>
                                        <span class="detail-info-value">' . $data["thongso"]["cong_nghe"] . '</span>
                                    </li>
                                    <li>
                                        <span class="detail-info-name">Tính năng thông minh:</span>
                                        <span class="detail-info-value">' . $data["thongso"]["tinh_nang"] . '</span>
                                    </li>
                                    ';
                                        break;
                                    case 3:
                                        echo '
                                <li>
                                    <span class="detail-info-name">Loại tủ:</span>
                                    <span class="detail-info-value">' . $data["thongso"]['loai_sp'] . ', ' . $data["thongso"]["dung_tich"] . ' </span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Điện tiêu thu:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["cong_suat"] . '</span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Công nghệ tiết kiệm điện:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["kieu_tu"] . '</span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Công nghệ làm lạnh:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["cong_nghe"] . '</span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Công nghệ kháng khuẩn:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["ung_dung"] . '</span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Tiện ích:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["tinh_nang"] . '</span>
                                </li>
                                    ';
                                        break;
                                    case 2:
                                        echo '
                                <li>
                                    <span class="detail-info-name">Loại máy lạnh:</span>
                                    <span class="detail-info-value">' . $data["thongso"]['loai_sp'] . ', ' . $data["thongso"]["kieu_tu"] . ' </span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Công suất làm lạnh, sưởi ấm:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["cong_suat"] . '</span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Phạm vi làm lạnh hiệu quả:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["dung_tich"] . '</span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Lọc bụi, kháng khuẩn, khử mùi:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["ung_dung"] . '</span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Chế độ gió:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["ket_noi"] . '</span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Tiện ích:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["tinh_nang"] . '</span>
                                </li>
                                ';
                                        break;
                                    case 4:
                                        echo '
                                <li>
                                    <span class="detail-info-name">Loại loa:</span>
                                    <span class="detail-info-value">' . $data["thongso"]['loai_sp'] . ' </span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Tương thích:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["he_dieu_hanh"] . '</span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Tổng công suất:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["cong_suat"] . '</span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Kết nối:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["ket_noi"] . '</span>
                                </li>
                                
                                <li>
                                    <span class="detail-info-name">Tiện ích:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["tinh_nang"] . '</span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Phím điều khiển:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["cong_nghe"] . '</span>
                                </li>
                                ';
                                        break;
                                    case 5:
                                        echo '
                                <li>
                                    <span class="detail-info-name">Loại lò nướng:</span>
                                    <span class="detail-info-value">' . $data["thongso"]['loai_sp'] . ' </span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Dung tích:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["dung_tich"] . '</span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Công suất:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["cong_suat"] . '</span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Chất liệu lò:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["chat_lieu"] . '</span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Chức năng chính:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["cong_nghe"] . '</span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Tiện ích:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["tinh_nang"] . '</span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Bảng điều khiển:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["ket_noi"] . '</span>
                                </li>
                                ';
                                        break;
                                    case 6:
                                        echo '
                                <li>
                                    <span class="detail-info-name">Loại máy giặt:</span>
                                    <span class="detail-info-value">' . $data["thongso"]['loai_sp'] . ', ' . $data["thongso"]['so_canh_cua'] . ' </span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Khối lượng giặt:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["dung_tich"] . '</span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Kiểu động cơ:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["kieu_tu"] . '</span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Công nghệ giặt:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["cong_nghe"] . '</span>
                                </li>
                                
                                <li>
                                    <span class="detail-info-name">Tiện ích:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["tinh_nang"] . '</span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Bảng điều khiển:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["ket_noi"] . '</span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Chất liệu máy:</span>
                                    <span class="detail-info-value">' . $data["thongso"]["chat_lieu"] . '</span>
                                </li>
                                ';
                                        break;
                                }
                            ?>

                                <li>
                                    <span class="detail-info-name">Kích thước:</span>
                                    <span class="detail-info-value"><?= $data["thongso"]["kich_thuoc"] ?></span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Bảo hành:</span>
                                    <span class="detail-info-value"><?= $data["thongso"]["bao_hanh"] ?></span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Năm ra mắt:</span>
                                    <span class="detail-info-value"><?= $data["thongso"]['nam_sx'] ?></span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Nơi sản xuất:</span>
                                    <span class="detail-info-value"><?= $data["thongso"]['noi_san_xuat'] ?></span>
                                </li>
                                <li>
                                    <span class="detail-info-name">Hãng:</span>
                                    <span class="detail-info-value"><?= $data["nsx"] ?></span>
                                </li>
                            <?php } else { ?>
                                <li>
                                    <h3>Sản phẩm chưa có thông số kỹ thuật</h3>
                                </li>
                            <?php } ?>
                        </ul>
                        <button type="button" class="btn_cus btn-detail-info " data-toggle="modal" data-target="#thongsokythuat">Xem chi tiết thông số kỹ thuật</button>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="product-detail_tuongtu">
                        <h3 class="title-tuongtu">Sản phẩm tương tự cùng phân khúc giá</h3>
                        <div class="product-detail_tuongtu-owl">
                            <div class="grid__row">
                                <?php if (isset($data['sp_gia']) && !empty($data['sp_gia'])) { ?>
                                    <?php if (count($data['sp_gia']) <= 5) { ?>
                                        <?php foreach ($data["sp_gia"] as $val) {?>
                                                <div class="col-2-5 ">
                                                    <a class="card-item card_height" href="http://localhost/web_mvc/Detail/<?= $val['sp_url']; ?>">
                                                        <div class="card-item__img">
                                                            <img src="http://localhost/web_mvc/<?= $val["sp_img"]  ?>" alt="" class="card__img  -fluid">
                                                        </div>
                                                        <div class="card__name">
                                                            <span class="card__name-sp"><?= $val["sp_name"] ?></span>
                                                        </div>
                                                        <div class="card__body">
                                                            <?php if ($val['sp_giagiam'] > 0) {
                                                                $phantram = ((float)$val['sp_giagiam'] / (float)$val['sp_giaban'] - 1) * 100;
                                                            ?>
                                                                <strong class="card__price"><?= number_format($val['sp_giagiam']) ?>đ</strong>
                                                                <strong class="card__oldprice"><?= number_format($val["sp_giaban"]) ?>đ</strong>
                                                                <span class="card__precent"><?= round($phantram, 0) ?>%</span>
                                                            <?php } else { ?>
                                                                <strong class="card__price"><?= number_format($val["sp_giaban"]) ?>đ</strong>
                                                            <?php } ?>
                                                            
                                                        </div>
                                                        
                                                    </a>
                                                    <button class="btn_sosanh" data-sosanh="<?=$val['sp_ma']?>" data-sp="<?= $data["sanpham"]["sp_ma"]  ?>">So sánh</button>
                                                </div>
                                        <?php }?>
                                    <?php } else { ?>
                                        <div class="owl-carousel owl-theme" id="slider">
                                            <?php foreach ($data["sp_gia"] as $val) {?>
                                                    <div class="item">
                                                        <a class="card-item card_height" style="text-align: left;" href="./Detail/<?= $val['sp_url']; ?>">
                                                            <div class="card-item__img">
                                                                <img src="http://localhost/web_mvc/<?= $val["sp_img"]  ?>" alt="" class="card__img img-fluid">
                                                            </div>
                                                            <div class="card__name">
                                                                <span class="card__name-sp"><?= $val["sp_name"] ?></span>
                                                            </div>
                                                            <div class="card__body">
                                                                <?php if ($val['sp_giagiam'] > 0) {
                                                                    $phantram = ((float)$val['sp_giagiam'] / (float)$val['sp_giaban'] - 1) * 100;
                                                                ?>
                                                                    <strong class="card__price"><?= number_format($val['sp_giagiam']) ?>đ</strong>
                                                                    <strong class="card__oldprice"><?= number_format($val["sp_giaban"]) ?>đ</strong>
                                                                    <span class="card__precent"><?= round($phantram, 0) ?>%</span>
                                                                <?php } else { ?>
                                                                    <strong class="card__price"><?= number_format($val["sp_giaban"]) ?>đ</strong>
                                                                <?php } ?>
                                                                <a href="http://">So sánh</a>
                                                            </div>
                                                        </a>
                                                    </div>
                                            <?php }?>
                                        </div>
                                    <?php } ?>
                                <?php } else { ?>
                                    <h3 class="empty-sp">Không có sản phẩm nào</h3>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>