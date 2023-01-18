<?php
include("includes/config.php");
include_once('fb-config-login.php');
include_once("_google-login.php");
$permissions = array('email'); // Optional permissions
$loginUrl = $helper->getLoginUrl('https://localhost/damsashs/fb-callback-login.php', $permissions);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $time = time() - 30;
  $ip_addresss = getIPAddr();
  $check_login_row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total_count FROM login_log WHERE Try_time>$time AND IP_address='$ip_addresss'"));
  $total_count = $check_login_row['total_count'];
  if ($total_count == 3) {
    $error = "Too many failed attempts. Please Login after 30 sec";
  } else {
    $uname = $_POST["Username"];
    $pass = md5($_POST["Password"]);
    $query = mysqli_query($conn, "SELECT * FROM accounts WHERE Username = '$uname' AND Password='$pass'");
    $count = mysqli_num_rows($query);
    $row = mysqli_fetch_array($query);

    if ($count == 1) {
      $acct = $row['AccountType'];
      $_SESSION['username'] = $uname;

      if ($acct == 'Student') {
        mysqli_query($conn, "DELETE FROM login_log WHERE IP_address='$ip_addresss'");
        header("location: stud_checklist.php");
      } elseif ($acct == 'Administrator' || $acct == 'Co-admin') {
        mysqli_query($conn, "DELETE FROM login_log WHERE IP_address='$ip_addresss'");
        header("location:dashboard.php");
      } elseif ($acct == 'Faculty') {
        mysqli_query($conn, "DELETE FROM login_log WHERE IP_address='$ip_addresss'");
        header("location: teacherclass.php");
      }
    } else {
      $total_count++;
      $rem_attm = 3 - $total_count;
      if ($rem_attm == 0) {
        $error = "Too many failed attempts. Please Login after 30 sec";
      } else {
        $error = "Invalid Username or Password  $rem_attm attempts remaining";
      }
      $try_time = time();
      mysqli_query($conn, "INSERT INTO login_log(IP_address,Try_time) VALUES ('$ip_addresss','$try_time')");
    }
  }
}


function getIPAddr()
{
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ipAddr = $_SERVER['HTTP_CLIENT_IP'];
  } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ipAddr = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ipAddr = $_SERVER['REMOTE_ADDR'];
  }
  return $ipAddr;
}



?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/damsashs.jpg" rel="icon">
  <title>DAMSASHS Login</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <style>
    body,
    html {
      height: 100%;
    }

    * {
      box-sizing: border-box;
    }

    .bg-img {
      /* The image used */
      background-image: url("indexfiles/images/indexheader.jpg");

      /* Control the height of the image */
      min-height: 380px;

      /* Center and scale the image nicely */
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;

    }
  </style>
</head>

<body class="bg-gradient-login">
  <!-- Login Content -->

  <div class="container-login bg-img">
    <span><a href="index.php"><i class="fa fa-arrow-circle-left" style="color:white;">Home</i></a></span>
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">

                    <h1 class="h4 text-gray-900 mb-4"><img src="img/logo/damsashs.jpg" height="150px" width="150px"></h1>
                  </div>
                  <form class="user" method="POST">
                    <div class="form-group">
                      <div class="input-group clockpicker">
                        <input type="text" class="form-control" placeholder="Enter Username" name="Username" id="username" required>
                        <div class="input-group-append">
                          <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                      </div>

                    </div>
                    <div class="form-group">
                      <div class="input-group clockpicker">
                        <input type="password" class="form-control" placeholder="Enter Password" name="Password" id="password" required>
                        <div class="input-group-append">
                          <span type="button" onclick="showpass()" class="input-group-text"><i class="fa fa-eye"></i></span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <hr>

                    <?php
                    if (isset($error)) {
                    ?>
                      <div align="center">
                        <span class="alert alert-danger"><?php echo $error; ?></span>
                      </div>

                    <?php  } ?>
                    <br>

                  </form>
                  <hr>
                  <a href="<?php echo htmlspecialchars($loginUrl); ?>" class="btn btn-primary btn-block"><i class="fab fa-facebook-square"></i> Login with Facebook</a>
                  <a href="<?= $google_client->createAuthUrl() ?>" class="btn btn-warning btn-block"><i class="fab fa-google-plus-g"></i> Login with Google</a>
                  <br>

                  <center>
                    <span>
                      <a href="forgotpassword.php">Forgot password?</a>
                    </span>
                  </center>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>

  <script>
    function showpass() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>
</body>

</html>
<?php include("includes/alerts.php"); ?>