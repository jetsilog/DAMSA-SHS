<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/damsashs.jpg" rel="icon">
  <title>OTP</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <style>
    html,
    body {
      height: 100%;
    }

    body {
      display: -ms-flexbox;
      display: -webkit-box;
      display: flex;
      -ms-flex-align: center;
      -ms-flex-pack: center;
      -webkit-box-align: center;
      align-items: center;
      -webkit-box-pack: center;
      justify-content: center;
      background-color: #f5f5f5;
    }

    form {
      padding-top: 10px;
      font-size: 14px;
      margin-top: 30px;
    }

    .card-title {
      font-weight: 300;
    }

    .btn {
      font-size: 14px;
      margin-top: 20px;
    }

    .login-form {
      width: 420px;
      margin: 20px;
    }

    .sign-up {
      text-align: center;
      padding: 20px 0 0;
    }

    span {
      font-size: 14px;
    }
  </style>
</head>

<body id="page-top">



  <!-- Container Fluid-->


  <?php
  $storedlrn = $_SESSION['LRN'];
  $storedemail = $_SESSION['gmail'];
  ?>

  <div class="card login-form">
    <div class="card-body">
      <h3 class="card-title text-center">OTP</h3>

      <div class="card-text">
        <form method="POST" action="functions/verifyotp.php">
          <div class="form-group">

            <input type="text" name="otp" maxlength="5" class="form-control form-control-lg" placeholder="OTP" required> <br>
            <input type="hidden" name="oldlrn" value="<?php echo $storedlrn; ?>">
            <input type="hidden" name="oldemail" value="<?php echo $storedemail; ?>">

          </div>

          <button type="submit" name="submit" class="btn btn-primary btn-block">Verify</button>
        </form>
      </div>
    </div>
  </div>



  <!---Container Fluid-->




  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>

</body>

</html>
<?php include("includes/alerts.php"); ?>