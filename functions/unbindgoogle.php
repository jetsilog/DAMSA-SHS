<?php
session_start();
include("../includes/config.php");
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $query = mysqli_query($conn, "UPDATE accounts SET google_id='',google_status='0',google_mail='' WHERE ID='$id'");

  if ($query) {
    $unset_token = $_SESSION['access_token'];
    unset($unset_token);
    $_SESSION['status'] = "Unbind Successfuly";
    $_SESSION['text'] = "Account removed";
    $_SESSION['status_code'] = "success";
    header("location:../adminprof.php");
  } else {
    $_SESSION['status'] = "Opps";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location:../adminprof.php");
  }
}
