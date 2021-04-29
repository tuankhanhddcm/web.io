<div class="col-sm-10" style="min-height: 645px; background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Thông tin tài khoản</h3>
            
        </div>
        <div class="user_main">
    <div class="user_main-wrap">
        <div class="form-user form-user--span user_name">
            <label for="" class="form-user_label" style="font-weight: bold; font-size: 1.6rem;">Tên đăng nhập:</label>
            <span><?= !empty($_SESSION['admin']) ?$_SESSION['admin']['username']:"" ?></span>
        </div>
        <div class="form-user form-user--span">
            <label for="" class="form-user_label" style="font-weight: bold; font-size: 1.6rem;" style="min-height: 40px;">Họ tên:</label>
            <span><?= !empty($_SESSION['admin']) ?$_SESSION['admin']['ho_ten']:"" ?></span>
        </div>
        <div class="form-user form-user--span user_sdt">
            <label for="" class="form-user_label" style="font-weight: bold; font-size: 1.6rem;">Số điện thoại:</label>
            <span><?= !empty($_SESSION['admin']) ?$_SESSION['admin']['sdt']:"" ?></span>
        </div>
        <div class="form-user form-user--span user_email">
            <label for="" class="form-user_label" style="font-weight: bold; font-size: 1.6rem;">Email:</label>
            <span><?= !empty($_SESSION['admin']) ?$_SESSION['admin']['email']:"" ?></span>
        </div>
        <div class="form-user form-user--span user_dc">
            <label for="" class="form-user_label" style="font-weight: bold; font-size: 1.6rem;">Địa chỉ:</label>
            <span><?= !empty($_SESSION['admin']) ?$_SESSION['admin']['diachi']:"" ?></span>
        </div>
        <div class="form-user form-user--span user_dc">
            <label for="" class="form-user_label" style="font-weight: bold; font-size: 1.6rem;">Chức vụ:</label>
            <span style="background-color: #1ba8ff;padding-right: 20px;color:#FFF;font-weight: bold;border-radius: 3px;line-height: 36px; margin-left: 20px;"><?= !empty($_SESSION['admin'])&& $_SESSION['admin']['user_group_id']==2 ?"ADMIN":"" ?></span>
        </div>
    </div>

</div>
    </div>
</div>