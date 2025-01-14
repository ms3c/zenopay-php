<?php
require_once 'vendor/autoload.php';

$client = new ms3c\Lib\Zenopay();

$orderData = [
    'buyer_email' => 'james@gmail.com',
    'buyer_name' => 'JamesHamisi',
    'buyer_phone' => '0693338637',
    'amount' => 10000,
];


$paymnets = $client->makePayment($orderData);
echo $paymnets;
$order = json_decode($paymnets->getContents(), true);

//$status = $client->checkStatus($order['order_id']);

//echo $status;
?>