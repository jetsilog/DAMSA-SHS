<!-- <a data-amount="100" data-fee="0" data-expiry="6" data-description="Payment for services rendered" data-href="https://getpaid.gcash.com/paynow" data-public-key="pk_bacbbd44ef0a2ce42a9a8d8dbb06ce34" onclick="this.href = this.getAttribute('data-href')+'?public_key='+this.getAttribute('data-public-key')+'&amp;amount='+this.getAttribute('data-amount')+'&amp;fee='+this.getAttribute('data-fee')+'&amp;expiry='+this.getAttribute('data-expiry')+'&amp;description='+this.getAttribute('data-description');" href="https://getpaid.gcash.com/paynow?public_key=pk_bacbbd44ef0a2ce42a9a8d8dbb06ce34&amp;amount=100&amp;fee=0&amp;expiry=6&amp;description=Payment for services rendered" target="_blank" class="x-getpaid-button"><img src="https://getpaid.gcash.com/assets/img/paynow.png"></a> -->
<?php
include("includes/lock.php");
$curl = curl_init();

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
    'amount' => "1",
    'description' => "Miselanyos fee of $accountname - ($username)",
    'webhooksuccessurl' => "https://3eaf-2001-fd8-603-b1c4-5c51-9a4d-4d0a-3d09.ap.ngrok.io/damsashs/success_payment.php",
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
