<?php
include_once('fb-config-login.php');
include('includes/config.php');


try {
  $accessToken = $helper->getAccessToken();
} catch (Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (!isset($accessToken)) {
  if ($helper->getError()) {
    header('location:login.php');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else {
    header('Location: login.php');
    echo 'Bad request';
  }
  exit;
}

if (!$accessToken->isLongLived()) {
  // Exchanges a short-lived access token for a long-lived one
  try {
    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
  } catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
    exit;
  }
}

//$fb->setDefaultAccessToken($accessToken);

# These will fall back to the default access token
$res   =   $fb->get('/me', $accessToken->getValue());
$fbUser  =  $res->getDecodedBody();


$resImg    =  $fb->get('/me/picture?type=large&amp;amp;redirect=false', $accessToken->getValue());
$picture  =  $resImg->getGraphObject();


$_SESSION['fbUserId']    =  $fbUser['id'];
$_SESSION['fbUserName']    =  $fbUser['name'];
$_SESSION['fbAccessToken']  =  $accessToken->getValue();
$fbid = $fbUser['id'];

$loginquery = mysqli_query($conn, "SELECT * FROM accounts WHERE fb_user_id = '$fbid' AND fb_link_status='1'");
$logincount = mysqli_num_rows($loginquery);
$loginrow = mysqli_fetch_array($loginquery);
if ($logincount == 1) {
  $accounttype = $loginrow['AccountType'];
  $_SESSION['username'] =  $loginrow['Username'];
  if ($accounttype == 'Student') {
    header('location:stud_checklist.php');
  } else if ($accounttype == 'Faculty') {
    header('location:teacherclass.php');
  } else {
    header('location:dashboard.php');
  }
} else {
  $_SESSION['status'] = "No account found!";
  $_SESSION['text'] = "Ooops";
  $_SESSION['status_code'] = "error";
  header('location:login.php');
}
// here goes the mdfking login
// 
// $fbidins = mysqli_query($conn, "UPDATE accounts SET fb_user_id='$fbid',fb_link_status='1' WHERE Username='$username'");
// header('Location: adminprof.php');
exit;
