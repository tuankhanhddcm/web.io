 <!-- container -->
 <div class="dnahmuc__wrap " style="margin-top: 126px; padding-bottom:20px" >
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
                             <span class="url-name "><?= $data["loaisp"]["ten_loai"] ?></span>
                             <input type="hidden" name="ma_loai" id="ma_loai" value="<?= $data["ma_loai"] ?>">

                         </li>
                     </ul>
                 </div>
             </div>
         </div>
     </section>
     <div class="grid">
         <div class="grid__row">
             <div class="col-sm-3">
                 <div class="home-filter">
                 <?php switch($data["ma_loai"]){
                            case 1:
                                echo '<div class="home-sceen">
                                <h4 class="home__text">Chọn Tivi theo cỡ màn hình</h4>
                                <img src="http://localhost/web_mvc/public/img/rangeinch.png" alt="">
                                <div class="home__select">
                                    <div class="grid__row">
                                         <div class="col-sm-6">
                                             <div class="form-check home-sceen__item">
                                                 <input class="form-check-input removebtn" type="checkbox" value="43" id="">
                                                 <label class="form-check-label" for="">
                                                     Từ 32-43 inch
                                                 </label>
                                             </div>
                                         </div>
                                         <div class="col-sm-6">
                                             <div class="form-check home-sceen__item">
                                                 <input class="form-check-input removebtn" type="checkbox" value="54" id="">
                                                 <label class="form-check-label" for="">
                                                     Từ 44-54 inch
                                                 </label>
                                             </div>
                                         </div>
                                         <div class="col-sm-6">
                                             <div class="form-check home-sceen__item">
                                                 <input class="form-check-input removebtn" type="checkbox" value="64" id="">
                                                 <label class="form-check-label" for="">
                                                     Từ 55-64 inch
                                                 </label>
                                             </div>
                                         </div>
                                         <div class="col-sm-6">
                                             <div class="form-check home-sceen__item">
                                                 <input class="form-check-input removebtn" type="checkbox" value="74" id="">
                                                 <label class="form-check-label" for="">
                                                     Từ 65-74 inch
                                                 </label>
                                             </div>
                                         </div>
                                         <div class="col-sm-6">
                                             <div class="form-check home-sceen__item">
                                                 <input class="form-check-input removebtn" type="checkbox" value="75" id="">
                                                 <label class="form-check-label" for="">
                                                     Trên 75 inch
                                                 </label>
                                             </div>
                                         </div>
                                    </div>  
                                </div>
                            </div>';           
                            break;
                            
                            
                }
                ?>
                     <div class="home-sceen">
                         <h4 class="home__text">Hãng</h4>
                         <div class="home__select">
                             <div class="grid__row align-items-center">
                                 <?php foreach ($data["nsx"] as $nsx) { ?>
                                     <div class="col-sm-6">
                                         <div class="form-check home-sceen__item">
                                             <input class="form-check-input hang removebtn" type="checkbox" value="<?= $nsx["ma_nsx"] ?>">
                                             <img src=".<?= $nsx["nsx_img"] ?>" alt="">
                                         </div>
                                     </div>
                                 <?php } ?>
                             </div>
                         </div>
                     </div>
                     <div class="home-sceen">
                         <h4 class="home__text">Giá Bán</h4>
                         <div class="home__select">
                             <div class="grid__row">
                                 <div class="col-sm-6">
                                     <div class="form-check home-sceen__item">
                                         <input class="form-check-input gia" type="checkbox" value="5000000" id="">
                                         <label class="form-check-label" for="">
                                             Dưới 5 triệu
                                         </label>
                                     </div>
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="form-check home-sceen__item">
                                         <input class="form-check-input gia" type="checkbox" value="7000000" id="">
                                         <label class="form-check-label" for="">
                                             Từ 5 - 7 triệu
                                         </label>
                                     </div>
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="form-check home-sceen__item">
                                         <input class="form-check-input gia" type="checkbox" value="12000000" id="">
                                         <label class="form-check-label" for="">
                                             Từ 8 - 12 triệu
                                         </label>
                                     </div>
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="form-check home-sceen__item">
                                         <input class="form-check-input gia" type="checkbox" value="15000000" id="">
                                         <label class="form-check-label" for="">
                                             Từ 13 - 15 triệu
                                         </label>
                                     </div>
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="form-check home-sceen__item">
                                         <input class="form-check-input gia" type="checkbox" value="19999999" id="">
                                         <label class="form-check-label" for="">
                                             Từ 16- 20 triệu
                                         </label>
                                     </div>
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="form-check home-sceen__item">
                                         <input class="form-check-input gia" type="checkbox" value="20000000" id="">
                                         <label class="form-check-label" for="">
                                             Trên 20 triệu
                                         </label>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-sm-9">
                 <div class="home-sort">
                     <span class="home-sort__lable">Sắp xếp theo</span>
                     <button class="btn_cus btn-sort  sapxep" id="banchay">Bán chạy</button>
                     <button  id="giacao" class="btn_cus btn-sort sapxep" value="desc">Giá cao đến thấp</button>
                     <button class="btn_cus btn-sort sapxep" value="asc" id="giathap">Giá thấp đến cao</button>
                 </div>
                 <style>
                     #loading {
                         border: 16px solid #f3f3f3;
                         /* Light grey */
                         border-top: 16px solid #3498db;
                         /* Blue */
                         border-radius: 50%;
                         width: 120px;
                         height: 120px;
                         animation: spin 2s linear infinite;
                     }

                     @keyframes spin {
                         0% {
                             transform: rotate(0deg);
                         }

                         100% {
                             transform: rotate(360deg);
                         }
                     }
                 </style>
                 <div class="grid__row " id="danhmuc">
                     <?php
                        if (!empty($data["sanpham"])) {
                            foreach ($data["sanpham"] as $val) : ?>

                             <div class="col-2-4 ">
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
                             <h2 class="danhmuc-rong__text">Không có sản phẩm nào!!!</h2>
                         </div>
                     <?php  } ?>
                 </div>
             </div>
         </div>
     </div>
 </div>