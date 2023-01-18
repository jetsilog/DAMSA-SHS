<?php
session_start();
include("../includes/config.php");
include("../includes/lock.php");
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $username = $_POST['Username'];
    $password = $_POST['pass'];
    $Name = $_POST['name'];
    date_default_timezone_set('Asia/Singapore');
    $datentime = date("Y-m-d h:i:sa");
    $query = mysqli_query($conn, "UPDATE accounts SET Username='$username', Password='$password', Name='$Name' WHERE ID='$id'");

    if ($query) {
        $_SESSION['status'] = "Account updated";
        $_SESSION['text'] = "Check details";
        $_SESSION['status_code'] = "success";
        header("location: ../teacheracc.php");
        $query = mysqli_query($conn, "INSERT INTO activitylog (AccountName, DateTime, Activity) VALUES ('$accountname', '  $datentime', 'Edited a faculty Account')");
    } else {
        $_SESSION['status'] = "Account not updated";
        $_SESSION['text'] = "Something went wrong";
        $_SESSION['status_code'] = "error";
        header("location: ../teacheracc.php");
    }
}
