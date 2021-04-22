<div class="col-sm-10" style="padding-left: 10px;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Hoạt động hôm nay</h3>
        </div>

        <div class="row">
            <div class="col-sm-3 " style="padding-left: 15px;">
                <div class="report-box box-green">
                    <div class="infobox-icon">
                        <i class="fa fa-credit-card"></i>
                    </div>
                    <div class="infobox-data">
                        <h3 class="infobox-title">Tiền bán hàng</h3>
                        <span class="infobox-number"><?= number_format($data['total'])?>đ</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-3" style="padding-left: 15px;">
                <div class="report-box box-yellow">
                    <div class="infobox-icon">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="infobox-data">
                        <h3 class="infobox-title">Số đơn hàng</h3>
                        <span class="infobox-number"><?= $data['so_hd'] ?></span>
                    </div>
                </div>
            </div>
            <div class="col-sm-3" style="padding-left: 15px;">
                <div class="report-box box-blue">
                    <div class="infobox-icon">
                        <i class='bx bxl-product-hunt'></i>
                    </div>
                    <div class="infobox-data">
                        <h3 class="infobox-title">Số sản phấm đã bán</h3>
                        <span class="infobox-number"><?= $data['so_sp'] ?></span>
                    </div>
                </div>
            </div>
            <div class="col-sm-3" style="padding-left: 15px;">
                <div class="report-box box-red">
                    <div class="infobox-icon">
                        <i class='bx bxs-chevron-up-circle'></i>
                    </div>
                    <div class="infobox-data">
                        <h3 class="infobox-title">So với hôm qua</h3>
                        <span class="infobox-number"><?= $data['sum'] ?>%</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 ">
               
                <h3 class="home_title">Danh sách đơn hàng hôm nay</h3>
                <table class="table table_sp ">
                    <thead class="heading-table">
                        <tr>
                            <th style="border-left: 1px solid rgba(0,0,0,.1);">Mã đơn hàng</th>
                            <th >Khách hàng</th>
                            <th >Email</th>
                            <th >Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Tổng tiền</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th style="width: 100px;border-right: none;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="list_oder">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>