<?php
session_start();
include("../includes/config.php");
include("../includes/lock.php");
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    date_default_timezone_set('Asia/Singapore');
    $datentime = date("Y-m-d h:i:sa");

    $query = mysqli_query($conn, "DELETE FROM accounts WHERE ID='$id'");
    if ($query) {
        $_SESSION['status'] = "Account Deleted";
        $_SESSION['text'] = "Record deleted permanently";
        $_SESSION['status_code'] = "success";
        header("location: ../studentacc.php");
        $query = mysqli_query($conn, "INSERT INTO activitylog (AccountName, DateTime, Activity) VALUES ('$accountname', '  $datentime', 'Deleted a Student Account')");
    } else {
        $_SESSION['status'] = "Accountnot Deleted";
        $_SESSION['text'] = "Something went wrong";
        $_SESSION['status_code'] = "error";
        header("location: ../studentacc.php");
    }
}
