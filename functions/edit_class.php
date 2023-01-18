<?php
session_start();
include("../includes/config.php");
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $classcode = $_POST['classcode'];
  $Track = $_POST['Track'];
  $Strand = $_POST['Strand'];
  $subject = $_POST['Subject'];
  $gradelvl = $_POST['Glevel'];
  $section = $_POST['Section'];
  $schedule = $_POST['schedule'];
  $teacher = $_POST['teacher'];
  $query = mysqli_query($conn, "UPDATE class SET ClassCode='$classcode', Track='$Track',Strand='$Strand',Subject='$subject',GradeLevel='$gradelvl',Section='$section',Schedule='$schedule',Teacher='$teacher' WHERE ID='$id'");

  if ($query) {
    $_SESSION['status'] = "Updated Successfuly";
    $_SESSION['text'] = "Check details";
    $_SESSION['status_code'] = "success";
    header("location:../class.php");
  } else {
    $_SESSION['status'] = "Failed to Update";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location:../class.php");
  }
}
