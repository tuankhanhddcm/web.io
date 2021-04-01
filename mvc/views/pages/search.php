<div class="danhmuc__wrap " style="margin-top: 126px; padding-bottom:20px">
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
                            <span class="url-name ">Tìm kiếm</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="grid">
        <div class="grid__row">
            <div class="col-sm-12">
                <div class="home-sort">
                    <span class="home-sort__lable" style="font-size: 1.6rem;" >Tìm thấy <span style="color: black; font-size:1.6rem; font-weight: 600;"><?=$data['ketqua'] ?></span> sản phẩm:</span>
                    <span class="home-sort__lable">Sắp xếp theo</span>
                    <button class="btn_cus btn-sort  sapxep" onclick="filter_banchay();">Bán chạy</button>
                    <button class="btn_cus btn-sort sapxep" value="desc" onclick="filter_gia_search($(this).val());">Giá cao đến thấp</button>
                    <button class="btn_cus btn-sort sapxep" value="asc" onclick="filter_gia_search($(this).val());" >Giá thấp đến cao</button>
                </div>
                <div class="grid__row " id="danhmuc">
                    <?php
                    if (!empty($data["sanpham"])) {
                        foreach ($data["sanpham"] as $val) : ?>

                            <div class="col-2-5 ">
                                <a class="card-item " href="../Detail/<?= $val["sp_url"] ?>">
                                    <div class="card-item__img">
                                        <img src="http://localhost/web_mvc/<?= $val["sp_img"] ?>" alt="" class="card__img">
                                    </div>
                                    <div class="card__name">
                                        <span class="card__name-sp"><?= $val["sp_name"] ?></span>
                                    </div>
                                    <div class="card__body">
                                        <strong class="card__price"><?= number_format($val["sp_giaban"] - $val["sp_giaban"] * 0.2) ?>đ</strong>
                                        <strong class="card__oldprice"><?= number_format($val["sp_giaban"]) ?>đ</strong>
                                        <span class="card__precent">-20%</span>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach;
                    } else {
                        ?>
                        <div class="danhmuc_rong ">
                            <h2 class="danhmuc-rong__text">Không tìm thấy sản phẩm nào!!!</h2>
                        </div>
                    <?php  } ?>
                </div>
            </div>
        </div>
    </div>
</div>