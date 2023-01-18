<?php
session_start();
include("../includes/config.php");
if (isset($_POST['submit'])) {
  $type = $_POST['type'];
  $LRN = $_POST['LRN'];


  $finfo = finfo_open(FILEINFO_MIME_TYPE);
  if (strpos(finfo_file($finfo, $_FILES['files']['tmp_name']), "image") === 0) {
    $imgData = addslashes(file_get_contents($_FILES['files']['tmp_name']));

    $query = mysqli_query($conn, "INSERT INTO cards (Type,LRN,Cardimg) VALUES ('$type', '$LRN', '{$imgData}')");
    if ($query) {
      $_SESSION['status'] = "Submitted";
      $_SESSION['text'] = "Please wait for admins approval and wait for an email for your account";
      $_SESSION['status_code'] = "success";
      header("location:../index.php");
      unset($_SESSION['nSlrn']);
    } else {
      $_SESSION['status'] = "error not submitted";
      $_SESSION['text'] = "Something went wrong";
      $_SESSION['status_code'] = "error";
      header("location:../studcard.php");
    }
  }
}
