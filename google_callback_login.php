<?php
session_start();
include('includes/config.php');
include_once('_google-login.php');
$G_ID = $_SESSION['google_id_auth'];
// $G_EM = $_SESSION['google_email_au'];
// if rows count >= 1 , email has been linked with another account.
$google_login_query = mysqli_query($conn, "SELECT * FROM accounts WHERE google_id='$G_ID' AND google_status='1'");
$count_google = mysqli_num_rows($google_login_query);
$login_row = mysqli_fetch_array($google_login_query);
// else proceed linking.
if ($count_google == 1) {
  $act_type = $login_row['AccountType'];
  $_SESSION['username'] = $login_row['Username'];
  if ($act_type == 'Student') {
    header('location:stud_checklist.php');
  } elseif ($act_type == 'Faculty') {
    header('location:teacherclass.php');
  } else {
    header('location:dashboard.php');
  }
} else {
  $_SESSION['status'] = "No account found!";
  $_SESSION['text'] = "Check your details";
  $_SESSION['status_code'] = "error";
  header('location:login.php');
  unset($_SESSION['access_token']);
}
