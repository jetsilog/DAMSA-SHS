<?php
include("../includes/config.php");
include("../includes/lock.php");
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $Glvl = $_POST['glvl'];
  $section = $_POST['section'];
  $LRN = $_POST['LRN'];

  $queryinsub = mysqli_query($conn, "SELECT * FROM class WHERE GradeLevel=$Glvl AND Section='$section' AND Schoolyear=$SYID");
  $findstud = mysqli_query($conn, "SELECT * FROM sections WHERE ID='$section'");
  $display = mysqli_fetch_array($findstud);
  $sectionname = $display['Section'];

  while ($rowsinsub = mysqli_fetch_array($queryinsub)) {

    $Classcode = $rowsinsub['ClassCode'];
    $sem = $rowsy['Semester'];
    $queryinsertsub = mysqli_query($conn, "INSERT INTO grades (Stud_ID, Class_ID, Semester, Schoolyear) VALUES ('$LRN', '$Classcode','$sem', $SYID)");

    if ($queryinsertsub) {
      $query = mysqli_query($conn, "UPDATE enlistment SET EStatus='Enrolled' WHERE ID='$id'");
      $updatesection = mysqli_query($conn, "UPDATE students SET Stud_Section='$sectionname' WHERE StudentID='$LRN'");
      $_SESSION['status'] = "Approved";
      $_SESSION['text'] = "Student can now view their schedule";
      $_SESSION['status_code'] = "success";
      header("location:../enlistment.php");
    } else {
      $_SESSION['status'] = "Opps";
      $_SESSION['text'] = "Something went wrong";
      $_SESSION['status_code'] = "error";
      header("location:../enlistment.php");
    }
  }
}
