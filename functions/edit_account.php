<?php
session_start();
include("../includes/config.php");
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $Accounttype = $_POST['AT'];

    if (empty($_FILES['files']['tmp_name'])) {
        $query = mysqli_query($conn, "UPDATE accounts SET Name='$name' WHERE ID='$id'");

        if ($query) {
            $_SESSION['status'] = "Account profile updated";
            $_SESSION['text'] = "Check your details";
            $_SESSION['status_code'] = "success";
            header("location: ../adminprof.php");
        } else {
            $_SESSION['status'] = "Account profile not Updated";
            $_SESSION['text'] = "Something went wrong";
            $_SESSION['status_code'] = "error";
            header("location: ../adminprof.php");
        }
    } else {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        if (strpos(finfo_file($finfo, $_FILES['files']['tmp_name']), "image") === 0) {
            $imgData = addslashes(file_get_contents($_FILES['files']['tmp_name']));
            $query = mysqli_query($conn, "UPDATE accounts SET Name='$name', Image='{$imgData}' WHERE ID='$id'");
            if ($query) {
                $_SESSION['status'] = "Account profile Updated";
                $_SESSION['text'] = "Check your details";
                $_SESSION['status_code'] = "success";
                header("location: ../adminprof.php");
            } else {
                $_SESSION['status'] = "Account profile not Updated";
                $_SESSION['text'] = "Something went wrong";
                $_SESSION['status_code'] = "error";
                header("location: ../adminprof.php");
            }
        }
    }
}
