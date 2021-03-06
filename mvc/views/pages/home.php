<div class="grid main_container">
    <div class="container__banner">
        <div class="grid">
            <div class="grid__row">
                <div class="col-sm-12 " style="padding: 0;">
                    <div id="silde" class="carousel slide container__slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#silde" data-slide-to="0" class="active"></li>
                            <li data-target="#silde" data-slide-to="1">
                            </li>
                            <li data-target="#silde" data-slide-to="2"></li>
                            <li data-target="#silde" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100 carousel-img" src="http://localhost/web_mvc/public/img/banner/banner1.png" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 carousel-img" src="http://localhost/web_mvc/public/img/banner/banner2.png" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 carousel-img" src="http://localhost/web_mvc/public/img/banner/banner3.png" alt="Third slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 carousel-img" src="http://localhost/web_mvc/public/img/banner/banner4.png" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#silde" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#silde" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>


    </div>
    <div class="product__sale">
        <div class="row">
            <div class="col-md-12">
                <div class="product__sale-title">
                    <span class="product__sale-title--a">Gi?? s???c cu???i tu???n</span>
                    <div class="product__sale-sile">
                        <div class="owl-carousel owl-theme" id="slider">
                            <?php foreach ($data["sp_sale"] as $val) { 
                                if($val['sp_giagiam'] > 0){
                            ?>
                                <div class="item">
                                    <a class="card-item card_height" style="text-align: left;"  href="./Detail/<?= $val['sp_url']; ?>">
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
                                                <strong class="card__price"><?= number_format($val['sp_giagiam']) ?>??</strong>
                                                <strong class="card__oldprice"><?= number_format($val["sp_giaban"]) ?>??</strong>
                                                <span class="card__precent"><?= round($phantram,0)?>%</span>
                                            <?php } else { ?>
                                                <strong class="card__price"><?= number_format($val["sp_giaban"]) ?>??</strong>
                                            <?php } ?>
                                        </div>
                                    </a>
                                </div>
                            <?php }
                                } 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-category" id="danhmuc">
        <div class="grid">
            <div class="product-category__text"><span class="product-category__title">Danh m???c</span></div>
            <div class="product-category__item-wrap">
                <div class="grid__row">
                    <?php foreach ($data["loaisp"] as $loai) { ?>
                        <div class="col-sm-2">
                            <a href="./Danhmuc/<?= $loai['ma_loai'] ?>" class="product-category__item">
                                <div class="category-img">
                                    <img class="product-category__img" src="http://localhost/web_mvc/<?= $loai['loai_img'] ?>" alt="">
                                </div>
                                <div class="product-categor__label"><span><?= $loai['ten_loai']  ?></span></div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="product-list">
        <div class="product-list__heading">
            <span class="product-list__title">S???n ph???m n???i b???t</span>
        </div>
        <div class="product-list__home">
            <div class="grid__row" id="home_sp">
                

            </div>
            <div class="col-sm-12" id="div_view">
                <button class="btn_cus viewmore" data-sl="4" onclick="more_sp($(this).data('sl'))">Xem th??m <span id="view_home"><?= $data['conlai'] ?></span> s???n ph???m</button>
            </div>
        </div>
    </div>
</div>