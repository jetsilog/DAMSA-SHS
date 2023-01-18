<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
include("../includes/config.php");
include("../includes/lock.php");
if (isset($_POST['submit'])) {
    $FacultyID = $_POST['FacultyID'];
    $Lastname = $_POST['Lname'];
    $Firstname = $_POST['Fname'];
    $Middlename = $_POST['Mname'];
    $Contact = $_POST['Contact'];
    $Address = $_POST['Address'];
    $position = $_POST['position'];
    $suffix = $_POST['Suffix'];
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

    $encryptedpass = md5($randpassgenerated);
    $formail = $randpassgenerated;

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    if (strpos(finfo_file($finfo, $_FILES['files']['tmp_name']), "image") === 0) {
        $imgData = addslashes(file_get_contents($_FILES['files']['tmp_name']));


        $query = mysqli_query($conn, "INSERT INTO faculty (FacultyID, LastName, FirstName, MiddleName, F_Suffix,Position, Contact, Address, Image, Email) VALUES ('$FacultyID', '$Lastname', '$Firstname', '$Middlename', '$suffix','$position', '$Contact','$Address', '{$imgData}', '$email')");
        $fullname = $Firstname . ' ' . $Lastname;
        $query2 = mysqli_query($conn, "INSERT INTO accounts (Username, Password, Name, AccountType,fb_link_status,google_status) VALUES ('$FacultyID', '$encryptedpass', '$fullname', 'Faculty','0','0')");
        if ($query && $query2) {
            $_SESSION['status'] = "Added Teacher";
            $_SESSION['text'] = "Your account will be sent to your email";
            $_SESSION['status_code'] = "success";
            header("location: ../teacher.php");
            $query = mysqli_query($conn, "INSERT INTO activitylog (AccountName, DateTime, Activity) VALUES ('$accountname', '  $datentime', 'Added a Faculty')");

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
            $mail->Body = '<div><p>Good day Maam/Sir ' . $Firstname . ' ' .  $Lastname . ',' . ' </p><p>Here is your Account:</p><p>Username: <b>' . $FacultyID . '</b></p> <p>Password: <b>' .  $formail . '</></p></div>';

            $mail->send();
        } else {
            $_SESSION['status'] = "Cannot add teacher";
            $_SESSION['text'] = "Something went wrong";
            $_SESSION['status_code'] = "error";
            header("location: ../teacher.php");
        }
    } else {
        $query = mysqli_query($conn, "INSERT INTO faculty (FacultyID, LastName, FirstName, MiddleName, F_Suffix,Position, Contact, Address, Email) VALUES ('$FacultyID', '$Lastname', '$Firstname', '$Middlename', '$suffix','$position', '$Contact','$Address','$email')");
        $fullname = $Firstname . ' ' . $Lastname;
        $query2 = mysqli_query($conn, "INSERT INTO accounts (Username, Password, Name, AccountType,fb_link_status,google_status) VALUES ('$FacultyID', '$encryptedpass', '$fullname', 'Faculty','0','0')");
        if ($query && $query2) {
            $_SESSION['status'] = "Added Teacher";
            $_SESSION['text'] = "Your account will be sent to your email";
            $_SESSION['status_code'] = "success";
            header("location: ../teacher.php");
            $query = mysqli_query($conn, "INSERT INTO activitylog (AccountName, DateTime, Activity) VALUES ('$accountname', '  $datentime', 'Added a Faculty')");

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
            $mail->Body = '<div><p>Good day Maam/Sir ' . $Firstname . ' ' .  $Lastname . ',' . ' </p><p>Here is your Account:</p><p>Username: <b>' . $FacultyID . '</b></p> <p>Password: <b>' .  $formail . '</></p></div>';

            $mail->send();
        } else {
            $_SESSION['status'] = "Cannot add teacher";
            $_SESSION['text'] = "Something went wrong";
            $_SESSION['status_code'] = "error";
            header("location: ../teacher.php");
        }
    }
}
