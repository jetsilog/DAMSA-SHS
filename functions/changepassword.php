<?php
session_start();
include('../includes/config.php');

if (isset($_POST['submit'])) {
  $uname = $_POST['uname'];
  $old = md5($_POST['Old']);
  $new = md5($_POST['New']);

  $sqlcheck = mysqli_query($conn, "SELECT * FROM accounts WHERE Username='$uname' AND Password='$old'");
  $count = mysqli_num_rows($sqlcheck);


  if ($count == 0) {
    $_SESSION['status'] = "Cant change password Old password is incorrect";
    $_SESSION['text'] = "Please check the informations correctly";
    $_SESSION['status_code'] = "error";
    header("location: ../changepass.php");
  } else {
    $sql = mysqli_query($conn, "UPDATE accounts SET Password='$new' WHERE Username='$uname'");
    $_SESSION['status'] = "Password Updated";
    $_SESSION['text'] = "Remember your new password";
    $_SESSION['status_code'] = "success";
    header("location: ../changepass.php");
  }
}
