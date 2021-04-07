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
                      <label class="label_modal">Tên danh mục:</label>
                    </div>
                    <div class="col-md-8">
                      <div class="pay-input ">
                        <!-- add: disabled input-block, label-block -->
                        <input type="text" class="form__input" id="prd_group_name" onkeyup="check_name('group');" placeholder=" " value="">
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
                        <label class="btn_upload"><input type="file" id="img_dm" onchange="readURL(this,'#img_dm','#img_loai')" hidden>Chọn ảnh</label>
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
                      <label class="label_modal">Tên thương hiệu:</label>
                    </div>
                    <div class="col-md-8" style="padding-top: 40px;">
                      <div class="pay-input ">
                        <!-- add: disabled input-block, label-block -->
                        <input type="text" class="form__input" id="prd_nsx_name" onkeyup="check_name('nsx','nsx');" placeholder=" " value="">
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
                        <label class="btn_upload"><input type="file" id="img_nsx" onchange="readURL(this,'#img_nsx','#img_nsx_temp')" hidden>Chọn ảnh</label>
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