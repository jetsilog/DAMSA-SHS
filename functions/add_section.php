<?php
session_start();
include("../includes/config.php");
if (isset($_POST['submit'])) {
  $Section = $_POST['Section'];


  $query = mysqli_query($conn, "INSERT INTO sections (Section,Sec_status) VALUES ('$Section',1)");
  if ($query) {
    $_SESSION['status'] = "New Section Added";
    $_SESSION['text'] = "Please check details";
    $_SESSION['status_code'] = "success";
    header("location:../section.php");
  } else {
    $_SESSION['status'] = "Section not added";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location:../section.php");
  }
}
