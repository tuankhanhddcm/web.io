<div class="col-sm-10" style="min-height: 665px;padding-left: 10px;">
    <div class="main_ward">
        <div class="main-name">
            <h3 class="main-text">Báo cáo doanh số</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="admin_search">
                    <div class="select_wrap" style="display: flex;align-items: center;padding-left: 50px;margin:0px;">
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
                    <div style="font-size: 1.6rem; font-weight: 300;border: 1px solid rgba(0,0,0,0.1);padding: 8px;border-radius: 3px;background-color: #cccc;">Đến</div>
                    <div class="select_wrap" style="display: flex;align-items: center;padding-left: 20px;">
                        <div class="calendar_input2">
                            <i class='bx bx-calendar'></i>
                            <input type="text" class="select_date" id="results" data-val="0" placeholder="Chọn ngày" disabled value="">
                        </div>
                        <form action="#" class="row">
                            <div class="col-md-6  calendar2" style="display: none;">
                                <div id="inline_cal2"></div>
                            </div>
                        </form>
                    </div>
                    <button class="btn_cus btn_date btn_week">Tuần</button>
                    <button class="btn_cus btn_date btn_month">Tháng</button>
                    <button class="btn_cus btn_date btn_quy">Quý</button>
                </div>
            </div>
         
            <div class="col-sm-12 row" style=" margin-top: 20px;">
                <div class="col-md-3 padd-right-0">
                    <div class="report-box" style="border: 1px dotted #cccc; border-radius: 3px">
                        <div class="infobox-icon">
                            <i class='bx bxs-purchase-tag' style="font-size: 4.8rem;color:#0B87C9" ></i>
                        </div>
                        <div class="infobox-data">
                            <h3 class="infobox-title" style="font-size: 2.5rem;color:#0B87C9">0</h3>
                            <span class="infobox-data-number text-center" style="font-size: 1.6rem; color: #333;">Số đơn hàng</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 padd-right-0">
                    <div class="report-box " style="border: 1px dotted #ddd; border-radius: 0">
                        <div class="infobox-icon">
                        <i class='bx bx-refresh' style="font-size: 5.5rem;color:orange" ></i>
                        </div>
                        <div class="infobox-data">
                            <h3 class="infobox-title" style="font-size: 2.5rem; color: orange;">75,190,000đ</h3>
                            <span class="infobox-data-number text-center" style="font-size: 1.6rem; color: #333;">Doanh số</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 padd-right-0">
                    <div class="report-box" style="border: 1px dotted #ddd; border-radius: 0">
                        <div class="infobox-icon">
                        <i class='bx bx-money' style="font-size: 5.5rem;color:#D53F40"></i>
                        </div>
                        <div class="infobox-data">
                            <h3 class="infobox-title " style="font-size: 2.5rem; color: #D53F40;">63,600,000đ</h3>
                            <span class="infobox-data-number text-center" style="font-size: 1.6rem; color: #333;">Tiền vốn</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 padd-right-0">
                    <div class="report-box " style="border: 1px dotted #ddd; border-radius: 0">
                        <div class="infobox-icon">
                        <i class='bx bxs-dollar-circle' style="font-size: 5.5rem;color: forestgreen" ></i>
                        </div>
                        <div class="infobox-data ">
                            <h3 class="infobox-title orange" style="font-size: 2.5rem; color: forestgreen;">11,590,000đ</h3>
                            <span class="infobox-data-number text-center"  style="font-size: 1.6rem; color: #333;">Lợi nhuận</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 ">
                <table class="table table_sp ">
                    <thead class="heading-table">
                        <tr>
                            <th style="border-left: 1px solid rgba(0,0,0,.1);">Mã đơn hàng</th>
                            <th>Ngày bán</th>
                            <th>Khách hàng</th>
                            <th>Số lượng</th>
                            <th>Doanh số</th>
                            <th>Tiền vốn</th>
                            <th>Lợi nhuận</th>
                        </tr>
                    </thead>
                    <tbody id="list_doanhso">
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>