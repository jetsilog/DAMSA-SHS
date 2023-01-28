<?php
include("includes/config.php");
include("includes/lock.php");

function Redirect($url, $permanent = false)
{
  if (headers_sent() === false) {
    header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
  }

  exit();
}

$curl = curl_init();
header('Content-Type: application/json');
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://g.payx.ph/payment_request',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array(
    'x-public-key' => 'pk_bacbbd44ef0a2ce42a9a8d8dbb06ce34',
    'amount' => '1',
    'description' => "Miscellaneous fee of $accountname ($username)",
    "webhooksuccessurl" => "https://b4fb-49-150-147-243.ap.ngrok.io/damsashs/webhook.php",


  ),
));

$response = curl_exec($curl);

curl_close($curl);
$json = json_decode($response, true);
echo $response;
// $request_id = $json['data']['request_id'];
// $check_url = $json['data']['checkouturl'];

// mysqli_query($conn, "INSERT INTO bill_reference(request_lrn , request_id) VALUES ('$username','$request_id')");

// Redirect($check_url, false);
