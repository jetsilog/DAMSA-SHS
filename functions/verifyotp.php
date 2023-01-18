<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
include("../includes/config.php");
if (isset($_POST['submit'])) {
  $verifyotp = $_POST['otp'];
  $verifylrn = $_POST['oldlrn'];
  $verifyemail = $_POST['oldemail'];
  function randomPassword()
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
  $randpassgenerated = randomPassword();

  $encryptedpass = md5($randpassgenerated);
  $formail = $randpassgenerated;

  $checkaccotp = mysqli_query($conn, "SELECT * FROM accounts WHERE Username='$verifylrn'");

  $rows = mysqli_fetch_array($checkaccotp);
  $mailotp = $rows['otp'];
  if ($mailotp == $verifyotp) {
    $resetpass = mysqli_query($conn, "UPDATE accounts SET Password='$encryptedpass' WHERE Username='$verifylrn'");
    $_SESSION['status'] = "New password sent to your email";
    $_SESSION['text'] = "Check your email";
    $_SESSION['status_code'] = "success";
    header("location:../login.php");

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
    $mail->addAddress($verifyemail); //receiver
    $mail->Subject = "New Password";
    $mail->Body = '<div><p>Here is your new password:</p><p>Password: <b>' . $formail . '</b></p></div>';

    $mail->send();
    unset($_SESSION['LRN']);
    unset($_SESSION['gmail']);
  } else {
    $_SESSION['status'] = "Wrong OTP";
    $_SESSION['text'] = "Double check your input";
    $_SESSION['status_code'] = "error";
    header("location:../otpreset.php");
  }
}
