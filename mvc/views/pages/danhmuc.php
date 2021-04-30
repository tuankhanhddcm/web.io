 <!-- container -->
 <div class="dnahmuc__wrap " style="margin-top: 126px; padding-bottom:20px">
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
                     <?php switch ($data["ma_loai"]) {
                        //  tivi
                            case 1:
                                echo '
                            <div class="home-sceen">
                                <h4 class="home__text">Chọn Tivi theo cỡ màn hình</h4>
                                <img src="http://localhost/web_mvc/public/img/rangeinch.png" alt="">
                                <div class="home__select">
                                    <div class="grid__row">
                                         <div class="col-sm-6">
                                             <div class="form-check home-sceen__item">
                                                 <input class="form-check-input kich_co" type="checkbox" value="43" id="">
                                                 <label class="form-check-label" for="">
                                                     Từ 32-43 inch
                                                 </label>
                                             </div>
                                         </div>
                                         <div class="col-sm-6">
                                             <div class="form-check home-sceen__item">
                                                 <input class="form-check-input kich_co" type="checkbox" value="44" id="">
                                                 <label class="form-check-label" for="">
                                                     Từ 43-53 inch
                                                 </label>
                                             </div>
                                         </div>
                                         <div class="col-sm-6">
                                             <div class="form-check home-sceen__item">
                                                 <input class="form-check-input kich_co" type="checkbox" value="53" id="">
                                                 <label class="form-check-label" for="">
                                                     Từ 53-63 inch
                                                 </label>
                                             </div>
                                         </div>
                                         <div class="col-sm-6">
                                             <div class="form-check home-sceen__item">
                                                 <input class="form-check-input kich_co" type="checkbox" value="63" id="">
                                                 <label class="form-check-label" for="">
                                                     Từ 63-73 inch
                                                 </label>
                                             </div>
                                         </div>
                                         <div class="col-sm-6">
                                             <div class="form-check home-sceen__item">
                                                 <input class="form-check-input kich_co" type="checkbox" value="73" id="">
                                                 <label class="form-check-label" for="">
                                                     Trên 73 inch
                                                 </label>
                                             </div>
                                         </div>
                                    </div>  
                                </div>
                            </div>';
                                break;
                            // máy lạnh
                            case 2:
                                echo '
                                <div class="home-sceen">
                                    <h4 class="home__text">Loại máy lạnh:</h4>
                                    <div class="home__select">
                                        <div class="grid__row">
                                            <div class="col-sm-6">
                                                <div class="form-check home-sceen__item">
                                                    <input class="form-check-input loai_sp" type="checkbox" value="Máy lạnh 1 chiều (chỉ làm lạnh)" id="">
                                                    <label class="form-check-label" for="">
                                                        Máy lạnh 1 chiều (chỉ làm lạnh)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-check home-sceen__item">
                                                    <input class="form-check-input loai_sp" type="checkbox" value="Máy lạnh 2 chiều (có sưởi ấm)" id="">
                                                    <label class="form-check-label" for="">
                                                    Máy lạnh 2 chiều (có sưởi ấm)
                                                    </label>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                </div>';
                                break;
                            // tủ lạnh
                            case 3:
                                echo '
                                <div class="home-sceen">
                                    <h4 class="home__text">Kiểu tủ lạnh</h4>
                                    <div class="home__select" style="margin-left:10px">
                                        <div class="grid__row align-items-center" style="min-height: 150px">
                                            <div class="col-2-5" style="align-items:center;" >
                                                <div>
                                                    <img src="http://localhost/web_mvc/public/img/icon_tl1.png" id="img_tl" alt=""> 
                                                </div> 
                                                <div style="margin: 20px  0px 5px 25px">
                                                    <input class="form-check-input k_tu " type="checkbox" value="mini">
                                                </div>
                                                <div style="position: relative;top: 20px; margin: 5px 0px 5px 10px">
                                                    <label for="" style="font-size: 1.2rem; text-align: center; color:#2878d7">Mini</label>
                                                </div>
                                                
                                            </div>
                                            <div class="col-2-5" style="align-items:center;" >
                                                <div>
                                                    <img src="http://localhost/web_mvc/public/img/icon_tl5.png" id="img_tl" alt=""> 
                                                </div> 
                                                <div style="margin: 10px  0px 5px 25px">
                                                    <input class="form-check-input k_tu " type="checkbox" value="Tủ nhiều cửa">
                                                </div>
                                                <div style="position: relative;top: 20px;margin: 5px 0px 5px 0px;">
                                                    <label for="" style="font-size: 1.2rem; text-align: center; color:#2878d7">Tủ nhiều cửa</label>
                                                </div>
                                                
                                            </div>
                                            <div class="col-2-5" style="align-items:center;" >
                                                <div>
                                                    <img src="http://localhost/web_mvc/public/img/icon_tl2.png" id="img_tl" alt=""> 
                                                </div> 
                                                <div style="margin: 10px  0px 5px 25px">
                                                    <input class="form-check-input k_tu " type="checkbox" value="Tủ lớn">
                                                </div>
                                                <div style="position: relative;
                                                top: 20px;
                                                margin: 5px 10px 5px 5px;">
                                                    <label for="" style="font-size: 1.2rem; text-align: center; color:#2878d7">Tủ lớn</label>
                                                </div>
                                                
                                            </div>
                                            <div class="col-2-5" style="align-items:center;" >
                                                <div>
                                                    <img src="http://localhost/web_mvc/public/img/icon_tl3.png" id="img_tl" alt=""> 
                                                </div> 
                                                <div style="margin: 8px  0px 5px 25px">
                                                    <input class="form-check-input k_tu " type="checkbox" value="Ngăn đá trên">
                                                </div>
                                                <div style="position: relative;
                                                top: 20px;
                                                margin: 5px 10px 5px 0px;">
                                                    <label for="" style="font-size: 1.2rem; text-align: center; color:#2878d7">Ngăn đá trên</label>
                                                </div>
                                            
                                            </div>
                                            <div class="col-2-5" style="align-items:center;" >
                                                <div>
                                                    <img src="http://localhost/web_mvc/public/img/icon_tl4.png" id="img_tl" alt=""> 
                                                </div> 
                                                <div style="margin: 9px  0px 5px 25px">
                                                    <input class="form-check-input k_tu " type="checkbox" value="Ngăn đá dưới">
                                                </div>
                                                <div style="position: relative;
                                                    top: 20px;
                                                    margin: 5px 10px 5px 0;">
                                                    <label for="" style="font-size: 1.2rem; text-align: center; color:#2878d7">Ngăn đá dưới</label>
                                                </div>
                                                
                                             </div>
                                        </div>
                                    </div>
                                </div>
                               ';
                            break;
                            // máy giặt
                            case 6:
                                echo '
                                <div class="home-sceen">
                                    <h4 class="home__text">Kiểu máy giặt</h4>
                                    <div class="home__select" style="margin-left:10px">
                                        <div class="grid__row align-items-center">
                                            <div class="col-sm-6" style="align-items:center;" >
                                                <div style="margin-left: 10px">
                                                    <img src="http://localhost/web_mvc/public/img/icon_maygiat1.png" style="width: 70%;" alt=""> 
                                                </div> 
                                                <div style="margin: 20px  0px 5px 25px">
                                                    <input class="form-check-input k_tu " type="checkbox" value="Cửa trên">
                                                    <label for="" style="font-size: 1.4rem;margin-left: 10px; text-align: center; color:#2878d7">Cửa trên</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6" style="align-items:center;" >
                                                <div>
                                                    <img src="http://localhost/web_mvc/public/img/icon_maygiat2.png" style="width: 70%;" alt=""> 
                                                </div> 
                                                <div style="margin: 10px  0px 5px 25px">
                                                    <input class="form-check-input k_tu " type="checkbox" value="Cửa trước">
                                                    <label for="" style="font-size: 1.4rem;margin-left: 10px; text-align: center; color:#2878d7">Cửa trước</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               ';
                            break;
                            // lò nường
                            case 5:
                                echo '
                                <div class="home-sceen">
                                    <h4 class="home__text">Loại lò nướng:</h4>
                                    <div class="home__select" style="margin-right: 5px;">
                                        <div class="grid__row">
                                            <div class="col-sm-6" style="padding-bottom: 10px">
                                                <div class="form-check home-sceen__item">
                                                    <input class="form-check-input loai_sp" type="checkbox" value="Lò nướng thùng" id="">
                                                    <label class="form-check-label" for="">
                                                        Lò nướng thùng
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6" style="padding-bottom: 10px">
                                                <div class="form-check home-sceen__item">
                                                    <input class="form-check-input loai_sp" type="checkbox" value="Lò nướng âm tủ" id="">
                                                    <label class="form-check-label" for="">
                                                    Lò nướng âm tủ
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6" style="padding-bottom: 10px">
                                                <div class="form-check home-sceen__item">
                                                    <input class="form-check-input loai_sp" type="checkbox" value="Bếp nướng điện" id="">
                                                    <label class="form-check-label" for="">
                                                    Bếp nướng điện
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6" style="padding-bottom: 10px">
                                                <div class="form-check home-sceen__item">
                                                    <input class="form-check-input loai_sp" type="checkbox" value="Máy nướng bánh mì" id="">
                                                    <label class="form-check-label" for="">
                                                    Máy nướng bánh mì
                                                    </label>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                </div>';
                            break;
                            // loa
                            case 4:
                                echo '
                                <div class="home-sceen">
                                    <h4 class="home__text">Loại loa:</h4>
                                    <div class="home__select" style="margin-right: 5px;">
                                        <div class="grid__row">
                                            <div class="col-sm-6" style="padding-bottom: 10px">
                                                <div class="form-check home-sceen__item">
                                                    <input class="form-check-input loai_sp" type="checkbox" value="Loa bluetooth" id="">
                                                    <label class="form-check-label" for="">
                                                        Loa bluetooth
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6" style="padding-bottom: 10px">
                                                <div class="form-check home-sceen__item">
                                                    <input class="form-check-input loai_sp" type="checkbox" value="Loa vi tính" id="">
                                                    <label class="form-check-label" for="">
                                                    Loa vi tính
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6" style="padding-bottom: 10px">
                                                <div class="form-check home-sceen__item">
                                                    <input class="form-check-input loai_sp" type="checkbox" value="Loa kéo" id="">
                                                    <label class="form-check-label" for="">
                                                    Loa kéo
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6" style="padding-bottom: 10px">
                                                <div class="form-check home-sceen__item">
                                                    <input class="form-check-input loai_sp" type="checkbox" value="Dàn âm thanh" id="">
                                                    <label class="form-check-label" for="">
                                                    Dàn âm thanh
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
                                             <img src="http://localhost/web_mvc/<?= $nsx["nsx_img"] ?>" alt="">
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
                             <?php if($data["ma_loai"]==4 || $data["ma_loai"]==5){?>
                                <div class="col-sm-6">
                                     <div class="form-check home-sceen__item">
                                         <input class="form-check-input gia" type="checkbox" value="1000000" id="">
                                         <label class="form-check-label" for="">
                                             Dưới 1 triệu
                                         </label>
                                     </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-check home-sceen__item">
                                        <input class="form-check-input gia" type="checkbox" value="1000001" id="">
                                        <label class="form-check-label" for="">
                                            Từ 1 - 3 triệu
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-check home-sceen__item">
                                        <input class="form-check-input gia" type="checkbox" value="3000000" id="">
                                        <label class="form-check-label" for="">
                                            Từ 3 - 6 triệu
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-check home-sceen__item">
                                        <input class="form-check-input gia" type="checkbox" value="6000000" id="">
                                        <label class="form-check-label" for="">
                                            Từ 6 - 9 triệu
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-check home-sceen__item">
                                        <input class="form-check-input gia" type="checkbox" value="9000000" id="">
                                        <label class="form-check-label" for="">
                                            Trên 9 triệu
                                        </label>
                                    </div>
                                </div>
                            <?php }else{ ?>
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
                                        <input class="form-check-input gia" type="checkbox" value="5000001" id="">
                                        <label class="form-check-label" for="">
                                            Từ 5 - 10 triệu
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-check home-sceen__item">
                                        <input class="form-check-input gia" type="checkbox" value="10000000" id="">
                                        <label class="form-check-label" for="">
                                            Từ 10 - 15 triệu
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-check home-sceen__item">
                                        <input class="form-check-input gia" type="checkbox" value="15000000" id="">
                                        <label class="form-check-label" for="">
                                            Từ 15 - 20 triệu
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-check home-sceen__item">
                                        <input class="form-check-input gia" type="checkbox" value="20000000" id="">
                                        <label class="form-check-label" for="">
                                            Từ 20- 25 triệu
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-check home-sceen__item">
                                        <input class="form-check-input gia" type="checkbox" value="25000000" id="">
                                        <label class="form-check-label" for="">
                                            Trên 25 triệu
                                        </label>
                                    </div>
                                </div>
                            <?php } ?>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-sm-9">
                 <div class="home-sort">
                     <span class="home-sort__lable">Sắp xếp theo</span>
                     <!-- <button class="btn_cus btn-sort  sapxep" id="banchay" value="">Bán chạy</button> -->
                     <button id="giacao" class="btn_cus btn-sort sapxep" data-order="0" value="desc">Giá cao đến thấp</button>
                     <button class="btn_cus btn-sort sapxep" value="asc" data-order="0" id="giathap">Giá thấp đến cao</button>
                 </div>
                 <div class="grid__row " id="danhmuc_loai">
                 </div>
                <div class="col-sm-12" id="div_view_dm">
                    <button class="btn_cus viewmore " id="btn_view_dm" data-count="4" >Xem thêm <span id="view_dm"></span> sản phẩm</button>
                </div>
             </div>
         </div>
     </div>
 </div>