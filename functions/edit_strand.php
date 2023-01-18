<?php
session_start();
include("../includes/config.php");
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $StrandCode = $_POST['SC'];
    $StrandDescription = $_POST['SD'];
    $status = $_POST['status'];
    $query = mysqli_query($conn, "UPDATE strand SET SCode='$StrandCode', StrandDescription='$StrandDescription', Status=$status WHERE StrandID='$id'");

    if ($query) {
        $_SESSION['status'] = "Strand Updated";
        $_SESSION['text'] = "Check details";
        $_SESSION['status_code'] = "success";
        header("location: ../strand.php");
    } else {
        $_SESSION['status'] = "Strand not Updated";
        $_SESSION['text'] = "Something went wrong";
        $_SESSION['status_code'] = "error";
        header("location: ../strand.php");
    }
}
