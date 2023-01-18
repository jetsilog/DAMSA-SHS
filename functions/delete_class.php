<?php
session_start();
include("../includes/config.php");
if (isset($_POST['submit'])) {
  $id = $_POST['id'];

  $query = mysqli_query($conn, "DELETE FROM class WHERE ID='$id'");
  if ($query) {
    $_SESSION['status'] = "Deleted Successfuly";
    $_SESSION['text'] = "Record deleted permanently";
    $_SESSION['status_code'] = "success";
    header("location:../class.php");
  } else {
    $_SESSION['status'] = "Failed to Delete";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location:../class.php");
  }
}
