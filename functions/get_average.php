<?php
session_start();
include("../includes/config.php");
if (isset($_POST['submit'])) {
  $lrn = $_POST['LRN'];
  $ave = $_POST['average'];
  $mylrnaw = $_SESSION['awardeelrn'];

  if ($ave >= 90 and $ave <= 94) {
    $award = "With Honors";
  } else if ($ave >= 95) {
    $award = "With High Honors";
  }

  $query = mysqli_query($conn, "INSERT INTO awardees (LRN,Average,Award) VALUES ('$lrn', $ave, '$award')");
  if ($query) {
    $_SESSION['status'] = "Grade Finalized";
    $_SESSION['text'] = "Check the record in awardees section";
    $_SESSION['status_code'] = "success";
    header("location:../stud_finalav.php?studlrn=$mylrnaw");
  } else {
    $_SESSION['status'] = "Ooops";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location:../stud_finalav.php?studlrn=$mylrnaw");
  }
}
