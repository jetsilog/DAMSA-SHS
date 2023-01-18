<?php
include("../includes/config.php");
include("../includes/lock.php");
if (isset($_POST['submit'])) {
  $IDnumber = $_POST['IDnum'];
  $Glvl = $_POST['Gradelvl'];
  $section = $_POST['section'];
  $Name = $_POST['name'];

  $queryinsub = mysqli_query($conn, "SELECT * FROM class WHERE GradeLevel=$Glvl AND Section='$section' AND Schoolyear=$SYID");

  while ($rowsinsub = mysqli_fetch_array($queryinsub)) {

    $Classcode = $rowsinsub['ClassCode'];
    $sem = $rowsy['Semester'];
    $queryinsertsub = mysqli_query($conn, "INSERT INTO grades (Stud_ID, Class_ID, Semester, Schoolyear) VALUES ('$IDnumber', '$Classcode','$sem', $SYID)");

    if ($queryinsertsub) {
      $updatesection = mysqli_query($conn, "UPDATE students SET Stud_Section='$section' WHERE StudentID='$IDnumber'");
      $_SESSION['status'] = "Added to Class";
      $_SESSION['text'] = "Confirm Student in the enlistment tab for their schedule";
      $_SESSION['status_code'] = "success";
      header("location:../studsub.php");
    } else {
      $_SESSION['status'] = "Error Not added";
      $_SESSION['text'] = "Something went wrong";
      $_SESSION['status_code'] = "error";
      header("location:../studsub.php");
    }
  }
}
