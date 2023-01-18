<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
include("../includes/config.php");
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $query3 = mysqli_query($conn, "SELECT * FROM students WHERE ID=$id");
  $rows = mysqli_fetch_array($query3);


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


  $LRN = $rows['StudentID'];
  $email = $rows['email'];
  $mypass = md5("12345");
  $accname = $rows['FirstName'] . " " . $rows['LastName'];
  $query = mysqli_query($conn, "UPDATE students SET Standing='Existing' WHERE ID='$id'");

  if ($query) {
    $_SESSION['status'] = "Approved";
    $_SESSION['text'] = "Your account will be sent to your email account";
    $_SESSION['status_code'] = "success";
    header("location:../newstudenlistment.php");
    $query2 = mysqli_query($conn, "INSERT INTO accounts (Username, Password, Name, AccountType,fb_link_status) VALUES ('$LRN', '$encryptedpass', '$accname', 'Student','0')");
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
    $mail->addAddress($email); //receiver
    $mail->Subject = "DAMSASHS Account";
    $mail->Body = '<div><p>Good day Maam/Sir ' . $accname . ',' . ' </p><p>Here is your Account:</p><p>Username: <b>' . $LRN . '</b></p> <p>Password: <b>' .  $formail . '</></p></div>';

    $mail->send();
  } else {
    $_SESSION['status'] = "Opps";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location:../newstudenlistment.php");
  }
}
