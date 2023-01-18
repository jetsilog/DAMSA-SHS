<?php
session_start();
include("../includes/config.php");
if (isset($_POST['submit'])) {
  $LRN = $_POST['LRN'];
  $classcode = $_POST['classcode'];
  $remarks = $_POST['remarks'];
  $sem = $_POST['semester'];


  $query = mysqli_query($conn, "INSERT INTO grades (Stud_ID,Class_ID,Remarks,Semester) VALUES ('$LRN','$classcode','$remarks','$sem')");
  if ($query) {
    $_SESSION['status'] = "New enrollee Added";
    $_SESSION['text'] = "Please check details";
    $_SESSION['status_code'] = "success";
    header("location:../directenroll.php");
  } else {
    $_SESSION['status'] = "not added";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location:../directenroll.php");
  }
}
