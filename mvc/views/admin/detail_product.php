<div class="col-sm-10" style="min-height: 784px; background-color: white; padding-left: 10px; margin-bottom: 65px;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Chi tiết sản phẩm</h3>

            <div class="form-btn">
                <input type="hidden" id="ma_sp" value="">
                <button class="btn_cus btn-addsp" style="border-radius: 4px; margin-right: 20px;" onclick='location.href="http://localhost/web_mvc/Admin/update_sp/<?= $data['sp']['sp_ma']?>"'><i class='fa fa-pencil-square-o' style="font-weight: 600;"></i>Sửa sản phẩm</button>
                <button class="btn_cus btn-back" onclick="location.href='http://localhost/web_mvc/Admin/list_sp';"><i class='bx bx-left-arrow-alt'></i> Trở về</button>
            </div>

        </div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs sign-header" style="border: none; margin-bottom: 30px; margin-top: 0;" id="navId">
            <li class="nav-item">
                <a href="#tab1Id" class="nav-link active " id="info_sp" data-toggle="tab">Thông tin sản
                    phẩm</a>
            </li>
            <li class="nav-item">
                <a href="#tab2Id" class="nav-link disabled " id="thongso_sp" data-toggle="tab">Thông số kỹ thuật</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="tab1Id" role="tabpanel">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group " style="margin-bottom: 20px;">
                            <label for="" class="form-label">Hình ảnh sản phẩm:</label>
                            <div class="form-wrap form-span">
                                <img src="http://localhost/web_mvc/<?= $data['sp']['sp_img'] ?>" alt="" id="img_insert">
                            </div>
                        </div>
                        <div class="form-group " style="margin-bottom: 20px; margin-top: 200px;" style=" padding-top: 120px;">
                            <label for="" class="form-label">Mô tả sản phẩm:</label>
                            <div class="form-wrap form-span" style="background-color: #ffff;">
                                <p><?= $data['sp']['sp_mota'] != '' ? $data['sp']['sp_mota'] : 'Không có mô tả' ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group " style="margin-bottom: 20px;">
                            <label for="" class="form-label sp_lb">Tên sản phẩm:</label>
                            <div class="form-wrap form-span">
                                <span><?= $data['sp']['sp_name'] ?></span>
                            </div>
                        </div>
                        <div class="form-group " style="margin-bottom: 20px;">
                            <label for="" class="form-label">Nhóm hàng:</label>
                            <div class="form-wrap form-span">
                                <span><?= $data['sp']['ten_loai'] ?></span>
                            </div>
                        </div>
                        <div class="form-group " style="margin-bottom: 20px;">
                            <label for="" class="form-label">Thương hiệu:</label>
                            <div class="form-wrap form-span">
                                <span><?= $data['sp']['ten_nsx'] ?></span>
                            </div>
                        </div>
                        <div class="form-group " style="margin-bottom: 20px;">
                            <label for="" class="form-label sl_lb">Số lượng:</label>
                            <div class="form-wrap form-span">
                                <span><?= $data['sp']['sp_sl'] ?> sản phẩm</span>
                            </div>
                        </div>
                        <div class="form-group " style="margin-bottom: 20px;">
                            <label for="" class="form-label gia_lb">Giá vốn:</label>
                            <div class="form-wrap form-span">
                                <span><?= number_format($data['sp']['sp_gia']) ?>đ</span>
                            </div>
                        </div>
                        <div class="form-group " style="margin-bottom: 20px;">
                            <label for="" class="form-label giaban_lb">Giá bán:</label>
                            <div class="form-wrap form-span">
                                <span><?= number_format($data['sp']['sp_giaban']) ?>đ</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade" id="tab2Id" role="tabpanel">
                <div class="row" >
                    <?php
                    switch ($data['sp']['ma_loai']) {
                        case 1:
                            require_once "./mvc/views/layout_tskt/tskt_tv.php";
                            break;
                        case 2:
                            require_once "./mvc/views/layout_tskt/tskt_maylanh.php";
                            break;
                        case 3:
                            require_once "./mvc/views/layout_tskt/tskt_tulanh.php";
                            break;
                        case 4:
                            require_once "./mvc/views/layout_tskt/tskt_loa.php";
                            break;
                        case 5:
                            require_once "./mvc/views/layout_tskt/tskt_lonuong.php";
                            break;
                        case 6:
                            require_once "./mvc/views/layout_tskt/tskt_maygiat.php";
                            break;
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>