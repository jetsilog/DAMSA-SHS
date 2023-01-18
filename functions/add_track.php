<?php
session_start();
include("../includes/config.php");
include("../includes/lock.php");
if (isset($_POST['submit'])) {
    $TrackCode = $_POST['Trackcode'];
    $TrackDescription = $_POST['Trackdescription'];
    date_default_timezone_set('Asia/Singapore');
    $datentime = date("Y-m-d h:i:sa");

    $query = mysqli_query($conn, "INSERT INTO track (TrackCode, TrackDescription,Status) VALUES ('$TrackCode', '$TrackDescription', 0)");



    if ($query) {
        if ($TrackDescription == 'TVL') {
            $sql = mysqli_query($conn, "INSERT INTO strand (SCode, StrandDescription,Status) VALUES ('TVL1', 'Cookery', 0), ('TVL2','SMAW',0), ('TVL3', 'EIM', 0), ('TVL4', 'ICT', 0)");
        } else if ($TrackDescription == 'Academic') {
            $sql = mysqli_query($conn, "INSERT INTO strand (SCode, StrandDescription,Status) VALUES ('ACD1', 'ABM', 0), ('ACD2','HUMMS',0), ('ACD3', 'STEMM', 0)");
        }
        $_SESSION['status'] = "Track added";
        $_SESSION['text'] = "Check details";
        $_SESSION['status_code'] = "success";
        header("location: ../track.php");
        $query = mysqli_query($conn, "INSERT INTO activitylog (AccountName, DateTime, Activity) VALUES ('$accountname', '  $datentime', 'Added a Track')");
    } else {
        $_SESSION['status'] = "Track not added";
        $_SESSION['text'] = "Something went wrong";
        $_SESSION['status_code'] = "error";
        header("location: ../track.php");
    }
}
