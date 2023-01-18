<?php
session_start();
include("../includes/config.php");
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $Section = $_POST['Section'];
  $status = $_POST['status'];

  $query = mysqli_query($conn, "UPDATE sections SET Section='$Section',Sec_status='$status' WHERE ID='$id'");

  if ($query) {
    $_SESSION['status'] = "Updated Successfuly";
    $_SESSION['text'] = "Section Updated please check the changes";
    $_SESSION['status_code'] = "success";
    header("location:../section.php");
  } else {
    $_SESSION['status'] = "Failed to Update";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location:../section.php");
  }
}
