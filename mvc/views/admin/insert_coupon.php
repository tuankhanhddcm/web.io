<div class="col-sm-10" style="min-height: 784px; background-color: white; padding-left: 10px; margin-bottom: 65px;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Tạo mã giảm giá</h3>

            <div class="form-btn">
                <button class="btn_cus btn-save" onclick="insert_coupon(0)"><i class='bx bx-save'></i> Lưu</button>
                <button class="btn_cus btn-conti" onclick="insert_coupon(1)"><i class='bx bx-save'></i> Lưu & Tiếp tục</button>
                <button class="btn_cus btn-back" onclick="location.href='http://localhost/web_mvc/Admin/coupon'"><i class='bx bx-left-arrow-alt'></i> Trở về</button>
            </div>

        </div>
        <div class="row" style="padding-top:100px;">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="" class="form-label sp_lb">Mã giảm giá:</label>
                    <div class="form-wrap">
                        <div class="form_input">
                            <input type="text" class="form-input sp" onkeyup="check('.sp_lb')" value="" placeholder="Nhập mã giảm giá">
                        </div>
                        <div style="display: flex;">
                            <i class='bx bxs-error-circle sp_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                            <span class="error_sp error"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="form-label sl_lb">Số lượng:</label>
                    <div class="form-wrap">
                        <div class="form_input">
                            <input type="text" class="form-input sl" onkeyup="check('.sl_lb')" value="" style="text-align: right;" placeholder="0">
                        </div>
                        <div style="display: flex;">
                            <i class='bx bxs-error-circle sl_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                            <span class="error_sl error"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                
                <div class="form-group">
                    <label for="" class="form-label gia_lb">Phần trăm:</label>
                    <div class="form-wrap">
                        <div class="form_input">
                            <input type="text" class="form-input gia" onkeyup="check('.gia_lb')" value="" style="text-align: right;" placeholder="0">
                        </div>
                        <div style="display: flex;">
                            <i class='bx bxs-error-circle gia_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                            <span class="error_gia error"></span>
                        </div>
                    </div>
                </div>        
            </div>

        </div>
    </div>
</div>