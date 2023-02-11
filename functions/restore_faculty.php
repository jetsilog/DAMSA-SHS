<?php
session_start();
include("../includes/config.php");
if (isset($_POST['submit'])) {
  $id = $_POST['id'];

  $archivestud = mysqli_query($conn, "UPDATE faculty SET farchive_status='safe' WHERE ID='$id'");

  if ($archivestud) {
    $_SESSION['status'] = "Restored";
    $_SESSION['text'] = "Faculty record restored";
    $_SESSION['status_code'] = "success";
    header("location:../faculty_archive.php");
  } else {
    $_SESSION['status'] = "Oops";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location:../faculty_archive.php");
  }
}
