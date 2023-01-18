<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
include("../includes/config.php");
if (isset($_POST['submit'])) {
  $studlrn = $_POST['username'];
  $studemail = $_POST['email'];

  function randomOTP()
  {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 4; $i++) {
      $n = rand(0, $alphaLength);
      $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
  }
  $OTP = randomOTP();

  $checkusername = mysqli_query($conn, "SELECT * FROM accounts WHERE Username='$studlrn'");

  if (mysqli_num_rows($checkusername) > 0) {
    $update_otp = mysqli_query($conn, "UPDATE accounts SET otp='$OTP' WHERE Username='$studlrn'");
    $_SESSION['LRN'] = $studlrn;
    $_SESSION['gmail'] = $studemail;
    if ($update_otp) {
      $_SESSION['status'] = "OTP sent to your email";
      $_SESSION['text'] = "Check your email";
      $_SESSION['status_code'] = "success";
      header("location:../otpreset.php");

      require_once "../PHPMailer/PHPMAiler.php";
      require_once "../PHPMailer/SMTP.php";
      require_once "../PHPMailer/Exception.php";


      $mail = new PHPMailer();
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->Port = 587;
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = 'tls';
      $mail->Username = 'jetchow22@gmail.com';
      $mail->Password = 'gudsuxxvuseugcbc';
      $mail->isHTML(true); //para gumana ang HTML
      $mail->setFrom('jetchow22@gmail.com'); //taga  send ng email
      $mail->addAddress($studemail); //receiver
      $mail->Subject = "OTP";
      $mail->Body = '<div><p>Here is your OTP do not share this to anyone:</p><p>OTP: <b>' . $OTP . '</b></p></div>';

      $mail->send();
    } else {
      $_SESSION['status'] = "Something went wrong on OTP";
      $_SESSION['text'] = "Cannot send";
      $_SESSION['status_code'] = "error";
      header("location:../forgotpassword.php");
    }
  } else {
    $_SESSION['status'] = "No account found";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location:../forgotpassword.php");
  }
}
