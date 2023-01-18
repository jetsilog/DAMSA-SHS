<?php
session_start();
include("../includes/config.php");
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $SY = $_POST['SY'];
  $Semester = $_POST['S'];
  $status = $_POST['status'];
  $query = mysqli_query($conn, "UPDATE schoolyear SET Schoolyear='$SY', Semester='$Semester', Status=$status WHERE ID='$id'");

  if ($query) {
    $_SESSION['status'] = "Updated Successfuly";
    $_SESSION['text'] = "Check Details";
    $_SESSION['status_code'] = "success";
    header("location:../schoolyear.php");
  } else {
    $_SESSION['status'] = "Failed to Update";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location:../schoolyear.php");
  }
}
