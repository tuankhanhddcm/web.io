<div class="col-sm-10" style="min-height: 784px; background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Danh sách sản phẩm</h3>
            <button class="btn_cus btn-addsp" onclick='location.href="http://localhost/web_mvc/Admin/create_sp"'><i class='bx bx-plus' style="font-weight: 600;"></i>Tạo sản phẩm</button>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="admin_search">
                    <div class="admin_search--input  col-md-5">
                        <input type="text" value="" class="search_input" id='search' placeholder="Nhập mã sản phẩm hoặc tên sản phẩm">
                    </div>
                    <div class="select_wrap">
                        <select class=" select select-loaisp form-control" id="loaisp" data-dropup-auto="false" title="Danh mục" data-size='5' data-live-search="true">
                            <option value="" selected>--Chọn Danh mục--</option>
                            <?php if (!empty($data['loai'])) {
                                foreach ($data['loai'] as $val) :
                            ?>
                                    <option value="<?= $val['ma_loai'] ?>"><?= $val['ten_loai'] ?></option>
                            <?php endforeach;
                            }
                            ?>
                        </select>
                    </div>
                    <div class="select_wrap">
                        <select class=" select select-nsx  form-control" id="nsx" data-dropup-auto="false" title="Nhà sản xuất" data-size='5' data-live-search="true">
                            <option value="" selected>--Chọn Nhà sản xuất--</option>
                            <?php if (!empty($data['nsx'])) {
                                foreach ($data['nsx'] as $val) :
                            ?>
                                    <option value="<?= $val['ma_nsx'] ?>"><?= $val['ten_nsx'] ?></option>
                            <?php endforeach;
                            }
                            ?>
                        </select>
                    </div>

                </div>
            </div>
            <div class="col-sm-12 ">
                <table class="table table_sp ">
                    <thead class="heading-table">
                        <tr>
                            <th style="border-left: 1px solid rgba(0,0,0,.1);">Hình</th>
                            <th style="width: 120px;">Mã sản phẩm</th>
                            <th style="width: 400px;">Tên sản phẩm</th>
                            <th style="width: 70px;">Số lượng</th>
                            <th>Giá vốn</th>
                            <th>Giá bán</th>
                            <th>Danh mục</th>
                            <th>Nhà sản xuất</th>
                            <th style="width: 100px;border-right: none;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="list_product">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>