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
                        <li class="url-item">
                            <span class="url-name">Giỏ hàng</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="cart_wrap">
        <div class="grid">
            <div class="cart_title">
                <h4 class="cart_name">Giỏ hàng</h4>
                <span class="cart-title__text">(
                    <span class="cart_count-product">
                        <?php if (isset($_SESSION['cart'])) {
                            echo count($_SESSION['cart']);
                        }
                        ?>
                    </span>
                    sản phẩm)
                </span>
            </div>
            <div class="grid__row">
                <?php if (!empty($data["sanpham"]) && isset($data["sanpham"])) { 
                    $tong = 0;
                ?>
                    <!-- cart list -->
                    <div class="col-sm-12">
                        <div class="cart-table">
                            <div class="grid__row">
                                <div class="col-sm-6">
                                    <div class="cart-table__tr">
                                        <span class="cart-table__td" >Sản phẩm</span>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="cart-table__tr">
                                        <span class="cart-table__td" >Đơn giá</span>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="cart-table__tr">
                                        <span class="cart-table__td" >Số lượng</span>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="cart-table__tr last">
                                        <span class="cart-table__td" >Thành tiền</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 ">
                        <div class="grid__row">
                            <?php
                            foreach ($data["sanpham"] as $key => $val) :
                                
                            ?>  
                                <div class="col-sm-12 padding-9">
                                    <div class="cart-list">
                                        <div class="cart-item">
                                            <div class="grid__row">
                                                <div class="col-sm-6">
                                                    <div class="grid__row">
                                                        <div class="col-sm-5">
                                                            <div class="cart-img">
                                                                <a href="./Detail/<?= $val["sp_url"] ?>" class="cart-item__link">
                                                                    <div class="cart-img__item">
                                                                        <img src="http://localhost/web_mvc/<?= $val["sp_img"] ?>" alt="" class="cart-item__img">
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7">
                                                        <div class="cart-oder__name">
                                                                <a href="./Detail/<?= $val["sp_url"] ?>" class="cart-oder__link">
                                                                    <h3 class="cart-oder__text"><?= $val["sp_name"] ?></h3>
                                                                </a>
                                                                <form action="./cart/delete_cart" method="post">
                                                                    <input class="id"  type="hidden" name="productID" value="<?= $key ?>">
                                                                    <button type="submit" name="btn_xoa" class="cart-oder__action">Xóa</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-sm-2 ">
                                                    <div class="cart-oder__price">
                                                        <span span class="cart-oder__price-text " style="color: var(--text-color);"><?php echo number_format($val["sp_giaban"])?>đ</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 ">
                                                    <div class="detail-sl_btn detail-sl_btn-cart " >
                                                        <button type="button" onclick="giamsl('<?= $key?>')" class="btn-calc btn-sl_tru  tru" >
                                                            <i class='btn-sl__icon bx bx-minus'></i>
                                                        </button>
                                                        <input type="hidden" name="" class="price" value="<?=$val["sp_giaban"] ?>">
                                                        <input class="btn-sl sl "  type="text" name="qtys"  onkeyup="updatecart('<?= $key?>');" min="1"  id="<?= $key?>"  value="<?= $val['soluongdat'] ?>">
                                                        <button type="button" onclick="  tangsl('<?= $key?>')" class=" btn-calc btn-sl_cong cong " >
                                                            <i class='btn-sl__icon bx bx-plus '></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 ">
                                                    <div class="cart-oder__price " id="tt_<?= $key?>">
                                                        <span span class="cart-oder__price-text"><?php echo number_format($val["sp_giaban"]*$val['soluongdat'])?>đ</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            <?php 
                                
                                $tong += $val['soluongdat']*$val["sp_giaban"];
                                endforeach; ?>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="cart_total">
                                <div class="cart-pay__pay">
                                    <h3 class="cart-pay__text">Tổng tiền:</h3>
                                    <span class="cart-pay__pay-price"><?=   number_format($tong) ?>đ</span>
                                </div>
                                <div class="cart_total-btn">
                                    <button class="btn_cus btn-cart__oder"><a href="./home" class="cart__oder-home">TIẾP TỤC MUA HÀNG</a> </button>
                                    <button type="button" class="btn_cus btn-cart__pay cart__oder-pay"  id="tt" >THANH TOÁN NGAY</button>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                <?php
                } else {
                ?>
                    <!-- empty cart -->
                    <div class="col-sm-12">
                        <div class="empty-cart">
                            <div class="empty-cart__img">
                                <img src="http://localhost/web_mvc/public/img/emptycart.png" alt="Giỏ hàng trống">
                            </div>
                            <div class="empty-cart__title">
                                <h2 class="empty-cart__text">Giỏ hàng trống!!!</h2>
                                <a href="./home" class="empty-cart__link">Quay lại trang chủ</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>