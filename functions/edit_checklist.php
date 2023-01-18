<?php
session_start();
include("../includes/config.php");
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $Track = $_POST['Track'];
  $Strand = $_POST['Strand'];
  $subject = $_POST['Subject'];
  $prereq = $_POST['prereq'];
  $gradelvl = $_POST['Glevel'];
  $semester = $_POST['Semester'];

  $query = mysqli_query($conn, "UPDATE checklist SET Track='$Track', Strand='$Strand',SubjectID='$subject',prerequisite='$prereq',Gradelevel='$gradelvl',Semester='$semester' WHERE ChecklistID='$id'");

  if ($query) {
    $_SESSION['status'] = "Checklist Updated Successfuly";
    $_SESSION['text'] = "Check details";
    $_SESSION['status_code'] = "success";
    header("location:../checklist.php");
  } else {
    $_SESSION['status'] = "Failed to Update";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location:../checklist.php");
  }
}
