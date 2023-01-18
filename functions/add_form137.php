<?php

session_start();
include("../includes/config.php");
if (isset($_POST['submit'])) {
  $lrn = $_POST['LRN'];
  $pdf = $_FILES['pdf']['name'];
  $pdf_type = $_FILES['pdf']['type'];
  $pdf_size = $_FILES['pdf']['size'];
  $pdf_tem_loc = $_FILES['pdf']['tmp_name'];
  $pdf_store = "../form137/" . $pdf;

  move_uploaded_file($pdf_tem_loc, $pdf_store);

  $query = mysqli_query($conn, "INSERT INTO formone (LRN, pdf,formone_status) VALUES ('$lrn', '$pdf',0)");
  if ($query) {
    $_SESSION['status'] = "New record added";
    $_SESSION['text'] = "Please check the added pdf file";
    $_SESSION['status_code'] = "success";
    header("location:../form137.php");
  } else {
    $_SESSION['status'] = "Cannot add";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location:../form137.php");
  }
}
