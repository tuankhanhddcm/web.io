<!doctype html>
<html lang="en">

<head>
    <title>KStore</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://localhost/web_mvc/public/css/base.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/web_mvc/public/css/main.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/web_mvc/public/css/cart.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/web_mvc/public/css/container.css">
    <link rel="stylesheet" href="http://localhost/web_mvc/public/css/admin.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/web_mvc/public/css/login.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div id="particles-js">
        <div class="container" style="position: absolute; top: 200px;left: 200px;">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4" style="font-size: 3rem; font-weight: 500;">Đăng nhập admin</h3>
                            </div>

                        </div>

                        <div class="sign-form">
                            <div class="error__wrap" style="margin-bottom: 20px;">
                                <div class="pay-input ">
                                    <input type="text" class="form__input user " style="top: 8px;font-size: 1.4rem;" name="username" onkeyup="check('.user');" placeholder=" " value="">
                                    <label for="" class="form__label  ">Tên đăng nhập</label>
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle user_icon' style="display: none;position: relative;top: 10px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                    <span class="error_user error"></span>
                                </div>
                            </div>
                            <div class="error__wrap" style="margin-bottom: 20px;">
                                <div class="pay-input ">
                                    <input type="password" class="form__input passs" style="top: 8px;" name="pass" onkeyup="check('.passs');" placeholder=" " value="">
                                    <label for="" class="form__label  ">Mật khẩu</label>
                                </div>
                                <div style="display: flex;">
                                    <i class='bx bxs-error-circle passs_icon' style="display: none;position: relative;top: 10px;left: 10px;color: red;font-size: 1.8rem;padding-right: 5px;"></i>
                                    <span class="error_passs error"></span>
                                </div>
                            </div>

                        </div>
                        <div class="form-group d-flex align-items-center">
                            <div class="w-100 d-flex justify-content-end">
                                <button type="button" style="font-size: 1.6rem;font-weight: bold;" onclick="login('2');" class="btn_cus btn-primary rounded">Đăng nhập</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>


    <script type="text/javascript" src="http://localhost/web_mvc/public/js/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="http://localhost/web_mvc/public/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="http://localhost/web_mvc/public/js/admin.js"></script>
    <script type="text/javascript" src="http://localhost/web_mvc/public/js/ajax.js"></script>
    <script type="text/javascript" src="http://localhost/web_mvc/public/js/particles.js"></script>
    <script type="text/javascript" src="http://localhost/web_mvc/public/js/app.js"></script>
    

</body>

</html>