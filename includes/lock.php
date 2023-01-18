<?php
include("config.php");

session_start();
$username = $_SESSION['username'];
$query = mysqli_query($conn, "SELECT * FROM accounts WHERE Username='$username'");
$rows = mysqli_fetch_array($query);

$accountname = $rows['Name'];
$gmail_auth = $rows['google_mail'];
$usertype = $rows['AccountType'];

$sql = mysqli_query($conn, "SELECT * FROM schoolyear WHERE Status=1");
$rowsy = mysqli_fetch_array($sql);

$SYID = $rowsy['ID'];

if (!isset($username)) {
    header("location: login.php");
}
