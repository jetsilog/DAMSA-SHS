<?php
session_start();
include("../../includes/config.php");
include("../../includes/lock.php");
if (isset($_POST['submit'])) {
  $SubjectCode = $conn->real_escape_string($_POST['SubjectCode']);
  $SubjectDescription = $conn->real_escape_string($_POST['SubjectDescription']);
  date_default_timezone_set('Asia/Singapore');
  $datentime = date("Y-m-d h:i:sa");
  $query = mysqli_query($conn, "INSERT INTO subjects (SubjectCode, SubjectDescription) VALUES ('$SubjectCode', 
  '$SubjectDescription')");
  if ($query) {
    $_SESSION['status'] = "Subject added";
    $_SESSION['text'] = "Check Details";
    $_SESSION['status_code'] = "success";
    header("location: ../../subjects.php");
    $query = mysqli_query($conn, "INSERT INTO activitylog (AccountName, DateTime, Activity) VALUES ('$accountname', '  $datentime', 'Added a Subject')");
  } else {
    $_SESSION['status'] = "Subject not added";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location: ../../subjects.php");
  }
}
