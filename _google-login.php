<!-- 
    Client Id = 1040316209573-sn9a3td3oiksoari3p1at946226g6db5.apps.googleusercontent.com
    Client Secret Key = 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 
-->
<?php
//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('1040316209573-sn9a3td3oiksoari3p1at946226g6db5.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('https://localhost/damsashs/google_callback_login.php');

$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
$login_button = '';

if (isset($_GET["code"])) {
  //It will Attempt to exchange a code for an valid authentication token.
  $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

  //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
  if (!isset($token['error'])) {

    //Set the access token used for requests
    $google_client->setAccessToken($token['access_token']);
    //Store "access_token" value in $_SESSION variable for future use.
    $_SESSION['access_token'] = $token['access_token'];
    //Create Object of Google Service OAuth 2 class
    $google_service = new Google\Service\Oauth2($google_client);
    //Get user profile data from google
    $data = $google_service->userinfo->get();
    // Below you can find Get profile data and store into $_SESSION variable
    if (!empty($data['id'] && !empty($data['email']))) {

      $google_id_authentication = $data['id'];
      $_SESSION['google_id_auth'] = $google_id_authentication;
      // echo $_SESSION['google_email_au'] = $data['email'];
    } else {
      session_destroy();
    }
  }
}


?>