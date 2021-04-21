<div class="user_main">
    <div class="user_main-title">
        <h3>Thông tin tài khoản</h3>
    </div>
    <div class="user_main-wrap">
        <div class="form-user form-user--span user_name">
            <label for="" class="form-user_label">Tên đăng nhập:</label>
            <span><?= !empty($_SESSION['user']) ?$_SESSION['user']['username']:"" ?></span>
        </div>
        <div class="form-user">
            <label for="" class="form-user_label ho_ten_lb" style="min-height: 40px;">Họ tên:</label>
            <div class="form-wrap--user">
                <div class="form_input--user">
                    <input type="text" class="input--user  ho_ten" onkeyup="check('.ho_ten_lb')" value="<?= !empty($_SESSION['user']) ?$_SESSION['user']['ho_ten']:"" ?>" placeholder="Nhập họ tên">
                </div>
                <div style="display: flex;">
                    <i class='bx bxs-error-circle ho_ten_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                    <span class="error_ho_ten error"></span>
                </div>
            </div>
        </div>
        <div class="form-user form-user--span user_sdt">
            <label for="" class="form-user_label ">Số điện thoại:</label>
            <span><?= !empty($_SESSION['user']) ?$_SESSION['user']['sdt']:"" ?></span>
        </div>
        <div class="form-user form-user--span user_email">
            <label for="" class="form-user_label ">Email:</label>
            <span><?= !empty($_SESSION['user']) ?$_SESSION['user']['email']:"" ?></span>
        </div>
        <div class="form-user form-user--span user_dc">
            <label for="" class="form-user_label ">Địa chỉ:</label>
            <span><?= !empty($_SESSION['user']) ?$_SESSION['user']['diachi']:"" ?></span>
        </div>
        <div class="col-sm-12">
            <button  type="button" class=" btn_cus btn_account btn_hoten">Lưu</button>
        </div>
    </div>

</div>