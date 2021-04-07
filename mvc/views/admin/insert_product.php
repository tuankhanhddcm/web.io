<div class="col-sm-10" style="min-height: 784px; background-color: white; padding-left: 10px; margin-bottom: 65px;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Tạo sản phẩm</h3>

            <div class="form-btn">
                <button class="btn_cus btn-save" onclick="insert_sp(0)"><i class='bx bx-save'></i> Lưu</button>
                <button class="btn_cus btn-conti" onclick="insert_sp(1);"><i class='bx bx-save'></i> Lưu & Tiếp tục</button>
                <button class="btn_cus btn-back" onclick="location.href='http://localhost/web_mvc/Admin/list_sp'"><i class='bx bx-left-arrow-alt'></i> Trở về</button>
            </div>

        </div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs sign-header" style="border: none; margin-bottom: 30px; margin-top: 0;" id="navId">
            <li class="nav-item">
                <a href="#tab1Id" class="nav-link active " id="info_sp" data-toggle="tab">Thông tin sản
                    phẩm</a>
            </li>
            <li class="nav-item">
                <a href="#tab2Id" class="nav-link " id="thongso_sp" data-toggle="tab">Thông số kỹ thuật</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="tab1Id" role="tabpanel">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="" class="form-label">Tên sản phẩm:</label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <input type="text" class="form-input sp" onkeyup="check('.sp')" value="" placeholder="Nhập tên sản phẩm">
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle sp_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                    <span class="error_sp error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Nhóm hàng:</label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <div class="select_wrap form_input--items" style="width: 100%;">
                                        <select class=" select select-loaisp form-control" id="loaisp" data-dropup-auto="false" data-size='5' data-live-search="true">
                                            <option value="">--Chọn nhóm hàng hóa--</option>
                                            <?php if (!empty($data['loai'])) {
                                                foreach ($data['loai'] as $val) :
                                            ?>
                                                    <option value="<?= $val['ma_loai'] ?>"><?= $val['ten_loai'] ?></option>
                                            <?php endforeach;
                                            }
                                            ?>
                                        </select>
                                        <button class=" btn_plus" onclick="phan_trang_loai(1);" type="button" data-toggle="modal" data-target="#create_danhmuc"><i class='bx bx-plus'></i></button>
                                    </div>
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle loaisp_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                    <span class="error_loaisp error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Thương hiệu:</label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <div class="select_wrap form_input--items" style="width: 100%;">
                                        <select class=" select select-loainsx form-control" id="loainsx" data-dropup-auto="false" data-size='5' data-live-search="true">
                                            <option value="" selected>--Chọn Thương hiệu--</option>
                                            <?php if (!empty($data['nsx'])) {
                                                foreach ($data['nsx'] as $val) :
                                            ?>
                                                    <option value="<?= $val['ma_nsx'] ?>"><?= $val['ten_nsx'] ?></option>
                                            <?php endforeach;
                                            }
                                            ?>
                                        </select>
                                        <button class=" btn_plus" onclick="phan_trang_nsx(1);" data-toggle="modal" data-target="#create_nsx"><i class='bx bx-plus'></i></button>
                                    </div>
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle loainsx_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                    <span class="error_loainsx error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Chọn ảnh đại diện:</label>
                            <div class="form-wrap">
                                <div style="display: flex;">
                                    <label class="btn_upload"><input type="file" onchange="readURL(this,'#img_temp','#img_insert')" id="img_temp" hidden>Chọn ảnh</label>
                                    <div class="display-img " id="img_pro">
                                        <label class="label-img_temp" style="cursor:pointer"><i class='bx bx-plus-circle'></i></label>
                                        <img src="#" alt="" id="img_insert">
                                    </div>
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle img_temp_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                    <span class="error_img_temp error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style=" padding-top: 120px;">
                            <label for="" class="form-label">Mô tả sản phẩm:</label>
                            <div class="form-wrap" style="background-color: #ffff;">
                                <textarea id='mota' style="display: block; font-size: 1.2rem;padding: 10px;" name="" id="" cols="100" rows="20"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="" class="form-label">Số lượng:</label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <input type="text" class="form-input sl" onkeyup="check('.sl')" value="" style="text-align: right;" placeholder="0">
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle sl_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                    <span class="error_sl error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Giá vốn:</label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <input type="text" class="form-input gia" onkeyup="check('.gia')" value="" style="text-align: right;" placeholder="0">
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle gia_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                    <span class="error_gia error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Giá bán:</label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <input type="text" class="form-input giaban" onkeyup="check('.giaban')" pattern="([0-9]{1,3}).([0-9]{1,3})" value="" style="text-align: right;" placeholder="0">
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle giaban_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                    <span class="error_giaban error"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade" id="tab2Id" role="tabpanel">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="" class="form-label">Loại tivi:</label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <input type="text" class="form-input loai_tv" value="" placeholder="Nhập loại tivi">
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle loai_tv_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                    <span class="error_loai_tv error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Kích cỡ màn hình:</label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <input type="text" class="form-input loai_tv" value="" placeholder="Nhập kích cỡ màn hình">
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle loai_tv_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                    <span class="error_loai_tv error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Độ phân giải: </label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <input type="text" class="form-input loai_tv" value="" placeholder="Nhập độ phân giải">
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle loai_tv_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                    <span class="error_loai_tv error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Hệ điều hành:</label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <input type="text" class="form-input loai_tv" value="" placeholder="Nhập hệ điều hành">
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle loai_tv_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                    <span class="error_loai_tv error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Ứng dụng:</label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <input type="text" class="form-input loai_tv" value="" placeholder="Nhập ứng dụng">
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle loai_tv_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                    <span class="error_loai_tv error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Công nghệ hình ảnh:</label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <input type="text" class="form-input loai_tv" value="" placeholder="Nhập công nghệ hình ảnh">
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle loai_tv_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                    <span class="error_loai_tv error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Tính năng thông minh:</label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <input type="text" class="form-input loai_tv" value="" placeholder="Nhập tính năng thông minh">
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle loai_tv_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                    <span class="error_loai_tv error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Kết nối:</label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <input type="text" class="form-input loai_tv" value="" placeholder="Nhập kết nối">
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle loai_tv_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                    <span class="error_loai_tv error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="" class="form-label">Công nghệ loa:</label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <input type="text" class="form-input loai_tv" value="" placeholder="Nhập công nghệ loa">
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle loai_tv_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                    <span class="error_loai_tv error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Công suất:</label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <input type="text" class="form-input loai_tv" value="" placeholder="Nhập công suất">
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle loai_tv_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                    <span class="error_loai_tv error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Kích thước: </label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <input type="text" class="form-input loai_tv" value="" placeholder="Nhập kích thước">
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle loai_tv_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                    <span class="error_loai_tv error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Khối lượng:</label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <input type="text" class="form-input loai_tv" value="" placeholder="Nhập khối lượng">
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle loai_tv_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                    <span class="error_loai_tv error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Nơi sản xuất:</label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <input type="text" class="form-input loai_tv" value="" placeholder="Nhập nơi sản xuất">
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle loai_tv_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                    <span class="error_loai_tv error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Bảo hành:</label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <input type="text" class="form-input loai_tv" value="" placeholder="Nhập bảo hành">
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle loai_tv_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                    <span class="error_loai_tv error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Năm ra mắt:</label>
                            <div class="form-wrap">
                                <div class="form_input">
                                    <input type="text" class="form-input loai_tv" value="" placeholder="Nhập năm ra mắt">
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle loai_tv_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                    <span class="error_loai_tv error"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>