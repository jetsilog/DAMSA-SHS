<?php
session_start();
include("../includes/config.php");
if (isset($_POST['submit'])) {
  $id = $_POST['id'];

  $archivestud = mysqli_query($conn, "UPDATE students SET archive_status='safe' WHERE ID='$id'");

  if ($archivestud) {
    $_SESSION['status'] = "Restored";
    $_SESSION['text'] = "Check on the record in student tab";
    $_SESSION['status_code'] = "success";
    header("location:../student_archive.php");
  } else {
    $_SESSION['status'] = "Oops";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location:../student_archive.php");
  }
}
