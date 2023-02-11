<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include("../includes/config.php");
include("../includes/lock.php");
if (isset($_POST['submit'])) {
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
    date_default_timezone_set('Asia/Singapore');
    $datentime = date("Y-m-d h:i:sa");


    function randomPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 4; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    $randpassgenerated = randomPassword();
    $mypass = md5($randpassgenerated);
    $passcode = $randpassgenerated;





    if (empty($_FILES['files']['tmp_name'])) {
        $query = mysqli_query($conn, "INSERT INTO students (StudentID, LastName, FirstName, MiddleName, Suffix, Age, Sex, Birthday, Address, ContactNum, Guardian, GuardianContact, GradeLevel, TrackID, StrandID, Standing,email,archive_status) VALUES ('$StudentNum','$LastName','$FirstName','$MiddleName','$suffix',$Age,'$Sex','$Bday','$Address','$ContactNum','$Guardian','$Gcnum',$Gradelvl,$Track,$Strand,'Existing','$email','safe')");
        $accname = $FirstName . ' ' . $LastName;
        $query2 = mysqli_query($conn, "INSERT INTO accounts (Username, Password, Name, AccountType, fb_link_status,google_status) VALUES ('$StudentNum', '$mypass', '$accname', 'Student','0','0')");
        if ($query && $query2) {
            $_SESSION['status'] = "New Student Added";
            $_SESSION['text'] = "Your account will be sent to your email";
            $_SESSION['status_code'] = "success";
            header("location: ../studentprof.php");
            $query = mysqli_query($conn, "INSERT INTO activitylog (AccountName, DateTime, Activity) VALUES ('$accountname', '  $datentime', 'Added a Student')");
            require_once "../PHPMailer/PHPMAiler.php";
            require_once "../PHPMailer/SMTP.php";
            require_once "../PHPMailer/Exception.php";


            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Username = 'jetchow22@gmail.com';
            $mail->Password = 'gudsuxxvuseugcbc';
            $mail->isHTML(true); //para gumana ang HTML
            $mail->setFrom('jetchow22@gmail.com'); //taga  send ng email
            $mail->addAddress($email); //receiver
            $mail->Subject = "DAMSASHS Account";
            $mail->Body = '<div><p>Good day Maam/Sir ' . $FirstName . ' ' .  $LastName . ',' . ' </p><p>Here is your Account:</p><p>Username: <b>' . $StudentNum . '</b></p> <p>Password: <b>' .  $passcode . '</></p></div>';

            $mail->send();
        } else {
            $_SESSION['status'] = "Student not added";
            $_SESSION['text'] = "Something went wrong";
            $_SESSION['status_code'] = "error";
            header("location: ../studentprof.php");
        }
    } else {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        if (strpos(finfo_file($finfo, $_FILES['files']['tmp_name']), "image") === 0) {
            $imgData = addslashes(file_get_contents($_FILES['files']['tmp_name']));

            $query = mysqli_query($conn, "INSERT INTO students (StudentID, LastName, FirstName, MiddleName, Suffix, Age, Sex, Birthday, Address, ContactNum, Guardian, GuardianContact, GradeLevel, TrackID, StrandID, Image,Standing,email,archive_status) VALUES ('$StudentNum','$LastName','$FirstName','$MiddleName','$suffix',$Age,'$Sex','$Bday','$Address','$ContactNum','$Guardian','$Gcnum',$Gradelvl,$Track,$Strand, '{$imgData}','Existing','$email','safe')");
            $accname = $FirstName . ' ' . $LastName;
            $query2 = mysqli_query($conn, "INSERT INTO accounts (Username, Password, Name, AccountType,fb_link_status,google_status) VALUES ('$StudentNum', '$mypass', '$accname', 'Student','0','0')");
            if ($query && $query2) {
                $_SESSION['status'] = "New Student Added";
                $_SESSION['text'] = "Your account will be sent to your email";
                $_SESSION['status_code'] = "success";
                header("location: ../studentprof.php");
                $query = mysqli_query($conn, "INSERT INTO activitylog (AccountName, DateTime, Activity) VALUES ('$accountname', '  $datentime', 'Added a Student')");
                require_once "../PHPMailer/PHPMAiler.php";
                require_once "../PHPMailer/SMTP.php";
                require_once "../PHPMailer/Exception.php";


                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'tls';
                $mail->Username = 'jetchow22@gmail.com';
                $mail->Password = 'gudsuxxvuseugcbc';
                $mail->isHTML(true); //para gumana ang HTML
                $mail->setFrom('jetchow22@gmail.com'); //taga  send ng email
                $mail->addAddress($email); //receiver
                $mail->Subject = "DAMSASHS Account";
                $mail->Body = '<div><p>Good day Maam/Sir ' . $FirstName . ' ' .  $LastName . ',' . ' </p><p>Here is your Account:</p><p>Username: <b>' . $StudentNum . '</b></p> <p>Password: <b>' .  $passcode . '</></p></div>';

                $mail->send();
            } else {
                $_SESSION['status'] = "Student not added";
                $_SESSION['text'] = "Something went wrong";
                $_SESSION['status_code'] = "error";
                header("location: ../studentprof.php");
            }
        }
    }
}
