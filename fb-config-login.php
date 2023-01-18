<?php
session_start();
include_once('php-graph-sdk-5.x/src/Facebook/autoload.php');
$fb = new Facebook\Facebook(array(
  'app_id' => '660497584597126', // Replace with your app id
  'app_secret' => 'cbc7f63531243f2336a6c5cc902d03de',  // Replace with your app secret
  'default_graph_version' => 'v3.2',
));

$helper = $fb->getRedirectLoginHelper();
