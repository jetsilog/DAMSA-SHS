<?php
session_start();
include("../includes/config.php");
if (isset($_POST['submit'])) {
  $id = $_POST['id'];

  $archivestud = mysqli_query($conn, "UPDATE students SET archive_status='archived' WHERE ID='$id'");

  if ($archivestud) {
    $_SESSION['status'] = "Deleted";
    $_SESSION['text'] = "Student record deleted";
    $_SESSION['status_code'] = "success";
    header("location:../studentprof.php");
  } else {
    $_SESSION['status'] = "Oops";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location:../studentprof.php");
  }
}
