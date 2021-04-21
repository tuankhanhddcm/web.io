<div class="user_main">
    <div class="user_main-title " style="display: flex; justify-content: space-between;">
        <div style="display: flex;align-items: center;">
            <h3>Chi tiết đơn hàng#<?= $data['hd']['ma_hd'] ?></h3>
            <span style="font-size: 1.8rem;padding-left: 5px;">-</span>
            <span style="font-size: 1.8rem; padding-left: 5px;margin-bottom: 5px;">
                <?php switch($data['hd']['trangthai']){
                    case 0:
                        echo 'Đã tiếp nhận đơn hàng';
                    break;
                    }
                ?>  
            </span>
        </div>
        <h3>Ngày đặt hàng: <?= $data['hd']['date']?></h3>
    </div>
    <div class="grid__row">
        <div class="col-sm-6">
            <div class="user_diachi">
                <div class="title">
                    ĐỊA CHỈ NGƯỜI NHẬN
                </div>
                <div class="content">
                    <p class="name"><?=$_SESSION['user']['username']?></p>
                    <p class="address">
                        <span>Địa chỉ: </span>
                        <?= $_SESSION['user']['diachi'] ?>
                    </p>
                    <p class="phone">
                        <span>Số điện thoại: </span>
                        <?= $_SESSION['user']['sdt'] ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="user_diachi" style="margin: 0;">
                <div class="title">
                    HÌNH THỨC THANH TOÁN
                </div>
                <div class="content">
                    <p class="address">
                        Thanh toán tiền mặt khi nhận hàng
                    </p>

                </div>
            </div>
        </div>
    </div>
    <div class="user_main-wrap">
        <table style="margin: 0;">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Giảm giá</th>
                    <th>Tạm tính</th>
                </tr>
            </thead>
            <tbody id="detail_oders">
                <?php  foreach($data['hd_detail'] as $val): ?>
                <tr>
                    <td style="width: 350px">
                        <div class="product-item">
                            <a href="" class="product-link">
                                <img src="http://localhost/web_mvc/<?= $val['sp_img'] ?>" alt="">
                                <div class="product-info">
                                    <p><?= $val['sp_name'] ?></p>
                                </div>
                            </a>
                        </div>
                    </td>
                    <td><?= number_format($val['sp_giaban'])?> đ</td>
                    <td style="text-align: center;"><?= $val['soluong']?></td>
                    <td><?= $val['sp_giagiam'] >0 ? number_format($val['sp_giaban']-$val['sp_giagiam']):'0' ?> đ</td>
                    <td><?= $val['sp_giagiam'] >0 ? number_format($val['sp_giagiam']*$val['soluong']): number_format($val['sp_giaban']*$val['soluong'])?> đ</td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr class="foot_tr">
                    <td colspan="6">
                        <span style="padding-right: 40px;">Tạm tính: </span>
                        <span><?= number_format($val['total_money'])?> đ</span>
                    </td>
                </tr>
                <tr class="foot_tr">
                    <td colspan="6" style="font-size: 1.6rem;">
                        <span style="padding-right: 20px;">Tộng cộng: </span>
                        <span style="color: #f30"><?= number_format($val['total_money'])?> đ</span>
                    </td>
                </tr>
            </tfoot>
        </table>
        
    </div>
    <a href="http://localhost/web_mvc/Account/history" class="btn_cus btn_link">Quay lại đơn hàng của tôi</a>
</div>