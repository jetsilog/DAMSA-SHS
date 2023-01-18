<?php
session_start();
include("../includes/config.php");
include("../includes/lock.php");
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $TrackCode = $_POST['TC'];
    $TrackDescription = $_POST['TD'];
    $status = $_POST['status'];
    date_default_timezone_set('Asia/Singapore');
    $datentime = date("Y-m-d h:i:sa");

    $query = mysqli_query($conn, "UPDATE track SET TrackCode='$TrackCode', TrackDescription='$TrackDescription', Status=$status WHERE TrackID='$id'");

    if ($query) {
        $_SESSION['status'] = "Track updated";
        $_SESSION['text'] = "Check details";
        $_SESSION['status_code'] = "success";
        header("location: ../track.php");
        $query = mysqli_query($conn, "INSERT INTO activitylog (AccountName, DateTime, Activity) VALUES ('$accountname', '  $datentime', 'Edited a Track')");
    } else {
        $_SESSION['status'] = "Track not updated";
        $_SESSION['text'] = "Something went wrong";
        $_SESSION['status_code'] = "error";
        header("location: ../track.php");
    }
}
