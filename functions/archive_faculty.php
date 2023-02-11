<?php
session_start();
include("../includes/config.php");
if (isset($_POST['submit'])) {
  $id = $_POST['id'];

  $archivestud = mysqli_query($conn, "UPDATE faculty SET farchive_status='archived' WHERE ID='$id'");

  if ($archivestud) {
    $_SESSION['status'] = "Deleted";
    $_SESSION['text'] = "Faculty record deleted";
    $_SESSION['status_code'] = "success";
    header("location:../teacher.php");
  } else {
    $_SESSION['status'] = "Oops";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location:../teacher.php");
  }
}
