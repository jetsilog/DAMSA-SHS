<?php
session_start();

$tokenunset = $_SESSION['access_token'];
if (session_destroy()) {
    unset($tokenunset);
    header("location: ../login.php");
}
