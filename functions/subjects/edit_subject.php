<?php
session_start();
include("../../includes/config.php");
include("../../includes/lock.php");
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $SubjectCode = $conn->real_escape_string($_POST['SC']);
  $SubjectDescription = $conn->real_escape_string($_POST['SD']);
  date_default_timezone_set('Asia/Singapore');
  $datentime = date("Y-m-d h:i:sa");
  $query = mysqli_query($conn, "UPDATE subjects SET SubjectCode='$SubjectCode', SubjectDescription='$SubjectDescription' WHERE ID='$id'");

  if ($query) {
    $_SESSION['status'] = "Subject updated";
    $_SESSION['text'] = "Check details";
    $_SESSION['status_code'] = "success";
    header("location: ../../subjects.php");
    $query = mysqli_query($conn, "INSERT INTO activitylog (AccountName, DateTime, Activity) VALUES ('$accountname', '  $datentime', 'Edited a Subject')");
  } else {
    $_SESSION['status'] = "Subject not updated";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location: ../../subjects.php");
  }
}
