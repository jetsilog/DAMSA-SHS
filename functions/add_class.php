<?php
session_start();
include("../includes/config.php");
include("../includes/lock.php");
if (isset($_POST['submit'])) {
  $classcode = $_POST['classcode'];
  $Track = $_POST['Track'];
  $Strand = $_POST['Strand'];
  $subject = $_POST['subject'];
  $gradelvl = $_POST['Glevel'];
  $section = $_POST['Section'];
  $schedule = $_POST['schedule'];
  $teacher = $_POST['teacher'];

  $querycheckcc = mysqli_query($conn, "SELECT * FROM class WHERE ClassCode='$classcode' AND Schoolyear=$SYID");
  $count1 = mysqli_num_rows($querycheckcc);

  $querycheck2 = mysqli_query($conn, "SELECT * FROM classes WHERE Subject='$subject' AND Strand='$Strand' AND GradeLevel='$gradelvl' AND Section='$section' AND Schoolyear=$SYID");
  $count2 = mysqli_num_rows($querycheck2);

  if ($count1 > 0 || $count2 > 0) {
    $_SESSION['status'] = "Duplicate Class";
    $_SESSION['text'] = "Something went wrong";
    $_SESSION['status_code'] = "error";
    header("location:../class.php");
  } else {
    $query = mysqli_query($conn, "INSERT INTO class (Classcode, Track, Strand, Subject, GradeLevel, Section, Schedule, Teacher, Schoolyear) VALUES ('$classcode', '$Track', '$Strand','$subject','$gradelvl','$section','$schedule','$teacher', $SYID)");
    if ($query) {
      $_SESSION['status'] = "New class added";
      $_SESSION['text'] = "Check details";
      $_SESSION['status_code'] = "success";
      header("location:../class.php");
    } else {
      $_SESSION['status'] = "Class not added";
      $_SESSION['text'] = "Something went wrong";
      $_SESSION['status_code'] = "error";
      header("location:../class.php");
    }
  }
}
