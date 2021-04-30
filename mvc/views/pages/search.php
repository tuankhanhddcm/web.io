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
                    <span class="home-sort__lable" style="font-size: 1.6rem;">Tìm thấy <span style="color: black; font-size:1.6rem; font-weight: 600;"><?= $data['ketqua'] ?></span> sản phẩm:</span>
                    <span class="home-sort__lable">Sắp xếp theo</span>
                    <!-- <button class="btn_cus btn-sort  sapxep" onclick="filter_banchay();">Bán chạy</button> -->
                    <button class="btn_cus btn-sort sapxep" value="desc" data-order="0" id="giacao" >Giá cao đến thấp</button>
                    <button class="btn_cus btn-sort sapxep" value="asc" data-order="0" id="giathap" >Giá thấp đến cao</button>
                </div>
                <div class="grid__row " id="danhmuc_search">
                    
                </div>
                <div class="col-sm-12" id="div_view_search">
                    <button class="btn_cus viewmore" id="btn_view_dm" data-search="15" >Xem thêm <span id="view_search"><?= $data['sl'] ?></span> sản phẩm</button>
                </div>
            </div>
        </div>
    </div>
</div>