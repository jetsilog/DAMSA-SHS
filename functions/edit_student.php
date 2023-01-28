<?php
session_start();
include("../includes/config.php");
include("../includes/lock.php");
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $StudentNum = $_POST['IDnum'];
    $LastName = $_POST['Lname'];
    $FirstName = $_POST['Fname'];
    $MiddleName = $_POST['Mname'];
    $suffix = $_POST['Suffix'];
    $Age = $_POST['Age'];
    $Sex = $_POST['Sex'];
    $Bday = $_POST['Bday'];
    $Address = $_POST['Address'];
    $ContactNum = $_POST['Cnum'];
    $Guardian = $_POST['Guardian'];
    $Gcnum = $_POST['GCnum'];
    $Gradelvl = $_POST['Glevel'];
    $Track = $_POST['Track'];
    $Strand = $_POST['Strand'];
    $email = $_POST['email'];
    $accname = $FirstName . ' ' . $LastName;
    date_default_timezone_set('Asia/Singapore');
    $datentime = date("Y-m-d h:i:sa");



    if (empty($_FILES['files']['tmp_name'])) {
        $query = mysqli_query($conn, "UPDATE students SET StudentID='$StudentNum', LastName='$LastName', FirstName='$FirstName', MiddleName='$MiddleName', Suffix='$suffix', Age=$Age, Sex='$Sex', Birthday='$Bday', Address='$Address', ContactNum='$ContactNum', Guardian='$Guardian', GuardianContact='$Gcnum', GradeLevel=$Gradelvl, TrackID=$Track, StrandID=$Strand, email='$email' WHERE ID='$id'");

        if ($query) {
            $_SESSION['status'] = "Updated Successfuy";
            $_SESSION['text'] = "Check details";
            $_SESSION['status_code'] = "success";
            header("location: ../studentprof.php");
            $query = mysqli_query($conn, "INSERT INTO activitylog (AccountName, DateTime, Activity) VALUES ('$accountname', '  $datentime', 'Edited a Student')");
        } else {
            $_SESSION['status'] = "Cannot update";
            $_SESSION['text'] = "Something went wrong";
            $_SESSION['status_code'] = "error";
            header("location: ../studentprof.php");
        }
    } else {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        if (strpos(finfo_file($finfo, $_FILES['files']['tmp_name']), "image") === 0) {
            $imgData = addslashes(file_get_contents($_FILES['files']['tmp_name']));


            $query = mysqli_query($conn, "UPDATE students SET StudentID='$StudentNum', LastName='$LastName', FirstName='$FirstName', MiddleName='$MiddleName', Suffix='$suffix', Age=$Age, Sex='$Sex', Birthday='$Bday', Address='$Address', ContactNum='$ContactNum', Guardian='$Guardian', GuardianContact='$Gcnum', GradeLevel=$Gradelvl, TrackID=$Track, StrandID=$Strand, email='$email', Image='{$imgData}' WHERE ID='$id'");


            if ($query) {
                $_SESSION['status'] = "Updated Successfuy";
                $_SESSION['text'] = "Check details";
                $_SESSION['status_code'] = "success";
                header("location: ../studentprof.php");
                $query = mysqli_query($conn, "INSERT INTO activitylog (AccountName, DateTime, Activity) VALUES ('$accountname', '  $datentime', 'Edited a Student')");
            } else {
                $_SESSION['status'] = "Cannot update";
                $_SESSION['text'] = "Something went wrong";
                $_SESSION['status_code'] = "error";
                header("location: ../studentprof.php");
            }
        }
    }
}
