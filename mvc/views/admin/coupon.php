<div class="col-sm-10" style="min-height: 665px; background-color: white;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Danh mã giảm giá</h3>
            <button class="btn_cus btn-addsp" onclick='location.href="http://localhost/web_mvc/Admin/create_coupon"'><i class='bx bx-plus' style="font-weight: 600;"></i>Tạo mã giảm giá</button>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="admin_search">
                    <div class="admin_search--input  col-md-5">
                        <input type="text" value="" class="search_input" id='search' placeholder="Nhập mã giảm giá">

                    </div>
                    <div class="select_wrap">
                        <select class=" select select-loaisp form-control" id="loaisp" data-dropup-auto="false" data-size='5' data-live-search="true">
                            <option value="" selected>--Chọn trạng thái--</option>
                            <option value="1">Hết lần nhập</option>
                            <option value="2">Còn lần nhập</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 ">
                <table class="table table_sp ">
                    <thead class="heading-table">
                        <tr>
                            <th>STT</th>
                            <th>Mã giảm giá</th>
                            <th>Số lượng mã</th>
                            <th>Phần trăm</th>
                            <th>Ngày tạo</th>
                            <th style="width: 100px;border-right: none;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="list_coupon">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>