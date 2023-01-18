<?php
session_start();
include("../includes/config.php");
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $query = mysqli_query($conn, "UPDATE formone SET formone_status=1 WHERE ID='$id'");

  if ($query) {
    $_SESSION['status'] = "Released";
    $_SESSION['text'] = "Student can now access the file in their account";
    $_SESSION['status_code'] = "success";
    header("location:../form137.php");
  } else {
    $_SESSION['status'] = "Opps";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location:../form137.php");
  }
}
