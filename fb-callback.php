<?php
include_once('fb-config.php');
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
    header('Location: adminprof.php');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else {
    header('Location: adminprof.php');
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
$facebookidcount = mysqli_query($conn, "SELECT * FROM accounts WHERE fb_user_id='$fbid'");
$facebookcount = mysqli_num_rows($facebookidcount);
if ($facebookcount > 0) {
  $_SESSION['status'] = "Facebook account already linked!";
  $_SESSION['text'] = "Somthing went wrong";
  $_SESSION['status_code'] = "error";
  header('Location: adminprof.php');
} else {
  $fbidins = mysqli_query($conn, "UPDATE accounts SET fb_user_id='$fbid',fb_link_status='1' WHERE Username='$username'");
  $_SESSION['status'] = "Linked Successful!";
  $_SESSION['text'] = "You linked your account";
  $_SESSION['status_code'] = "success";
  header('Location: adminprof.php');
  exit;
}
