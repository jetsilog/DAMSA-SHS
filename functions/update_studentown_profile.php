<?php
session_start();
include('../includes/config.php');

if (isset($_POST['submit'])) {
  $id = $_POST['ID'];
  $sid = $_POST['SID'];
  $firstname = $_POST['FN'];
  $lastname = $_POST['LN'];
  $middlename = $_POST['MN'];
  $suffix = $_POST['Sf'];
  $age = $_POST['Age'];
  $sex = $_POST['Sex'];
  $brithday = $_POST['BD'];
  $contact = $_POST['Cnum'];
  $email = $_POST['EMA'];
  $guardian = $_POST['GDN'];
  $guardianC = $_POST['GDNC'];
  $address = $_POST['ADD'];



  $sql = mysqli_query($conn, "UPDATE students SET LastName='$lastname', FirstName='$firstname', MiddleName='$middlename',Suffix='$suffix',Age=$age,Sex='$sex',Birthday='$brithday', ContactNum='$contact',Address='$address',Guardian='$guardian',GuardianContact='$guardianC',email='$email' WHERE ID='$id'");



  if ($sql) {
    $_SESSION['status'] = "Profile Updated";
    $_SESSION['text'] = "Check your details";
    $_SESSION['status_code'] = "success";
    header("location: ../studentownprofile.php");
  } else {
    $_SESSION['status'] = "Cant update profile";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location: ../studentownprofile.php");
  }
}
