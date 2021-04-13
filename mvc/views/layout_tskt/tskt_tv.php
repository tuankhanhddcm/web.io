<div class="col-sm-6">
    <div class="form-group">
        <label for="" class="form-label loai_sp_lb">Loại tivi:</label>
        <div class="form-wrap">
            <div class="form_input">
                <input type="text" class="form-input loai_sp" onkeyup="check('.loai_sp_lb')" value="<?php echo isset($_SESSION['tskt']) ? $_SESSION['tskt']['loai_sp']:""; ?>" placeholder="Nhập loại tivi">
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle loai_sp_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                <span class="error_loai_sp error"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="form-label tv_ich_lb">Kích cỡ màn hình:</label>
        <div class="form-wrap">
            <div class="form_input">
                <input type="text" class="form-input tv_ich" onkeyup="check('.tv_ich_lb')" value="<?php echo isset($_SESSION['tskt']) ? $_SESSION['tskt']['kich_co_tv']:""; ?> " placeholder="Nhập kích cỡ màn hình">
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle tv_ich_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                <span class="error_tv_ich error"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="form-label phan_giai_lb">Độ phân giải: </label>
        <div class="form-wrap">
            <div class="form_input">
                <input type="text" class="form-input phan_giai" onkeyup="check('.phan_giai_lb')" value="<?php echo isset($_SESSION['tskt']) ? $_SESSION['tskt']['do_phan_giai']:""; ?>" placeholder="Nhập độ phân giải">
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle phan_giai_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                <span class="error_phan_giai error"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="form-label hdh_lb">Hệ điều hành:</label>
        <div class="form-wrap">
            <div class="form_input">
                <input type="text" class="form-input hdh" onkeyup="check('.hdh_lb')" value="<?php echo isset($_SESSION['tskt']) ? $_SESSION['tskt']['he_dieu_hanh']:""; ?>" placeholder="Nhập hệ điều hành">
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle hdh_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                <span class="error_hdh error"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="form-label cn_kk_lb">Ứng dụng:</label>
        <div class="form-wrap">
            <div class="form_input">
                <input type="text" class="form-input cn_kk" onkeyup="check('.cn_kk_lb')" value="<?php echo isset($_SESSION['tskt']) ? $_SESSION['tskt']['ung_dung']:""; ?>" placeholder="Nhập ứng dụng">
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle cn_kk_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                <span class="error_cn_kk error"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="form-label cong_nghe_lb">Công nghệ hình ảnh:</label>
        <div class="form-wrap">
            <div class="form_input">
                <input type="text" class="form-input cong_nghe" onkeyup="check('.cong_nghe_lb')" value="<?php echo isset($_SESSION['tskt']) ? $_SESSION['tskt']['cong_nghe']:""; ?>" placeholder="Nhập công nghệ hình ảnh">
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle cong_nghe_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                <span class="error_cong_nghe error"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="form-label tien_ich_lb">Tính năng thông minh:</label>
        <div class="form-wrap">
            <div class="form_input">
                <input type="text" class="form-input tien_ich" onkeyup="check('.tien_ich_lb')" value="<?php echo isset($_SESSION['tskt']) ? $_SESSION['tskt']['tinh_nang']:""; ?>" placeholder="Nhập tính năng thông minh">
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle tien_ich_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                <span class="error_tien_ich error"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="form-label ket_noi_lb">Kết nối:</label>
        <div class="form-wrap">
            <div class="form_input">
                <input type="text" class="form-input ket_noi" onkeyup="check('.ket_noi_lb')" value="<?php echo isset($_SESSION['tskt']) ? $_SESSION['tskt']['ket_noi']:""; ?>" placeholder="Nhập kết nối">
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle ket_noi_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                <span class="error_ket_noi error"></span>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        <label for="" class="form-label tv_loa_lb">Công nghệ loa:</label>
        <div class="form-wrap">
            <div class="form_input">
                <input type="text" class="form-input tv_loa" onkeyup="check('.tv_loa_lb')" value="<?php echo isset($_SESSION['tskt']) ? $_SESSION['tskt']['loa']:""; ?>" placeholder="Nhập công nghệ loa">
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle tv_loa_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                <span class="error_tv_loa error"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="form-label cong_suat_lb">Công suất:</label>
        <div class="form-wrap">
            <div class="form_input">
                <input type="text" class="form-input cong_suat" onkeyup="check('.cong_suat_lb')" value="<?php echo isset($_SESSION['tskt']) ? $_SESSION['tskt']['cong_suat']:""; ?>" placeholder="Nhập công suất">
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle cong_suat_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                <span class="error_cong_suat error"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="form-label kich_thuoc_lb">Kích thước: </label>
        <div class="form-wrap">
            <div class="form_input">
                <input type="text" class="form-input kich_thuoc" onkeyup="check('.kich_thuoc_lb')" value="<?php echo isset($_SESSION['tskt']) ? $_SESSION['tskt']['kich_thuoc']:""; ?>" placeholder="Nhập kích thước">
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle kich_thuoc_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                <span class="error_kich_thuoc error"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="form-label kl_lb">Khối lượng:</label>
        <div class="form-wrap">
            <div class="form_input">
                <input type="text" class="form-input kl" onkeyup="check('.kl_lb')" value="<?php echo isset($_SESSION['tskt']) ? $_SESSION['tskt']['khoi_luong']:""; ?>" placeholder="Nhập khối lượng">
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle kl_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                <span class="error_kl error"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="form-label noi_sx_lb">Nơi sản xuất:</label>
        <div class="form-wrap">
            <div class="form_input">
                <input type="text" class="form-input noi_sx" onkeyup="check('.noi_sx_lb')" value="<?php echo isset($_SESSION['tskt']) ? $_SESSION['tskt']['noi_san_xuat']:""; ?>" placeholder="Nhập nơi sản xuất">
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle noi_sx_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                <span class="error_noi_sx error"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="form-label bh_lb">Bảo hành:</label>
        <div class="form-wrap">
            <div class="form_input">
                <input type="text" class="form-input bh" onkeyup="check('.bh_lb')" value="<?php echo isset($_SESSION['tskt']) ? $_SESSION['tskt']['bao_hanh']:""; ?>" placeholder="Nhập bảo hành">
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle bh_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                <span class="error_bh error"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="form-label nam_lb">Năm ra mắt:</label>
        <div class="form-wrap">
            <div class="form_input">
                <input type="text" class="form-input nam" onkeyup="check('.nam_lb')" value="<?php echo isset($_SESSION['tskt']) ? $_SESSION['tskt']['nam_sx']:""; ?>" placeholder="Nhập năm ra mắt">
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle nam_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                <span class="error_nam error"></span>
            </div>
        </div>
    </div>
</div>