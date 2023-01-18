<?php
session_start();
include("../includes/config.php");
include("../includes/lock.php");
if (isset($_POST['submit'])) {
  $IDnum = $_POST['IDnum'];
  $name = $_POST['name'];
  $Track = $_POST['Track'];
  $strand = $_POST['Strand'];
  $Gradelvl = $_POST['Gradelvl'];
  date_default_timezone_set('Asia/Singapore');
  $datentime = date("Y-m-d h:i:sa");

  $sqlins = mysqli_query($conn, "SELECT * FROM classes WHERE Section=");

  $query = mysqli_query($conn, "INSERT INTO enlistment (Stud_ID,Track,Strand,Grade_Level,Date_time,EStatus,Schoolyear) VALUES ('$IDnum', '$Track', '$strand','$Gradelvl','$datentime','Pending','$SYID')");



  if ($query) {
    $_SESSION['status'] = "Enlisted";
    $_SESSION['text'] = "Please wait for the admins approval";
    $_SESSION['status_code'] = "success";
    header("location: ../studentenlistment.php");
  } else {
    $_SESSION['status'] = "Not Enlisted there's a problem";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location: ../studentenlistment.php");
  }
}
