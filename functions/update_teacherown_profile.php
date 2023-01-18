<?php
session_start();
include('../includes/config.php');

if (isset($_POST['submit'])) {
  $id = $_POST['ID'];
  $fid = $_POST['FID'];
  $firstname = $_POST['FN'];
  $lastname = $_POST['LN'];
  $middlename = $_POST['MN'];
  $suffix = $_POST['Sf'];
  $contact = $_POST['CN'];
  $address = $_POST['ADD'];
  $position = $_POST['pos'];
  $email = $_POST['EA'];


  $sql = mysqli_query($conn, "UPDATE faculty SET LastName='$lastname', FirstName='$firstname', MiddleName='$middlename',F_Suffix='$suffix',Contact='$contact',Address='$address',Position='$position',Email='$email' WHERE ID='$id'");



  if ($sql) {
    $_SESSION['status'] = "Profile Updated";
    $_SESSION['text'] = "Check your details";
    $_SESSION['status_code'] = "success";
    header("location: ../teacherownprofile.php");
  } else {
    $_SESSION['status'] = "Cant update profile";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location: ../teacherownprofile.php");
  }
}
