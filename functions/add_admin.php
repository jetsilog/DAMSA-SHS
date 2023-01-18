<?php
session_start();
include("../includes/config.php");
if (isset($_POST['submit'])) {
  $Username = $_POST['Username'];
  $Name = $_POST['Name'];
  $mypass = md5("12345");


  $query = mysqli_query($conn, "INSERT INTO accounts (Username, Password, Name, AccountType,fb_link_status,google_status) VALUES ('$Username', '$mypass', '$Name','Co-admin','0','0')");
  if ($query) {
    $_SESSION['status'] = "New Co Administrator added";
    $_SESSION['status_code'] = "success";
    header("location:../adminacc.php");
  } else {
    $_SESSION['status'] = "Account not added";
    $_SESSION['status_code'] = "error";
    header("location:../adminacc.php");
  }
}
