<?php
namespace ms3c\Lib;
use GuzzleHttp\Client;
use Helpers\Validator;
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(dirname(__DIR__, 4));
$dotenv->safeLoad();

class Zenopay {
    
    private $api_key;
    private $secret_key;
    private $account_id;
    private $client;
   
    public function __construct($api_key = null, $secret_key = null, $account_id = null, $client = null){ 
        
        $this->api_key = $api_key ?? $_ENV['ZENO_PAY_API_KEY'];
        $this->secret_key = $secret_key ?? $_ENV['ZENO_PAY_API_SECRET'];
        $this->account_id = $account_id ?? $_ENV['ZENO_PAY_ACCOUNT_ID'];
        $this->client = new Client(['base_uri' => 'https://api.zeno.africa']);
      
    }

    function makePayment($orderData){

        $validator = new Validator();

        $validator->sanitizeEmail($orderData['buyer_email']);
        $validator->validateEmail($orderData['buyer_email']);

        $response = $this->client->request('POST', '', [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded'
            ],
            'form_params' => [
                'create_order' => 1,
                'buyer_email' => $orderData['buyer_email'],
                'buyer_name' => $validator->validateName($orderData['buyer_name']),
                'buyer_phone' => $validator->validatePhone($orderData['buyer_phone']),
                'amount' => $validator->sanitizeAmount($orderData['amount']),
                'account_id' => $this->account_id,
                'api_key' => $this->api_key,
                'webhook_url' => $_ENV['ZENO_PAY_WEBHOOK'],
                'secret_key' => $this->secret_key
            ]
        ]);
        
        return $response->getBody();

    }

    function checkStatus($order_id){

        $response = $this->client->request('POST', '/order-status', [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded'
            ],
            'form_params' => [
                'check_status' => 1,
                'order_id' => $order_id,
                'api_key' => $this->api_key,
                'secret_key' => $this->secret_key
            ]
        ]);

        return $response->getBody();
    }
}

?>