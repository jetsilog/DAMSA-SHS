<?php
include("includes/config.php");
header('Content-Type: application/json');
$request = file_get_contents('php://input');
$req_dump = print_r($request, true);
$data = array();
parse_str($req_dump, $data);
var_dump($data);
extract($data);

$wh_query = mysqli_query($conn, "UPDATE bill_reference SET ref_id='$reference',costumer_name='$customername',wh_timestamp='$timestamp',request_id_from='$request_id' WHERE request_id='$request_id'");
