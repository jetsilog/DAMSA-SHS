<?php
session_start();
include("../includes/config.php");
include("../includes/lock.php");
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    date_default_timezone_set('Asia/Singapore');
    $datentime = date("Y-m-d h:i:sa");

    $query = mysqli_query($conn, "DELETE FROM strand WHERE StrandID='$id'");
    if ($query) {
        $_SESSION['status'] = "Strand Deleted";
        $_SESSION['text'] = "Record permanently deleted";
        $_SESSION['status_code'] = "success";
        header("location: ../strand.php");
        $query = mysqli_query($conn, "INSERT INTO activitylog (AccountName, DateTime, Activity) VALUES ('$accountname', '  $datentime', 'Deleted a Strand')");
    } else {
        $_SESSION['status'] = "Strand not Deleted";
        $_SESSION['text'] = "Something went wrong";
        $_SESSION['status_code'] = "error";
        header("location: ../strand.php");
    }
}
