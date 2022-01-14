<div class="user_main">
    <div class="user_main-title">
        <h3>Đổi mật khẩu</h3>
    </div>
    <div class="user_main-wrap">
        <div class="form-user " style="min-height: 72px;">
            <label for="" class="form-user_label old_pass_lb">Mật khẩu cũ:</label>
            <div class="form-wrap--user">
                <div class="form_input--user">
                    <input type="password" class="input--user old_pass" onkeyup="check('.old_pass_lb')" value="" placeholder="Nhập mật khẩu cũ">
                </div>
                <div style="display: flex;">
                    <i class='bx bxs-error-circle old_pass_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                    <span class="error_old_pass error"></span>
                </div>
            </div>
        </div>
        <div class="form-user " style="min-height: 72px;">
            <label for="" class="form-user_label new_pass_lb">Mật khẩu mới:</label>
            <div class="form-wrap--user">
                <div class="form_input--user">
                    <input type="password" class="input--user  new_pass" onkeyup="check_pass()" value="" placeholder="Nhập mật khẩu mới">
                </div>
                <div style="display: flex;">
                    <i class='bx bxs-error-circle new_pass_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                    <span class="error_new_pass error"></span>
                </div>
            </div>
        </div>
        <div class="form-user " style="min-height: 72px;">
            <label for="" class="form-user_label new_pass_again_lb">Nhập lại mật khẩu:</label>
            <div class="form-wrap--user">
                <div class="form_input--user">
                    <input type="password" class="input--user  new_pass_again" onkeyup="check_pass_again()" value="" placeholder="Nhập lại mật khẩu">
                </div>
                <div style="display: flex;">
                    <i class='bx bxs-error-circle new_pass_again_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                    <span class="error_new_pass_again error"></span>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <button class=" btn_cus btn_account btn_pass">Đặt lại mật khẩu</button>
        </div>
    </div>
</div>