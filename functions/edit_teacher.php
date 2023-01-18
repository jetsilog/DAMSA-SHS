<?php
session_start();
include("../includes/config.php");
include("../includes/lock.php");
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $FacultyID = $_POST['FacultyID'];
    $Lastname = $_POST['Lname'];
    $Firstname = $_POST['Fname'];
    $Middlename = $_POST['Mname'];
    $contact = $_POST['Contact'];
    $address = $_POST['Address'];
    $suffix = $_POST['Suffix'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    date_default_timezone_set('Asia/Singapore');
    $datentime = date("Y-m-d h:i:sa");


    if (empty($_FILES['files']['tmp_name'])) {
        $query = mysqli_query($conn, "UPDATE faculty SET FacultyID='$FacultyID', LastName='$Lastname', FirstName='$Firstname', MiddleName='$Middlename', Contact='$contact', Address='$address', F_Suffix='$suffix', Position='$position', Email='$email' WHERE ID='$id'");

        if ($query) {
            $_SESSION['status'] = "Updated Successfuly";
            $_SESSION['text'] = "Check details";
            $_SESSION['status_code'] = "success";
            header("location: ../teacher.php");
            $query = mysqli_query($conn, "INSERT INTO activitylog (AccountName, DateTime, Activity) VALUES ('$accountname', '  $datentime', 'Edited a faculty')");
        } else {
            $_SESSION['status'] = "Cannot update";
            $_SESSION['text'] = "Something went wrong";
            $_SESSION['status_code'] = "error";
            header("location: ../teacher.php");
        }
    } else {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        if (strpos(finfo_file($finfo, $_FILES['files']['tmp_name']), "image") === 0) {
            $imgData = addslashes(file_get_contents($_FILES['files']['tmp_name']));
            $query = mysqli_query($conn, "UPDATE faculty SET FacultyID='$FacultyID', LastName='$Lastname', FirstName='$Firstname', MiddleName='$Middlename', Contact='$contact', Address='$address', F_Suffix='$suffix',Position='$position', Email='$email', Image='{$imgData}' WHERE ID='$id'");

            if ($query) {
                $_SESSION['status'] = "Updated Successfuly";
                $_SESSION['text'] = "Check details";
                $_SESSION['status_code'] = "success";
                header("location: ../teacher.php");
                $query = mysqli_query($conn, "INSERT INTO activitylog (AccountName, DateTime, Activity) VALUES ('$accountname', '  $datentime', 'Edited a faculty')");
            } else {
                $_SESSION['status'] = "Cannot update";
                $_SESSION['text'] = "Something went wrong";
                $_SESSION['status_code'] = "error";
                header("location: ../teacher.php");
            }
        }
    }
}
