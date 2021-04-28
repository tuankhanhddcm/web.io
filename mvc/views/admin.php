<!doctype html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;900&display=swap" rel="stylesheet"> -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500;900&display=swap" rel="stylesheet"> -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;1,200&display=swap" rel="stylesheet"> -->
  <link rel="stylesheet" type="text/css" href="http://localhost/web_mvc/public/css/base.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/web_mvc/public/css/main.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/web_mvc/public/css/cart.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/web_mvc/public/css/container.css">
  <link rel="stylesheet" href="http://localhost/web_mvc/public/css/admin.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/web_mvc/public/css/rome.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/web_mvc/public/css/style_calendar.css">
  <title>KStore</title>
</head>

<body>
  <div class="container-fluid" style="background-color: #ffff; margin-top: 70px;">
    <div class="row">
      <!-- header -->
      <?php require_once "./mvc/views/blocks/header_admin.php"; ?>
      <div class="col-sm-12" style="padding: 0;">
        <div class="row" style="margin-right: 10px;">
          <!-- slider -->
          <?php require_once "./mvc/views/blocks/slider.php"; ?>
          <!-- main admin -->
          <?php require_once "./mvc/views/admin/" . $data["page"] . ".php"; ?>
        </div>
      </div>
    </div>
  </div>
  <?php require_once "./mvc/views/blocks/modal.php" ?>
  <a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class='bx bxs-chevron-up'></i></a>
  <div id="toast"></div>
  <div class="footer-title" style="position: relative;z-index: 69;text-align: center;width: 100%;bottom: 0;">
      <p class="footer-text" >© 2021 - Bản quyền thuộc về KStore</p>
  </div>
  <script type="text/javascript" src="http://localhost/web_mvc/public/js/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
  <script type="text/javascript" src="http://localhost/web_mvc/public/js/ajax.js"></script>
  <script type="text/javascript" src="http://localhost/web_mvc/public/js/admin.js"></script>
  <script type="text/javascript" src="http://localhost/web_mvc/public/js/rome.js"></script>
  <script type="text/javascript" src="http://localhost/web_mvc/public/js/calendar.js"></script>
</body>

</html>