<?php 
    if(isset($_SESSION['tskt_sp']) && !empty($_SESSION['tskt_sp'])){ ?>

<div class="col-sm-6">
    <div class="form-group" style="margin-bottom: 25px;">
        <label for="" class="form-label loai_sp_lb">Loại tủ:</label>
        <div class="form-wrap form-span">
            <span><?php echo isset($_SESSION['tskt_sp']) ? $_SESSION['tskt_sp']['loai_sp']:""; ?></span>
        </div>
    </div>
    <div class="form-group" style="margin-bottom: 25px;">
        <label for="" class="form-label kieu_tu_lb">Công nghệ tiết kiệm điện:</label>
        <div class="form-wrap form-span">
            <span><?php echo isset($_SESSION['tskt_sp']) ? $_SESSION['tskt_sp']['kieu_tu']:""; ?></span>
        </div>
    </div>
    <div class="form-group" style="margin-bottom: 25px;">
        <label for="" class="form-label so_canh_lb">Số cánh cửa: </label>
        <div class="form-wrap form-span">
           <span><?php echo isset($_SESSION['tskt_sp']) ? $_SESSION['tskt_sp']['so_canh_cua']:""; ?></span>
        </div>
    </div>
    <div class="form-group" style="margin-bottom: 25px;">
        <label for="" class="form-label dung-tich_lb">Dung tích tủ:</label>
        <div class="form-wrap form-span">
           <span><?php echo isset($_SESSION['tskt_sp']) ? $_SESSION['tskt_sp']['dung_tich']:""; ?></span>
        </div>
    </div>
    <div class="form-group" style="margin-bottom: 25px;">
        <label for="" class="form-label cong_nghe_lb">Công nghệ tủ:</label>
        <div class="form-wrap form-span">
            <span><?php echo isset($_SESSION['tskt_sp']) ? $_SESSION['tskt_sp']['cong_nghe']:""; ?></span>
        </div>
    </div>
    <div class="form-group" style="margin-bottom: 25px;">
        <label for="" class="form-label chat_lieu_lb">Chất liệu tủ:</label>
        <div class="form-wrap form-span">
           <span><?php echo isset($_SESSION['tskt_sp']) ? $_SESSION['tskt_sp']['chat_lieu']:""; ?></span>
        </div>
    </div>
    <div class="form-group" style="margin-bottom: 25px;">
        <label for="" class="form-label tien_ich_lb">Tiện ích:</label>
        <div class="form-wrap form-span">
            <span><?php echo isset($_SESSION['tskt_sp']) ? $_SESSION['tskt_sp']['tinh_nang']:""; ?></span>
        </div>
    </div>
</div>
<div class="col-sm-6">
    <div class="form-group" style="margin-bottom: 25px;">
        <label for="" class="form-label cn_kk_lb">Công nghệ kháng khuẩn, khử mùi:</label>
        <div class="form-wrap form-span">
            <span><?php echo isset($_SESSION['tskt_sp']) ? $_SESSION['tskt_sp']['ung_dung']:""; ?></span>
        </div>
    </div>
    <div class="form-group" style="margin-bottom: 25px;">
        <label for="" class="form-label cong_suat_lb">Công suất:</label>
        <div class="form-wrap form-span">
            <span><?php echo isset($_SESSION['tskt_sp']) ? $_SESSION['tskt_sp']['cong_suat']:""; ?></span>
        </div>
    </div>
    <div class="form-group" style="margin-bottom: 25px;">
        <label for="" class="form-label kich_thuoc_lb">Kích thước: </label>
        <div class="form-wrap form-span">
            <span><?php echo isset($_SESSION['tskt_sp']) ? $_SESSION['tskt_sp']['kich_thuoc']:""; ?></span>
        </div>
    </div>
    <div class="form-group" style="margin-bottom: 25px;">
        <label for="" class="form-label kl_lb">Khối lượng:</label>
        <div class="form-wrap form-span">
            <span><?php echo isset($_SESSION['tskt_sp']) ? $_SESSION['tskt_sp']['khoi_luong']:""; ?></span>
        </div>
    </div>
    <div class="form-group" style="margin-bottom: 25px;">
        <label for="" class="form-label noi_sx_lb">Nơi sản xuất:</label>
        <div class="form-wrap form-span">
           <span><?php echo isset($_SESSION['tskt_sp']) ? $_SESSION['tskt_sp']['noi_san_xuat']:""; ?></span>
        </div>
    </div>
    <div class="form-group" style="margin-bottom: 25px;">
        <label for="" class="form-label bh_lb">Bảo hành:</label>
        <div class="form-wrap form-span">
            <span><?php echo isset($_SESSION['tskt_sp']) ? $_SESSION['tskt_sp']['bao_hanh']:""; ?></span>
        </div>
    </div>
    <div class="form-group" style="margin-bottom: 25px;">
        <label for="" class="form-label nam_lb">Năm ra mắt:</label>
        <div class="form-wrap form-span">
            <span><?php echo isset($_SESSION['tskt_sp']) ? $_SESSION['tskt_sp']['nam_sx']:""; ?></span>
        </div>
    </div>
</div>

<?php }else { ?>
<div class="col-sm-6">
    <div class="form-group">
        <label for="" class="form-label loai_sp_lb">Loại tủ:</label>
        <div class="form-wrap">
            <div class="form_input">
                <input type="text" class="form-input loai_sp"  onkeyup="check('.loai_sp_lb')" value="<?php echo isset($_SESSION['tskt']) ? $_SESSION['tskt']['loai_sp']:""; ?>" placeholder="Nhập loại tủ">
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle loai_sp_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                <span class="error_loai_sp error"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="form-label kieu_tu_lb">Công nghệ tiết kiệm điện:</label>
        <div class="form-wrap">
            <div class="form_input">
                <input type="text" class="form-input kieu_tu" onkeyup="check('.kieu_tu_lb')" value="<?php echo isset($_SESSION['tskt']) ? $_SESSION['tskt']['kieu_tu']:""; ?>" placeholder="Nhập công nghệ tiết kiệm điện">
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle kieu_tu_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                <span class="error_kieu_tu error"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="form-label so_canh_lb">Số cánh cửa: </label>
        <div class="form-wrap">
            <div class="form_input">
                <input type="text" class="form-input so_canh" onkeyup="check('.so_canh_lb')" value="<?php echo isset($_SESSION['tskt']) ? $_SESSION['tskt']['so_canh_cua']:""; ?>" placeholder="Nhập số cánh cửa">
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle so_canh_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                <span class="error_so_canh error"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="form-label dung-tich_lb">Dung tích tủ:</label>
        <div class="form-wrap">
            <div class="form_input">
                <input type="text" class="form-input dung-tich" onkeyup="check('.dung-tich_lb')" value="<?php echo isset($_SESSION['tskt']) ? $_SESSION['tskt']['dung_tich']:""; ?>" placeholder="Nhập dung tích tủ">
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle dung-tich_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                <span class="error_dung-tich error"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="form-label cong_nghe_lb">Công nghệ tủ:</label>
        <div class="form-wrap">
            <div class="form_input">
                <input type="text" class="form-input cong_nghe " onkeyup="check('.cong_nghe_lb')" value="<?php echo isset($_SESSION['tskt']) ? $_SESSION['tskt']['cong_nghe']:""; ?>" placeholder="Nhập công nghệ tủ">
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle cong_nghe_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                <span class="error_cong_nghe error"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="form-label chat_lieu_lb">Chất liệu tủ:</label>
        <div class="form-wrap">
            <div class="form_input">
                <input type="text" class="form-input chat_lieu" onkeyup="check('.chat_lieu_lb')" value="<?php echo isset($_SESSION['tskt']) ? $_SESSION['tskt']['chat_lieu']:""; ?>" placeholder="Nhập chất liệu tủ">
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle chat_lieu_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                <span class="error_chat_lieu error"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="form-label tien_ich_lb">Tiện ích:</label>
        <div class="form-wrap">
            <div class="form_input">
                <input type="text" class="form-input tien_ich" onkeyup="check('.tien_ich_lb')" value="<?php echo isset($_SESSION['tskt']) ? $_SESSION['tskt']['tinh_nang']:""; ?>" placeholder="Nhập tiện ích">
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle tien_ich_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                <span class="error_tien_ich error"></span>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        <label for="" class="form-label cn_kk_lb">Công nghệ kháng khuẩn, khử mùi:</label>
        <div class="form-wrap">
            <div class="form_input">
                <input type="text" class="form-input cn_kk" onkeyup="check('.cn_kk_lb')" value="<?php echo isset($_SESSION['tskt']) ? $_SESSION['tskt']['ung_dung']:""; ?>" placeholder="Nhập công nghệ khang khuẩn, khử mùi">
            </div>
            <div style="display: flex;">
                <i class='bx bxs-error-circle cn_kk_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                <span class="error_cn_kk error"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="form-label cong_suat_lb">Công suất:</label>
        <div class="form-wrap">
            <div class="form_input">
                <input type="text" class="form-input cong_suat " onkeyup="check('.cong_suat_lb')" value="<?php echo isset($_SESSION['tskt']) ? $_SESSION['tskt']['cong_suat']:""; ?>" placeholder="Nhập công suất">
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

<?php }?>