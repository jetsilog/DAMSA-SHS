<?php
session_start();
include("../includes/config.php");
include("../includes/lock.php");
if (isset($_POST['submit'])) {
    $StrandCode = $_POST['StrandCode'];
    $StrandDescription = $_POST['StrandDescription'];
    date_default_timezone_set('Asia/Singapore');
    $datentime = date("Y-m-d h:i:sa");


    $query = mysqli_query($conn, "INSERT INTO strand (SCode, StrandDescription, Status) VALUES ('$StrandCode', '$StrandDescription', 0)");
    if ($query) {
        $_SESSION['status'] = "Strand added";
        $_SESSION['text'] = "Check details";
        $_SESSION['status_code'] = "success";
        header("location: ../strand.php");
        $query = mysqli_query($conn, "INSERT INTO activitylog (AccountName, DateTime, Activity) VALUES ('$accountname', '  $datentime', 'Added a Strand')");
    } else {
        $_SESSION['status'] = "Strand not added";
        $_SESSION['text'] = "Something went wrong";
        $_SESSION['status_code'] = "error";
        header("location: ../strand.php");
    }
}
