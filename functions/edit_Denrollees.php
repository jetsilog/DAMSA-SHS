<?php
session_start();
include("../includes/config.php");
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $LRN = $_POST['LRN'];
  $classcode = $_POST['classcode'];
  $remarks = $_POST['remarks'];
  $sem = $_POST['semester'];

  $query = mysqli_query($conn, "UPDATE grades SET Stud_ID='$LRN',Class_ID='$classcode',Remarks='$remarks',Semester='$sem' WHERE ID='$id'");

  if ($query) {
    $_SESSION['status'] = "Updated Successfuly";
    $_SESSION['text'] = "Check details";
    $_SESSION['status_code'] = "success";
    header("location:../directenroll.php");
  } else {
    $_SESSION['status'] = "Failed to Update";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location:../directenroll.php");
  }
}
