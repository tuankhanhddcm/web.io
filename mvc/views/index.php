<!doctype html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500;900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet"> -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;1,200&display=swap" rel="stylesheet"> -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;900&display=swap" rel="stylesheet"> -->
  <link rel="stylesheet" type="text/css" href="http://localhost/web_mvc/public/css/base.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/web_mvc/public/css/main.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/web_mvc/public/css/cart.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/web_mvc/public/css/container.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/web_mvc/public/css/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <title>KStore</title>
</head>

<body>
  <!-- header -->
  <?php require_once "./mvc/views/blocks/header.php"; ?>
  <!-- main -->
  <div class="app ">
    <?php require_once "./mvc/views/pages/" . $data["page"] . ".php"; ?>
  </div>
  <!-- footer -->
  <?php require_once "./mvc/views/blocks/footer.php"; ?>
  <?php require_once "./mvc/views/blocks/modal.php" ?>
  <a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class='bx bxs-chevron-up'></i></a>
  <script type="text/javascript" src="http://localhost/web_mvc/public/js/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
  <script type="text/javascript" src="http://localhost/web_mvc/public/js/ajax.js"></script>
  <script type="text/javascript" src="http://localhost/web_mvc/public/js/main.js"></script>
  <script type="text/javascript" src="http://localhost/web_mvc/public/js/owl.carousel.min.js"></script>
</body>

</html>