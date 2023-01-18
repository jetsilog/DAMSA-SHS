<?php
session_start();
include("../includes/config.php");
if (isset($_POST['submit'])) {
  $track = $_POST['track'];
  $strand = $_POST['strand'];
  $subject = $_POST['subject'];
  $gradelevel = $_POST['glvl'];
  $Semester = $_POST['Sem'];
  $prereq = $_POST['prereq'];
  $query = mysqli_query($conn, "INSERT INTO checklist (Track, Strand, prerequisite, Semester, Gradelevel, SubjectID) VALUES ('$track', 
  '$strand', '$prereq', '$Semester', '$gradelevel', '$subject')");
  if ($query) {
    $_SESSION['status'] = "New Checklist added";
    $_SESSION['text'] = "Please check details";
    $_SESSION['status_code'] = "success";
    header("location: ../checklist.php");
  } else {
    $_SESSION['status'] = "Checklist not added";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location: ../checklist.php");
  }
}
