<div class="col-sm-10" style="padding-left: 10px;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Danh sách sản phẩm</h3>
            <button class="btn_cus btn-addsp"><i class='bx bx-plus-medical'></i>Tạo sản phẩm</button>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="admin_search">
                    <div class="admin_search--input  col-md-5">
                        <input type="text" value="" class="search_input" id='search' placeholder="Nhập mã sản phẩm hoặc tên sản phẩm">
                    </div>
                    <div class="select_wrap">
                        <select class=" select select-loaisp form-control" id="loaisp" data-dropup-auto="false" title="Danh mục" data-size='5' data-live-search="true">
                            <option value="">--Danh mục--</option>
                            <optgroup label="Chọn danh mục" style="font-weight: 600;color:black">
                            <?php if(!empty($data['loai'])) {
                                foreach($data['loai'] as $val):
                            ?>
                            <option value="<?= $val['ma_loai']?>"><?=$val['ten_loai'] ?></option>
                            <?php endforeach;
                                }
                            ?>
                            </optgroup>
                        </select>
                    </div>
                    <div class="select_wrap">
                        <select class=" select select-nsx  form-control" id="nsx" data-dropup-auto="false" title="Nhà sản xuất" data-size='5' data-live-search="true">
                            <option value="" >--Nhà sản xuất--</option>
                            <optgroup label="Chọn nhà sản xuất" style="font-weight: 600;color:black">
                            <?php if(!empty($data['nsx'])) {
                                    foreach($data['nsx'] as $val):
                                ?>
                                <option value="<?= $val['ma_nsx']?>"><?=$val['ten_nsx'] ?></option>
                                <?php endforeach;
                                    }
                                ?>
                            </optgroup>
                        </select>
                    </div>

                </div>
            </div>
            <div class="col-sm-12 " style=" padding-right: 30px;" >
                <table class="table table_sp ">
                    <thead class="heading-table">
                        <tr>
                            <th style="border-left: 1px solid rgba(0,0,0,.1);">Hình</th>
                            <th style="width: 100px;">Mã sản phẩm</th>
                            <th style="width: 400px;">Tên sản phẩm</th>
                            <th style="width: 70px;">Số lượng</th>
                            <th>Giá vốn</th>
                            <th>Giá bán</th>
                            <th>Danh mục</th>
                            <th>Nhà sản xuất</th>
                            <th style="width: 150px;border-right: none;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="list_product">
                        <?php if(isset($data['sanpham']) && !empty($data['sanpham'])) { 
                            foreach($data['sanpham'] as $val):
                        ?>
                        <tr class="body-table">
                            <td style="width: 50px;border-left: 1px solid rgba(0,0,0,.1);"><img src="http://localhost/web_mvc/<?= $val['sp_img']?>" alt="" style="width: 50px;min-height: 10px;"></td>
                            <td><?= $val['sp_ma']?></td>
                            <td><a href="" style="color: #357ebd;"><?= $val['sp_name']?></a> </td>
                            <td style="text-align: center;"><?= $val['sp_sl']?></td>
                            <td style="color: black;font-weight: 400;text-align: end;"><?= number_format($val['sp_gia'])?>đ</td>
                            <td style="color: black;font-weight: 400;text-align: end;"><?= number_format($val['sp_giaban'])?>đ</td>
                            <td><?= $val['ten_loai'] ?></td>
                            <td><?= $val['ten_nsx'] ?></td>
                            <td style="display: flex;align-items: center;justify-content: center;padding-top: 20px;border-right: none;">
                                <button type="button" class=" btn-update" title="Sửa"><i class="fa fa-pencil-square-o"></i></button>
                                <button type="button" class=" btn-copy" title="Copy"><i class="bx bx-copy-alt"></i></button>
                                <button type="button" class=" btn-deletd" title="Xóa"><i class="bx bxs-trash"></i></button>
                            </td>
                        </tr>
                        <?php endforeach; 
                        } 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>