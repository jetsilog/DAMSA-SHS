<?php
session_start();
include("../includes/config.php");
if (isset($_POST['submit'])) {
  $Schoolyear = $_POST['SY'];
  $Semester = $_POST['Semester'];

  $query = mysqli_query($conn, "INSERT INTO schoolyear (Schoolyear, Semester, Status) VALUES ('$Schoolyear', '$Semester', 0)");
  if ($query) {
    $_SESSION['status'] = "Added New School Year";
    $_SESSION['text'] = "New School Year Scuccessfuly added";
    $_SESSION['status_code'] = "success";
    header("location:../schoolyear.php");
  } else {
    $_SESSION['status'] = "Added New School Year";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location:../schoolyear.php");
  }
}
