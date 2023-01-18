<?php
session_start();
include("../includes/config.php");
if (isset($_POST['submit'])) {
  $LRN = $_POST['LRN'];
  $StudLname = $_POST['Lastname'];
  $StudFname = $_POST['Firstname'];
  $StudMName = $_POST['Middlename'];
  $Studsuffix = $_POST['Suffixx'];
  $StudAge = $_POST['Agee'];
  $StudSex = $_POST['Sexx'];
  $StudBday = $_POST['Birthday'];
  //$StudAddress = $_POST['Address'];
  // $StudContactNum = $_POST['Cnumm'];
  // $StudGuardian = $_POST['Guardiann'];
  //$StudGcnum = $_POST['GCnumm'];
  $StudGradelvl = $_POST['Gradelevel'];
  $StudTrack = $_POST['Trackk'];
  $StudStrand = $_POST['Strandd'];
  $email = $_POST['email'];

  function randomPassword()
  {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
      $n = rand(0, $alphaLength);
      $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
  }
  $mypass = md5("12345");



  $_SESSION['nSlrn'] = $LRN;
  $finfo = finfo_open(FILEINFO_MIME_TYPE);
  if (strpos(finfo_file($finfo, $_FILES['files']['tmp_name']), "image") === 0) {
    $imgData = addslashes(file_get_contents($_FILES['files']['tmp_name']));

    $newquery = mysqli_query($conn, "INSERT INTO students (StudentID, LastName, FirstName, MiddleName, Suffix, Age, Sex, Birthday, GradeLevel, TrackID, StrandID, Image, Standing, email) VALUES ('$LRN','$StudLname','$StudFname','$StudMName','$Studsuffix',$StudAge,'$StudSex','$StudBday',$StudGradelvl,$StudTrack,$StudStrand, '{$imgData}','New','$email')");
    if ($newquery) {

      $_SESSION['status'] = "Submitted";
      $_SESSION['text'] = "Fill out the next page";
      $_SESSION['status_code'] = "success";
      header("location: ../studcard.php");
    } else {
      $_SESSION['status'] = "Can't Submit";
      $_SESSION['text'] = "Something went wrong";
      $_SESSION['status_code'] = "error";
      header("location: ../newstudent.php");
    }
  } else {
    $newquery = mysqli_query($conn, "INSERT INTO students (StudentID, LastName, FirstName, MiddleName, Suffix, Age, Sex, Birthday, GradeLevel, TrackID, StrandID, Standing, email) VALUES ('$LRN','$StudLname','$StudFname','$StudMName','$Studsuffix',$StudAge,'$StudSex','$StudBday',$StudGradelvl,$StudTrack,$StudStrand,'New','$email')");
    if ($newquery) {
      $_SESSION['status'] = "Submitted";
      $_SESSION['text'] = "Fill out the next page";
      $_SESSION['status_code'] = "success";
      header("location: ../studcard.php");
    } else {
      $_SESSION['status'] = "Can't Submit";
      $_SESSION['text'] = "Something went wrong";
      $_SESSION['status_code'] = "error";
      header("location: ../newstudent.php");
    }
  }
}
