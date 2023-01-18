<?php
session_start();
include("../includes/config.php");
include("../includes/lock.php");
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    date_default_timezone_set('Asia/Singapore');
    $datentime = date("Y-m-d h:i:sa");

    $query = mysqli_query($conn, "DELETE FROM track WHERE TrackID='$id'");
    if ($query) {
        $_SESSION['status'] = "Track Deleted";
        $_SESSION['text'] = "Record permanently deleted";
        $_SESSION['status_code'] = "success";
        header("location: ../track.php");
        $query = mysqli_query($conn, "INSERT INTO activitylog (AccountName, DateTime, Activity) VALUES ('$accountname', '  $datentime', 'Deleted a Track')");
    } else {
        $_SESSION['status'] = "Track not Deleted";
        $_SESSION['text'] = "Something went wrong";
        $_SESSION['status_code'] = "error";
        header("location: ../track.php");
    }
}
