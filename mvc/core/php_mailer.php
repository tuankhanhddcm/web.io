<?php 
    session_start();
    include "../../public/lib/php_mailer/Exception.php";
    include "../../public/lib/php_mailer/OAuth.php";
    include "../../public/lib/php_mailer/PHPMailer.php";
    include "../../public/lib/php_mailer/POP3.php";
    include "../../public/lib/php_mailer/SMTP.php";
    use PHPMailer\PHPMailer\PHPMailer;
    if($_POST['to']){
        $body ='
                <div style="line-height:14pt;padding:20px 0px;font-size:14px;max-width:580px;margin:0 auto">
                <div class="adM">
                </div>
                <div style="padding:0 10px;margin-bottom:25px">
                    <div class="adM">

                    </div>
                    <p>Xin chào '.$_SESSION['user']['ho_ten'].'</p>
                    <p>Cảm ơn Anh/chị đã đặt hàng tại <strong>KStore</strong>!</p>
                    <p>Đơn hàng của Anh/chị đã được tiếp nhận, chúng tôi sẽ nhanh chóng liên hệ với Anh/chị.</p>
                </div>
                <hr>
                <div style="padding:0 10px">

                    <table style="width:100%;border-collapse:collapse;margin-top:20px">
                    <thead>
                        <tr>
                        <th style="text-align:left;width:50%;font-size:medium;padding:5px 0">Thông tin mua hàng</th>
                        <th style="text-align:left;width:50%;font-size:medium;padding:5px 0">Địa chỉ nhận hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td style="padding-right:15px">
                            <table style="width:100%">
                            <tbody>
                                <tr>
                                <td>'. $_SESSION['user']['ho_ten'].'</td>
                                </tr>
                                <tr>
                                <td style="word-break:break-word;word-wrap:break-word"><a href="'.$_SESSION['user']['email'].'" target="_blank">'. $_SESSION['user']['email'].'</a></td>
                                </tr>
                                <tr>
                                <td>'. $_SESSION['user']['sdt'].'</td>
                                </tr>

                            </tbody>
                            </table>
                        </td>
                        <td>
                            <table style="width:100%">
                            <tbody>
                                <tr>
                                <td style="word-break:break-word;word-wrap:break-word">
                                    '.$_SESSION['user']['diachi'].'
                                </td>
                                </tr>
                            </tbody>
                            </table>
                        </td>
                        </tr>
                    </tbody>
                    </table>
                    <table style="width:100%;border-collapse:collapse;margin-top:20px">
                    <thead>
                        <tr>
                        <th style="text-align:left;width:50%;font-size:medium;padding:5px 0">Phương thức thanh toán</th>
                        <th style="text-align:left;width:50%;font-size:medium;padding:5px 0">Phương thức vận chuyển</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td style="padding-right:15px">Thanh toán khi giao hàng (COD)</td>
                        <td>

                            Giao hàng tận nơi<br>

                        </td>
                        </tr>
                    </tbody>
                    </table>

                </div>
                <div style="margin-top:20px;padding:0 10px">
                    <div style="padding-top:10px;font-size:medium"><strong>Thông tin đơn hàng</strong></div>
                    <table style="width:100%;margin:10px 0">
                    <tbody>
                        <tr>
                        <td style="width:50%;padding-right:15px">Mã đơn hàng: #'. $_SESSION['mahd'].'</td>
                        <td style="width:50%">Ngày đặt hàng: '. "<br>" . date("d/m/Y", time()) .'</td>
                        </tr>
                    </tbody>
                    </table>
                    <ul style="padding-left:0;list-style-type:none;margin-bottom:0">
                    <li>
                        <table style="width:100%;border-bottom:1px solid #e4e9eb">
            <tbody>';
            $tong=0;
                foreach ($_SESSION['hd_detail'] as $val):
                    if($val['sp_giagiam'] > 0){
                        $gia =number_format($val['sp_giagiam']);
                        $sum = number_format($val['sp_giagiam'] * $val['soluong']);
                    }else{
                        $gia =number_format($val['sp_giaban']);
                        $sum = number_format($val['sp_giaban'] * $val['soluong']);
                    }
                    $lengt= strlen(substr(substr($val['sp_img'],18),strpos(substr($val['sp_img'],18),'.')) );
                    $img =substr(substr($val['sp_img'],18),0,strlen(substr($val['sp_img'],18))-$lengt) ;
                    $body .='
                        <tr>
                            <td style="width:100%;padding:25px 10px 0px 0" colspan="2">
                            <div style="float:left;width:80px;border:1px solid #ebeff2;overflow:hidden">
                            
                                <img style="max-width:100%;max-height:100%" src=" https://api.cloudinary.com/v1_1/doxapxuid/image/download?api_key=129255888711299&attachment=true&audit_context=eyJhY3Rvcl90eXBlIjoidXNlciIsImFjdG9yX2lkIjoiMzc4YmY0MTg4ZmFmMWJhMTVhZjQ1OGUxNDVhMDU0YWMiLCJ1c2VyX2V4dGVybmFsX2lkIjoiNGExZjUzNTMxN2Y4ZWNkYmU5ZGQwZWI5N2ZjYmVjIiwidXNlcl9jdXN0b21faWQiOiJraGFuaHByaW5jZTI3QGdtYWlsLmNvbSIsImNvbXBvbmVudCI6ImNvbnNvbGUifQ%3D%3D&public_id=upload%2F'.$img.'&signature=bf1228e4de40fe32a4c009202542f9f69d183bdc&target_filename='.substr($val['sp_img'],18).'&timestamp=1620187156&type=upload">
                            </div>
                            <div style="margin-left:100px;font-size: 1.6rem;">
                                <a href="http://localhost/web_mvc/Detail/'. $val['sp_url'].'" style="color:#357ebd;text-decoration:none;line-height: 30px;">'. $val['sp_name'].'</a>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:70%;padding:5px 0px 25px">
                            <div style="margin-left:100px">
                                '.$gia.' đ <span style="margin-left:20px">x '. $val['soluong'].'</span>
                            </div>
                            </td>
                            <td style="text-align:right;width:30%;padding:5px 0px 25px">'.$sum .' đ</td>
                        </tr>';
                        if(isset($_SESSION['code_sale'])){
                            if ($val['sp_giagiam'] > 0) {
                                $tong += $val['soluong'] * ($val["sp_giagiam"]-($val["sp_giagiam"])*(int)$_SESSION['code_sale']/100);
                            } else {
                                $tong += $val['soluong'] * ($val["sp_giaban"]-($val["sp_giaban"])*(int)$_SESSION['code_sale']/100);
                            }
                        }else{
                            if ($val['sp_giagiam'] > 0) {
                                $tong += $val['soluong'] * $val["sp_giagiam"];
                            } else {
                                $tong += $val['soluong'] * $val["sp_giaban"];
                            }
                        }
                endforeach;
            $code =isset($_SESSION['code_sale'])? $_SESSION['code_sale']:"0";
            $body .='</tbody>
                    </table>
                </li>

                </ul>
                <table style="width:100%;border-collapse:collapse;margin-bottom:50px;margin-top:10px">
                <tbody>
                    <tr>
                    <td style="width:20%"></td>
                    <td style="width:80%">
                        <table style="width:100%;float:right">
                        <tbody>
                            <tr>
                                <td style="padding-top:10px">Giảm giá: </td>
                                <td style="font-weight:bold;text-align:right;font-size:16px;padding-top:10px">
                                '.$code .'%
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top:10px">Thành tiền: </td>
                                <td style="font-weight:bold;text-align:right;font-size:16px;padding-top:10px">
                                '. number_format($tong).' đ
                                </td>
                            </tr>
                        </tbody>
                        </table>
                    </td>
                    </tr>
                </tbody>
                </table>
            </div>
            <div style="padding:0 10px">
                <div style="clear:both"></div>
                <p style="text-align:right"><i>Trân trọng,</i></p>
                <p style="text-align:right"><strong>Ban quản trị cửa hàng KStore</strong></p>
            </div>
            </div>';
        $mail = new PHPMailer(true); // Passing `true` enables exceptions
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = 'smtp.gmail.com'; //'relay-hosting.secureserver.net' didn't work
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tsl';
        $mail->Username = "khanhprince27@gmail.com";
        $mail->Password = "xlraquvfhlafpzml";
        $mail->setFrom('khanhprince27@gmail.com', 'KStore'); // Add a sender
        $mail->addAddress($_POST['to']); // Add a recipient
        $mail->isHTML(true);                      // Set email format to HTML
        $mail->Subject = 'Xác nhận đơn hàng từ KStore';
        $mail->Body    = $body;
        $mail->CharSet = 'utf-8';
        $mail->AltBody = 'alt body';
        //send the message, check for errors
        $mail->send();

    }
        