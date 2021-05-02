<div class="col-sm-10" style="min-height: 645px; background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Thông tin khách hàng</h3>
            <div class="form-btn">
                <input type="hidden" id="ma_kh" value="<?= !empty($data['user'])?$data['user']['username']:'' ?>">
                <button class="btn_cus btn-back" onclick="location.href='http://localhost/web_mvc/Admin/list_user';"><i class='bx bx-left-arrow-alt'></i> Trở về</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Tên khách hàng:</label>
                            <div class="col-sm-8"><?= !empty($data['user'])?$data['user']['ho_ten']:'' ?></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Số điện thoại:</label>
                            <div class="col-sm-8"><?= !empty($data['user'])?$data['user']['sdt']:'' ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Email:</label>
                            <div class="col-sm-8"><?= !empty($data['user'])?$data['user']['email']:'' ?></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Địa chỉ:</label>
                            <div class="col-sm-8"><?= !empty($data['user'])?$data['user']['diachi']:'' ?></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group detail_user">
                            <label for="" class="col-sm-4">Tài khoản:</label>
                            <div class="col-sm-8"><?= !empty($data['user'])?$data['user']['username']:'' ?></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-12 ">
                <div style="font-size: 2.8rem;color:#333;">Lịch sử mua hàng</div>
                <table class="table table_sp ">
                    <thead class="heading-table">
                        <tr style="text-align: center;">
                            <th style="border-left: 1px solid rgba(0,0,0,.1);"></th>
                            <th>Mã đơn hàng</th>
                            <th>Ngày mua</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody id="list_detail_user">


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>