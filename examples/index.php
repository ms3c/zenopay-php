<?php
require_once 'vendor/autoload.php';

$client = new ms3c\Lib\Zenopay();

$orderData = [
    'buyer_email' => 'john.doe@gmail.com',
    'buyer_name' => 'John Doe',
    'buyer_phone' => '0755100000',
    'amount' => 10000,
];

$paymnets = $client->makePayment($orderData);
echo $paymnets;
$order = json_decode($paymnets->getContents(), true);

//$status = $client->checkStatus($order['order_id']);

//echo $status;

//Uncomment the above code to check the status of the order
?>