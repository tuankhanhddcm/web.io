<!-- modal tạo danh mục -->
<div class="modal fade" id="create_danhmuc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Quản lý nhóm hàng hoá</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body modal_admin--body">
        <div class="tabtable">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs tab-setting" role="tablist" style="background-color: #EFF3F8; padding: 20px 0 4px 15px;">
            <li role="presentation" style="margin-right: 3px;"><a href="#list-groups" class="active" aria-controls="list-group" role="tab" data-toggle="tab"><i class="fa fa-list"></i> Danh sách nhóm hàng hóa</a></li>
            <li role="presentation" style="float: left;margin-bottom:2px;"><a href="#create-groups" aria-controls="create-group" role="tab" data-toggle="tab"><i class="fa fa-plus"></i> Tạo mới nhóm hàng hóa</a>
            </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content" style="padding:10px; border: 1px solid #ddd; border-top: none;">
            <div role="tabpanel" class="tab-pane active" id="list-groups">
              <div class="prd_group-body">
                <div class="text-center">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr style="background-color: whitesmoke;">
                        <th class="text-left" style="font-size: 1.4rem; font-weight: 600;padding: 10px;">
                          Tên nhóm hàng hóa
                        </th>
                        <th style=" width: 80px;"></th>
                      </tr>
                    <tbody id="list_loai">
                      <?php foreach ($data['loai'] as $val) :
                      ?>
                        <tr>
                          <td class="text_td item_<?= $val['ma_loai'] ?>" style=" padding-top: 15px;"><?= $val['ten_loai'] ?></td>
                          <td style="display: flex;align-items: center;justify-content: center;padding-top: 10px;border-right: none;">
                            <button type="button" class=" btn-update" title="Sửa"><i class="fa fa-pencil-square-o"></i></button>
                            <button type="button" class=" btn-deletd" title="Xóa"><i class="bx bxs-trash"></i></button>
                          </td>
                        </tr>
                      <?php endforeach;
                      ?>
                    </tbody>
                    </thead>
                  </table>
                </div>
              </div>
            </div>

            <!-- Tab Function -->
            <div role="tabpanel" class="tab-pane" id="create-groups">
              <div class="row form-horizontal">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="label_modal prd_group_name_lb">Tên danh mục:</label>
                    </div>
                    <div class="col-md-8">
                      <div class="pay-input ">
                        <!-- add: disabled input-block, label-block -->
                        <input type="text" class="form__input prd_group_name" onkeyup="check_name('group','danhmuc');" placeholder=" " value="">
                        <label for="" class="form__label  ">Tên nhóm hàng hóa</label>
                      </div>
                      <div style="display: flex;">
                        <i class='bx bxs-error-circle prd_group_name_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                        <span class="error_prd_group_name error"></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-4 ">
                      <label class="label_modal">Chọn hình:</label>
                    </div>
                    <div class="col-md-8">
                      <div style="display: flex;">
                        <label class="btn_upload"><input type="file" id="img_dm" onchange="readURL(this,'#img_dm','#img_loai')" hidden accept=".gif, .png, .jpg, .jfif, .jpeg">Chọn ảnh</label>
                        <div class="display-img " id="img_group" style=" width: 100px;height: auto;">
                          <label class="label-img_dm" style="cursor: pointer"><i class='bx bx-plus-circle' style="padding-left: 35px; padding-top: 10px;"></i></label>
                          <img src="#" alt="" id="img_loai">
                        </div>
                      </div>
                      <div style="display: flex;">
                        <i class='bx bxs-error-circle img_dm_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                        <span class="error_img_dm error"></span>
                      </div>
                    </div>

                  </div>
                  <div class="form-group">
                    <div class="col-md-12" style="display: flex; align-items: center; justify-content: flex-end; padding-top: 50px;">
                      <button type="button" class="btn_cus btn-save" onclick="insert_loai(0);"><i class="fa fa-check"></i> Lưu
                      </button>
                      <button type="button" class="btn_cus btn-conti " onclick="insert_loai(1);">
                        <i class="fa fa-floppy-o"></i>
                        Lưu và tiếp tục
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn_cus btn-default btn-sm btn-close" data-dismiss="modal"><i class="fa fa-undo"></i> Đóng
        </button>
      </div>
    </div>
  </div>
</div>

<!-- modal tạo nsx -->
<div class="modal fade" id="create_nsx" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Quản lý thương hiệu</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body modal_admin--body">
        <div class="tabtable">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs tab-setting" role="tablist" style="background-color: #EFF3F8; padding: 20px 0 4px 15px;">
            <li role="presentation" style="margin-right: 3px;"><a href="#list-nsx" class="active" aria-controls="list-group" role="tab" data-toggle="tab"><i class="fa fa-list"></i> Danh sách thương hiệu</a></li>
            <li role="presentation" style="float: left;margin-bottom:2px;"><a href="#create-nsx" aria-controls="create-group" role="tab" data-toggle="tab"><i class="fa fa-plus"></i> Tạo mới thương hiệu</a>
            </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content" style="padding:10px; border: 1px solid #ddd; border-top: none;">
            <div role="tabpanel" class="tab-pane active" id="list-nsx">
              <div class="prd_group-body">
                <div class="text-center">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr style="background-color: whitesmoke;">
                        <th class="text-left" style="font-size: 1.4rem; font-weight: 600;padding: 10px;">
                          Tên thương hiệu
                        </th>
                        <th style=" width: 80px;"></th>
                      </tr>
                    </thead>
                    <tbody id="list_nsx">


                    </tbody>
                  </table>
                </div>

              </div>
            </div>

            <!-- Tab Function -->
            <div role="tabpanel" class="tab-pane" id="create-nsx">
              <div class="row form-horizontal">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="label_modal prd_nsx_name_lb">Tên thương hiệu:</label>
                    </div>
                    <div class="col-md-8" style="padding-top: 40px;">
                      <div class="pay-input ">
                        <!-- add: disabled input-block, label-block -->
                        <input type="text" class="form__input prd_nsx_name" onkeyup="check_name('nsx','nsx');" placeholder=" " value="">
                        <label for="" class="form__label  ">Tên thương hiệu</label>
                      </div>
                      <div style="display: flex;">
                        <i class='bx bxs-error-circle prd_nsx_name_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                        <span class="error_prd_nsx_name error"></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-4 ">
                      <label class="label_modal">Chọn hình:</label>
                    </div>
                    <div class="col-md-8">
                      <div style="display: flex;">
                        <label class="btn_upload"><input type="file" id="img_nsx" onchange="readURL(this,'#img_nsx','#img_nsx_temp')" hidden accept=".gif, .png, .jpg, .jfif, .jpeg">Chọn ảnh</label>
                        <div class="display-img " id="thuong_hieu" style=" width: 100px;height: auto;">
                          <label class="label-img_nsx" style="cursor: pointer"><i class='bx bx-plus-circle' style="padding-left: 35px; padding-top: 10px;"></i></label>
                          <img src="#" alt="" id="img_nsx_temp">
                        </div>
                      </div>
                      <div style="display: flex;">
                        <i class='bx bxs-error-circle img_nsx_icon' style="display: none;position: relative;top: 6px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                        <span class="error_img_nsx error"></span>
                      </div>
                    </div>

                  </div>
                  <div class="form-group">
                    <div class="col-md-12" style="display: flex; align-items: center; justify-content: flex-end; padding-top: 50px;">
                      <button type="button" class="btn_cus btn-save" onclick="insert_nsx(0);"><i class="fa fa-check"></i> Lưu
                      </button>
                      <button type="button" class="btn_cus btn-conti " onclick="insert_nsx(1);">
                        <i class="fa fa-floppy-o"></i>
                        Lưu và tiếp tục
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn_cus btn-default btn-sm btn-close" data-dismiss="modal"><i class="fa fa-undo"></i> Đóng
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal thông số kỹ thuật-->
<div class="modal fade" id="thongsokythuat" tabindex="-1" role="dialog" aria-labelledby="info-text" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="info-text">Thông số kỹ thuật</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body body-info">
        <ul class="detail-info-list">


          <?php if (isset($data['thongso']) && !empty($data['thongso'])) {
            if ($data['sanpham']['ma_loai'] == 1) { ?>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <span class="detail-info-name">Loại tivi:</span>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <span class="detail-info-value"> <?= $data["thongso"]['loai_sp']  ?></span>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <span class="detail-info-name">Kích cỡ màn hình:</span>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]['kich_co_tv'] ?> ich</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <span class="detail-info-name">Độ phân giải:</span>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <span class="detail-info-value"> <?= $data["thongso"]['do_phan_giai'] ?></span>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <span class="detail-info-name">Hệ điều hành:</span>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"><?= $data["thongso"]['he_dieu_hanh'] ?></p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <span class="detail-info-name">Ứng dụng:</span>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"><?= $data["thongso"]['ung_dung'] ?></p>
                  </div>
                </div>
              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <span class="detail-info-name">Công nghệ hình ảnh:</span>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <span class="detail-info-value " style="display: inline-block;vertical-align: top; left: 150px;top: -15px;">
                      <?php foreach ($data['congnghe'] as $val) :
                        if ($val != '') {
                      ?>
                          <p><?= $val ?></p>
                      <?php }
                      endforeach;
                      ?>
                    </span>
                  </div>
                </div>
              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <span class="detail-info-name">Tính năng thông minh:</span>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]['tinh_nang'] ?> </p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <span class="detail-info-name">Kết nối:</span>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]['ket_noi']  ?></p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <span class="detail-info-name">Công nghệ loa:</span>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]['loa'] ?></san>
                  </div>
                </div>


              </li>
            <?php }
            if ($data['sanpham']['ma_loai'] == 2) { ?>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <span class="detail-info-name">Loại máy lạnh:</span>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]['loai_sp']  ?> </p>
                  </div>
                </div>
              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <span class="detail-info-name">Kiểu máy lạnh:</span>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["kieu_tu"]  ?> </p>
                  </div>
                </div>
              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <span class="detail-info-name">Công suất làm lạnh, sưởi ấm:</span>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["cong_suat"] ?> </p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <span class="detail-info-name">Phạm vi làm lạnh hiệu quả:</span>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["dung_tich"] ?></p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <span class="detail-info-name">Lọc bụi, kháng khuẩn, khử mùi:</span>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["ung_dung"] ?>'</p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <span class="detail-info-name">Tiện ích:</span>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["tinh_nang"] ?></p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <span class="detail-info-name">Công nghệ làm lạnh:</span>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["cong_nghe"] ?></p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <span class="detail-info-name">Chế độ gió:</span>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["ket_noi"]  ?></p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <span class="detail-info-name">Chất liệu:</span>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["chat_lieu"] ?></p>
                  </div>
                </div>


              </li>
            <?php }
            if ($data['sanpham']['ma_loai'] == 3) { ?>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Loại tủ:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]['loai_sp']  ?> </p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Dung tích tủ:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["dung_tich"] ?></p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Số cánh cửa:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["so_canh_cua"] ?></p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Công suất tiêu thụ công bố theo TCVN:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["cong_suat"] ?></p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Công nghệ tiết kiệm điện:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["kieu_tu"]  ?></p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Công nghệ làm lạnh:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["cong_nghe"] ?></p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Công nghệ kháng khuẩn:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["ung_dung"] ?></p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Tiện ích:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["tinh_nang"] ?> </p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Chất liệu tủ:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["chat_lieu"] ?></p>
                  </div>
                </div>


              </li>
            <?php }
            if ($data['sanpham']['ma_loai'] == 4) { ?>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Loại loa:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]['loai_sp']  ?> </p>
                  </div>
                </div>


              </li>

              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Tổng công suất:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["cong_suat"] ?></p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Tiện ích:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["tinh_nang"] ?></p>
                  </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Phím điều khiển:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["cong_nghe"] ?></p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Tương thích:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["he_dieu_hanh"] ?></p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Kết nối:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["ket_noi"]  ?></p>
                  </div>
                </div>


              </li>
            <?php }
            if ($data['sanpham']['ma_loai'] == 5) { ?>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Loại lò nướng:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]['loai_sp']  ?> </p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Dung tích:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["dung_tich"] ?></p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Công suất:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["cong_suat"] ?></p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Chất liệu lò:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["chat_lieu"] ?> </p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Chức năng chính:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["cong_nghe"] ?></p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Bảng điều khiển:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["ket_noi"]  ?></p>
                  </div>
                </div>


              </li>

              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Tiện ích:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["tinh_nang"] ?></p>
                  </div>
                </div>


              </li>
            <?php }
            if ($data['sanpham']['ma_loai'] == 6) { ?>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Loại máy giặt:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]['loai_sp']  ?> </p>
                  </div>
                </div>
              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Lồng giặt:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]['so_canh_cua'] ?> </p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Khối lượng giặt:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["dung_tich"] ?></p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Kiểu động cơ:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["kieu_tu"]  ?></p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Công nghệ giặt:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["cong_nghe"] ?></p>
                  </div>
                </div>


              </li>

              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Tiện ích:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["tinh_nang"] ?></p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Hiệu suất sự dụng điện:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]['cong_suat'] ?> </p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Tốc độ quay vắt tối đa:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]['ung_dung'] ?>' </p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Chất liệu máy:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]['chat_lieu'] ?></p>
                  </div>
                </div>


              </li>
              <li>
                <div class="grid__row">
                  <div class="col-sm-3" style="padding: 0;">
                    <p class="detail-info-name">Bảng điều khiển:</p>
                  </div>
                  <div class="col-sm-9" style="padding: 0;">
                    <p class="detail-info-value"> <?= $data["thongso"]["ket_noi"]  ?></p>
                  </div>
                </div>


              </li>
            <?php } ?>

            <li>
              <div class="grid__row">
                <div class="col-sm-3" style="padding: 0;">
                  <p class="detail-info-name">Kích thước:</p>
                </div>
                <div class="col-sm-9" style="padding: 0;">
                  <p class="detail-info-value"><?= $data["thongso"]["kich_thuoc"] ?></p>
                </div>
              </div>
            </li>
            <li>
              <div class="grid__row">
                <div class="col-sm-3" style="padding: 0;">
                  <p class="detail-info-name">Khối lượng:</p>
                </div>
                <div class="col-sm-9" style="padding: 0;">
                  <p class="detail-info-value"><?= $data["thongso"]["khoi_luong"] ?></p>
                </div>
              </div>



            </li>
            <li>
              <div class="grid__row">
                <div class="col-sm-3" style="padding: 0;">
                  <p class="detail-info-name">Bảo hành:</p>
                </div>
                <div class="col-sm-9" style="padding: 0;">
                  <p class="detail-info-value"><?= $data["thongso"]["bao_hanh"] ?></p>
                </div>
              </div>


            </li>
            <li>
              <div class="grid__row">
                <div class="col-sm-3" style="padding: 0;">
                  <p class="detail-info-name">Năm ra mắt:</p>
                </div>
                <div class="col-sm-9" style="padding: 0;">
                  <p class="detail-info-value"><?= $data["thongso"]['nam_sx'] ?></p>
                </div>
              </div>


            </li>
            <li>
              <div class="grid__row">
                <div class="col-sm-3" style="padding: 0;">
                  <p class="detail-info-name">Nơi sản xuất:</p>
                </div>
                <div class="col-sm-9" style="padding: 0;">
                  <p class="detail-info-value"><?= $data["thongso"]['noi_san_xuat'] ?></p>
                </div>
              </div>


            </li>
            <li>
              <div class="grid__row">
                <div class="col-sm-3" style="padding: 0;">
                  <p class="detail-info-name">Hãng:</p>
                </div>
                <div class="col-sm-9" style="padding: 0;">
                  <p class="detail-info-value"><?= $data["nsx"] ?></p>
                </div>
              </div>


            </li>
          <?php } else { ?>
            <li>
              <h3>Sản phẩm chưa có thông số kỹ thuật</h3>
            </li>
          <?php } ?>
      </div>
    </div>
  </div>
</div>
<!-- end modal -->

<!-- Modal detail hóa đơn admin-->
<div class="modal fade modal_admin" id="detail_oder" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog modal_ad" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Chi tiết hóa đơn</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <p aria-hidden="true">&times;</p>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="user_main-wrap">
            <table style="margin: 0;">
              <thead>
                <tr>
                  <th>Sản phẩm</th>
                  <th>Giá</th>
                  <th style="text-align: center;">Số lượng</th>
                  <th>Giảm giá</th>
                  <th>Thành tiền</th>
                </tr>
              </thead>
              <tbody id="detail_oder_ad">

              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end modal -->