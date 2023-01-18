<?php
session_start();
$myyyclasscode = $_SESSION['classcode'];
include("../includes/config.php");
include("../includes/lock.php");
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $first = $_POST['Fg'];
  $Second = $_POST['Sg'];
  $third = $_POST['Tg'];
  $final = $_POST['Fnlg'];

  if ($first == 0 || $Second == 0 || $third == 0) {
    $average = 0;
    $remarks = 'In progress';
  } else {
    $average = ($first + $Second + $third) / 3;
    if ($average >= 75) {
      $remarks = 'Passed';
    } else {
      $remarks = 'Failed';
    }
  }



  $query = mysqli_query($conn, "UPDATE grades SET First_Grade='$first', Second_Grade='$Second', Third_Grade='$third', Final_Grade='$average', Remarks='$remarks' WHERE ID=$id");

  if ($query) {
    $_SESSION['status'] = "Grade Updated";
    $_SESSION['text'] = "New grade added";
    $_SESSION['status_code'] = "success";
    header("location:../adminviewstudents.php?classcode=$myyyclasscode");
  } else {
    $_SESSION['status'] = "Grade not added";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location:../adminviewstudents.php?classcode=$myyyclasscode");
  }
}
