<div class="col-sm-10" style="min-height: 665px;padding-left: 10px;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Danh sách đơn hàng</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="admin_search">
                    <div class="admin_search--input  col-md-5">
                        <input type="text" value="" class="search_input" id='search' placeholder="Nhập mã đơn hàng hoặc tên khách hàng">
                    </div>
                    <div class="select_wrap">
                        <div class="calendar_input">
                            <i class='bx bx-calendar'></i>
                            <input type="text" class="select_date" id="result" data-val="0" placeholder="Chọn ngày" disabled value="">
                        </div>
                        <form action="#" class="row">
                            <div class="col-md-6 calendar">
                                <div id="inline_cal"></div>
                            </div>
                        </form>
                    </div>
                    <div class="select_wrap">
                        <select class=" select select_trangthai form-control" id="trang_thai" data-dropup-auto="false" title="Trạng thái đơn hàng" data-size='5' data-live-search="true">
                            <option value="" selected>--Chọn trạng thái--</option>
                            <option value="10" >Chờ xác nhận</option>
                            <option value="1" >Đã xác nhận</option>
                            <option value="2" >Đã giao hàng</option>
                            <option value="3" >Yêu cầu hủy đơn</option>
                            <option value="4" >Đơn hàng đã hủy</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 ">
                <table class="table table_sp ">
                    <thead class="heading-table">
                        <tr>
                            <th style="border-left: 1px solid rgba(0,0,0,.1);">Mã đơn hàng</th>
                            <th>Khách hàng</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Tổng tiền</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th style="width: 100px;border-right: none;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="list_hd">

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>


