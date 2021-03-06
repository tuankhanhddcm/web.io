<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"  crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./mvc/public/css/base.css">
  <link rel="stylesheet" href="./mvc/public/css/main.css">
  <link rel="stylesheet" href="./mvc/public/css/container.css">
  <link rel="stylesheet" href="./mvc/public/css/lightslider.css">
  <title>KStore</title>
</head>
<body>
  <div class="app">
    <!-- header -->
    <header class="header">
      <div class="grid">
        <nav class="header__navbar">
          <ul class="header__navbar-list header__navbar-socials">
            <li class="header__navbar-item">
              Kết nối 
              <i class='bx bxl-facebook-circle nav__icon'></i>
              <i class='bx bxl-google nav__icon' ></i>
            </li>
          </ul>
          <ul class="header__navbar-list">
              <li class="header__navbar-item header__navbar-user">
                <a href="" class="header__navbar-user-link">
                  <img src="https://yt3.ggpht.com/yti/ANoDKi4u6XzxVZups14lSw3SRRGG-7S4XqREzn0-rVCo=s88-c-k-c0x00ffffff-no-rj-mo" alt="" class="header__navbar-user-img">
                  <span class="header__navbar-user-name">Tuấn Khanh</span>
                </a>
                <ul class="header__navbar-user-menu">
                  <li class="header__navbar-user-item">
                    <a href="">Tài khoản của tôi</a>
                  </li>
                  <li class="header__navbar-user-item">
                    <a href="">Đơn mua</a>
                  </li>
                  <li class="header__navbar-user-item header__navbar-user-item--separate ">
                    <a href="">Đăng xuất</a>
                  </li>
                </ul>
              </li>
          </ul>
        </nav>
        <!-- header search -->
        <div class="header-with-search">
          <div class="header__logo">
            <a href="" class="header__logo-link">
              <img src="./mvc/public/img/kstore1.png" alt="" class="logo">
            </a>
          </div>
          <div class="header__search">
            <div class="header__search-input-wrap">
              <input type="text" class="header__search-input" placeholder="Nhập để tìm kiếm sản phẩm">
              <div class="header__search-history">
                <ul class="header__search-history-list">
                  <li class="header__search-history-item">
                    <a href=""> TVs</a>
                  </li>
                  <li class="header__search-history-item">
                    <a href=""> TVs</a>
                  </li>
                  <li class="header__search-history-item">
                    <a href=""> TVs</a>
                  </li>
                </ul>
              </div>
            </div>
            <button class="header__search-btn">
              <i class=' header__search-btn-icon bx bx-search' ></i>
            </button>
          </div>
          <!--  header cart -->
          <div class="header__cart">
            <div class="header__Cart-wrap">
              <a href="">
                <i class='header__cart-icon bx bx-cart-alt' ></i>
                <span class="header__cart-notice">3</span>
              </a>
              <!-- không có sản phẩm: header__cart-list--no-cart  -->
              <div class="header__cart-list ">
                <img src="./mvc/public/img/cartempty.jpg" alt="" class="header__cart-no-cart-img">
                <span class="header__cart-list-no-cart-msg ">Chưa có sản phẩm</span>
                <div class="header__cart-list--has-cart">
                  <h4 class="header__cart-heading">Sản phẩm đã thêm</h4>
                  <ul class="header__cart-list-item">
                    <li class="header__cart-item">
                      <img src="https://cdn.tgdd.vn/Products/Images/1942/212647/samsung-ua43r6000-24-550x340.jpg" alt="" class="header__cart-img">
                      <div class="header__cart-item-info">
                        <div class="header__cart-item-head">
                          <h5 class="header__cart-item-name">Smart Tivi Samsung 43 inch UA43R6000</h5>
                          <div class="header__cart-item-price-wrap">
                            <span class="header__cart-item-price">7.900.000₫</span>
                            <span class="header__cart-item-nhan">x</span>
                            <span class="header__cart-item-soluong">2</span>
                          </div>
                        </div>
                        <div class="header__cart-item-body">
                          <span class="header__cart-item-mota">Phân loại: bạc</span>
                          <span class="header__cart-item-remove">Xóa</span>
                        </div>
                      </div>
                    </li>
                    <li class="header__cart-item">
                      <img src="https://cdn.tgdd.vn/Products/Images/1942/212647/samsung-ua43r6000-24-550x340.jpg" alt="" class="header__cart-img">
                      <div class="header__cart-item-info">
                        <div class="header__cart-item-head">
                          <h5 class="header__cart-item-name">Smart Tivi Samsung 43 inch UA43R6000</h5>
                          <div class="header__cart-item-price-wrap">
                            <span class="header__cart-item-price">7.900.000₫</span>
                            <span class="header__cart-item-nhan">x</span>
                            <span class="header__cart-item-soluong">2</span>
                          </div>
                        </div>
                        <div class="header__cart-item-body">
                          <span class="header__cart-item-mota">Phân loại: bạc</span>
                          <span class="header__cart-item-remove">Xóa</span>
                        </div>
                      </div>
                    </li>
                    <li class="header__cart-item">
                      <img src="https://cdn.tgdd.vn/Products/Images/1942/212647/samsung-ua43r6000-24-550x340.jpg" alt="" class="header__cart-img">
                      <div class="header__cart-item-info">
                        <div class="header__cart-item-head">
                          <h5 class="header__cart-item-name">Smart Tivi Samsung 43 inch UA43R6000</h5>
                          <div class="header__cart-item-price-wrap">
                            <span class="header__cart-item-price">7.900.000₫</span>
                            <span class="header__cart-item-nhan">x</span>
                            <span class="header__cart-item-soluong">2</span>
                          </div>
                        </div>
                        <div class="header__cart-item-body">
                          <span class="header__cart-item-mota">Phân loại: bạc</span>
                          <span class="header__cart-item-remove">Xóa</span>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <a href="" class="btn-cart btn-cart-them">Xem Giỏ Hàng</a>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- End header -->
    <!-- container -->
    <div class="grid main_container">
      <div class="container__banner">
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
              <img class="d-block w-100" src="./mvc/public/img/banner/banner1.png" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="./mvc/public/img/banner/banner2.png" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="./mvc/public/img/banner/banner3.png" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="./mvc/public/img/banner/banner4.png" alt="Third slide">
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
        <div class="banner__sale">
          <div class="banner__sale-item">
            <img class="banner__Sales-img"src="mvc/public/img/banner/banner1.png" alt="">
          </div>
          <div class="banner__sale-item">
            <img class="banner__Sales-img"src="mvc/public/img/banner/banner1.png" alt="">
          </div>
        </div>
      </div>
      <div class="product__sale">
        <div class="row">
          <div class="col-md-12">
            <div class="product__sale-title">
              <span  class="product__sale-title--a" >Giá sốc cuối tuần</span>
              <div class="product__sale-sile">
                <div id="silder_product" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <div class="row  product__row ">
                        <div class="col-sm-2 product__col">
                          <div class="card card__item ">
                            <img class="card-img-top" src="./mvc/public/img/upload/samsung-ua32t4500-245820-105838-550x340.jpg" alt="">
                            <div class="card-body">
                              <h4 class="card-title"> Smart Tivi Samsung 32 inch UA32T4500</h4>
                              <div class="card-body__menu">
                                <p class="card-text">6.400.000₫</p>
                                <div class="card-body__cart">
                                  <a href=""><i class='card-body__cart-icon bx bxs-cart'></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-2    product__col">
                          <div class="card card__item ">
                            <img class="card-img-top" src="./mvc/public/img/upload/samsung-ua32t4500-245820-105838-550x340.jpg" alt="">
                            <div class="card-body">
                              <h4 class="card-title"> Smart Tivi Samsung 32 inch UA32T4500</h4>
                              <div class="card-body__menu">
                                <p class="card-text">6.400.000₫</p>
                                <div class="card-body__cart">
                                  <a href=""><i class='card-body__cart-icon bx bxs-cart'></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-2    product__col">
                          <div class="card card__item ">
                            <img class="card-img-top" src="./mvc/public/img/upload/samsung-ua32t4500-245820-105838-550x340.jpg" alt="">
                            <div class="card-body">
                              <h4 class="card-title"> Smart Tivi Samsung 32 inch UA32T4500</h4>
                              <div class="card-body__menu">
                                <p class="card-text">6.400.000₫</p>
                                <div class="card-body__cart">
                                  <a href=""><i class='card-body__cart-icon bx bxs-cart'></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-2    product__col">
                          <div class="card card__item ">
                            <img class="card-img-top" src="./mvc/public/img/upload/samsung-ua32t4500-245820-105838-550x340.jpg" alt="">
                            <div class="card-body">
                              <h4 class="card-title"> Smart Tivi Samsung 32 inch UA32T4500</h4>
                              <div class="card-body__menu">
                                <p class="card-text">6.400.000₫</p>
                                <div class="card-body__cart">
                                  <a href=""><i class='card-body__cart-icon bx bxs-cart'></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-2    product__col">
                          <div class="card card__item ">
                            <img class="card-img-top" src="./mvc/public/img/upload/samsung-ua32t4500-245820-105838-550x340.jpg" alt="">
                            <div class="card-body">
                              <h4 class="card-title"> Smart Tivi Samsung 32 inch UA32T4500</h4>
                              <div class="card-body__menu">
                                <p class="card-text">6.400.000₫</p>
                                <div class="card-body__cart">
                                  <a href=""><i class='card-body__cart-icon bx bxs-cart'></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="row  product__row ">
                        <div class="col-sm-2    product__col">
                          <div class="card card__item ">
                            <img class="card-img-top" src="./mvc/public/img/upload/samsung-ua32t4500-245820-105838-550x340.jpg" alt="">
                            <div class="card-body">
                              <h4 class="card-title"> Smart Tivi Samsung 32 inch UA32T4500</h4>
                              <div class="card-body__menu">
                                <p class="card-text">6.400.000₫</p>
                                <div class="card-body__cart">
                                  <a href=""><i class='card-body__cart-icon bx bxs-cart'></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-2    product__col">
                          <div class="card card__item ">
                            <img class="card-img-top" src="./mvc/public/img/upload/samsung-ua32t4500-245820-105838-550x340.jpg" alt="">
                            <div class="card-body">
                              <h4 class="card-title"> Smart Tivi Samsung 32 inch UA32T4500</h4>
                              <div class="card-body__menu">
                                <p class="card-text">6.400.000₫</p>
                                <div class="card-body__cart">
                                  <a href=""><i class='card-body__cart-icon bx bxs-cart'></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-2    product__col">
                          <div class="card card__item ">
                            <img class="card-img-top" src="./mvc/public/img/upload/samsung-ua32t4500-245820-105838-550x340.jpg" alt="">
                            <div class="card-body">
                              <h4 class="card-title"> Smart Tivi Samsung 32 inch UA32T4500</h4>
                              <div class="card-body__menu">
                                <p class="card-text">6.400.000₫</p>
                                <div class="card-body__cart">
                                  <a href=""><i class='card-body__cart-icon bx bxs-cart'></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-2    product__col">
                          <div class="card card__item ">
                            <img class="card-img-top" src="./mvc/public/img/upload/samsung-ua32t4500-245820-105838-550x340.jpg" alt="">
                            <div class="card-body">
                              <h4 class="card-title"> Smart Tivi Samsung 32 inch UA32T4500</h4>
                              <div class="card-body__menu">
                                <p class="card-text">6.400.000₫</p>
                                <div class="card-body__cart">
                                  <a href=""><i class='card-body__cart-icon bx bxs-cart'></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-2    product__col">
                          <div class="card card__item ">
                            <img class="card-img-top" src="./mvc/public/img/upload/samsung-ua32t4500-245820-105838-550x340.jpg" alt="">
                            <div class="card-body">
                              <h4 class="card-title"> Smart Tivi Samsung 32 inch UA32T4500</h4>
                              <div class="card-body__menu">
                                <p class="card-text">6.400.000₫</p>
                                <div class="card-body__cart">
                                  <a href=""><i class='card-body__cart-icon bx bxs-cart'></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-2    product__col">
                          <div class="card card__item ">
                            <img class="card-img-top" src="./mvc/public/img/upload/samsung-ua32t4500-245820-105838-550x340.jpg" alt="">
                            <div class="card-body">
                              <h4 class="card-title"> Smart Tivi Samsung 32 inch UA32T4500</h4>
                              <div class="card-body__menu">
                                <p class="card-text">6.400.000₫</p>
                                <div class="card-body__cart">
                                  <a href=""><i class='card-body__cart-icon bx bxs-cart'></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#silder_product" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" ></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#silder_product" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
                <!-- <div class="row  product__row ">
                  <div class="col-sm-2    product__col">
                    <div class="card card__item ">
                      <img class="card-img-top" src="./mvc/public/img/upload/samsung-ua32t4500-245820-105838-550x340.jpg" alt="">
                      <div class="card-body">
                        <h4 class="card-title"> Smart Tivi Samsung 32 inch UA32T4500</h4>
                        <div class="card-body__menu">
                          <p class="card-text">6.400.000₫</p>
                          <div class="card-body__cart">
                            <a href=""><i class='card-body__cart-icon bx bxs-cart'></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="product-category">
        <div class="grid">
            <div class="product-category__text"><span class="product-category__title">Danh mục</span></div>
            <div class="product-category__item-wrap">
              <div class="grid__row">
                <div class="col-sm-2">
                  <a href="" class="product-category__item">
                      <div class="category-img">
                        <img class="product-category__img" src="./mvc/public/img/icontv.png" alt="">
                      </div>
                      <div class="product-categor__label"><span>TV & Smart TV</span></div>
                  </a>
                </div>
                <div class="col-sm-2">
                  <a href="" class="product-category__item">
                    <div class="category-img">
                      <img class="product-category__img" src="./mvc/public/img/iconloa.png" alt="">
                    </div>
                      <div class="product-categor__label"><span>Loa</span></div>
                  </a>
                </div>
                <div class="col-sm-2">
                  <a href="" class="product-category__item">
                    <div class="category-img">
                      <img class="product-category__img" src="./mvc/public/img/fridge.png" alt="">
                    </div>
                      <div class="product-categor__label"><span>Tủ lạnh</span></div>
                  </a>
                </div>
                <div class="col-sm-2">
                  <a href="" class="product-category__item">
                    <div class="category-img">
                      <img class="product-category__img" src="./mvc/public/img/air-conditioner.png" alt="">
                    </div>
                      <div class="product-categor__label"><span>Máy lạnh</span></div>
                  </a>
                </div>
                <div class="col-sm-2" id="1">
                  <a href="#1" class="product-category__item">
                      <div class="category-img">
                        <img class="product-category__img" src="./mvc/public/img/microwave.png" alt="">
                      </div>
                      <div class="product-categor__label"><span>Lò nướng</span></div>
                  </a>
                </div>
                <div class="col-sm-2">
                  <a href="" class="product-category__item">
                    <div class="category-img">
                      <img class="product-category__img" src="./mvc/public/img/washing-machine.png" alt="">
                    </div>
                      <div class="product-categor__label"><span>Máy giặt</span></div>
                  </a>
                </div>
                
              </div>
            </div>
        </div>
      </div>
      <div class="product-list">
          <div class="product-list__heading">
              <span class="product-list__title">Sản phẩm nổi bật</span>
          </div>
          <div class="product-list__home">
            <div class="grid__row">
              <div class="col-sm-2 card-item__wrap">
                <a class="card-item" href="">
                  <img src="/mvc/public/img/upload/samsung-ua32t4500-245820-105838-550x340.jpg" alt="" class="card__img">
                  <div class="card__name">
                    <span class="card__name-sp">Smart Tivi QLED Samsung 4K 43 inch QA43Q60T</span>
                  </div>
                  <div class="card__body">
                    <strong class="card__price">8.000.000đ</strong>
                  </div>
                </a>
              </div>
              <div class="col-sm-2 card-item__wrap">
                <a class="card-item" href="">
                  <img src="/mvc/public/img/upload/samsung-ua32t4500-245820-105838-550x340.jpg" alt="" class="card__img">
                  <div class="card__name">
                    <span class="card__name-sp">Smart Tivi QLED Samsung 4K 43 inch QA43Q60T</span>
                  </div>
                  <div class="card__body">
                    <strong class="card__price">8.000.000đ</strong>
                  </div>
                </a>
              </div>
              <div class="col-sm-2 card-item__wrap">
                <a class="card-item" href="">
                  <img src="/mvc/public/img/upload/samsung-ua32t4500-245820-105838-550x340.jpg" alt="" class="card__img">
                  <div class="card__name">
                    <span class="card__name-sp">Smart Tivi QLED Samsung 4K 43 inch QA43Q60T</span>
                  </div>
                  <div class="card__body">
                    <strong class="card__price">8.000.000đ</strong>
                  </div>
                </a>
              </div>
              <div class="col-sm-2 card-item__wrap">
                <a class="card-item" href="">
                  <img src="./mvc/public/img/upload/samsung-ua32t4500-245820-105838-550x340.jpg" alt="" class="card__img">
                  <div class="card__name">
                    <span class="card__name-sp">Smart Tivi QLED Samsung 4K 43 inch QA43Q60T</span>
                  </div>
                  <div class="card__body">
                    <strong class="card__price">8.000.000đ</strong>
                  </div>
                </a>
              </div>
              <div class="col-sm-2 card-item__wrap">
                <a class="card-item" href="">
                  <img src="./mvc/public/img/upload/samsung-ua32t4500-245820-105838-550x340.jpg" alt="" class="card__img">
                  <div class="card__name">
                    <span class="card__name-sp">Smart Tivi QLED Samsung 4K 43 inch QA43Q60T</span>
                  </div>
                  <div class="card__body">
                    <strong class="card__price">8.000.000đ</strong>
                  </div>
                </a>
              </div>
              <div class="col-sm-2 card-item__wrap">
                <a class="card-item" href="">
                  <img src="./mvc/public/img/upload/samsung-ua32t4500-245820-105838-550x340.jpg" alt="" class="card__img">
                  <div class="card__name">
                    <span class="card__name-sp">Smart Tivi QLED Samsung 4K 43 inch QA43Q60T</span>
                  </div>
                  <div class="card__body">
                    <strong class="card__price">8.000.000đ</strong>
                  </div>
                </a>
              </div>
              <div class="col-sm-2 card-item__wrap">
                <a class="card-item" href="">
                  <img src="/mvc/public/img/upload/samsung-ua32t4500-245820-105838-550x340.jpg" alt="" class="card__img">
                  <div class="card__name">
                    <span class="card__name-sp">Smart Tivi QLED Samsung 4K 43 inch QA43Q60T</span>
                  </div>
                  <div class="card__body">
                    <strong class="card__price">8.000.000đ</strong>
                  </div>
                </a>
              </div>
            </div>
          </div>
      </div>
    </div>
    <!-- end container -->
    <footer class="footer">
      <div class="grid">
        <div class="grid__row">
          <div class="col-2-4">
            <h3 class="footer__heading">Chăm sóc khách hàng</h3>
            <ul class="footer-list">
              <li class="footer-item">Trung Tâm Trợ Giúp</li>
              <li class="footer-item">Hướng dẫn mua hàng</li>
              <li class="footer-item">Thanh toán</li>
              <li class="footer-item">Vận chuyển</li>
              <li class="footer-item">Chính sách bảo hành</li>
            </ul>
          </div>
          <div class="col-2-4">
            <h3 class="footer__heading">Về Shop</h3>
            <ul class="footer-list">
              <li class="footer-item">Giới thiệu về Kstore</li>
              <li class="footer-item">Chính hãng</li>
              <li class="footer-item">Chính sách bảo mật</li>
            </ul>
          </div>
          <div class="col-2-4">
            <h3 class="footer__heading">Thanh toán</h3>
            <ul class="footer-list footer-list__img">
              <li class="footer-item ">
                <img src="/mvc/public/img/Visa_Inc._logo.svg.png" alt="">
              </li>
              <li class="footer-item">
                <img src="/mvc/public/img/mastercard.png" alt="">
              </li>
              <li class="footer-item">
                <img src="/mvc/public/img/jcb.png" alt="">
              </li>
            </ul>
          </div>
          <div class="col-2-4">
            <h3 class="footer__heading">Theo dõi chúng tôi</h3>
            <ul class="footer-list">
              <li class="footer-item"><i class='bx bxl-facebook-circle'></i>Facebook</li>
              <li class="footer-item"><i class='bx bxl-instagram-alt'></i>Instagram</li>
            </ul>
          </div>
          <div class="col-2-4">
            <h3 class="footer__heading">Đơn vị vận chuyển</h3>
            <ul class="footer-list footer-list__img">
              <li class="footer-item">
                <img id="footer-img" src="./mvc/public/img/ghtk.jfif" alt="">
              </li>
              <li class="footer-item">
                <img id="footer-img" src="./mvc/public/img/viettel.jpg" alt="">
              </li>
              <li class="footer-item">
                <img id="footer-img" src="./mvc/public/img/vc1.png" alt="">
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-title">
        <p class="footer-text">© 2021 - Bản quyền thuộc về KStore</p>
      </div>
    </footer>
  </div>
  <script src="./mvc/public/js/lightslider.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"crossorigin="anonymous"></script>
</body>

</html>