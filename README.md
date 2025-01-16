
# Zeno Pay Library for PHP

This is zeno pay php libray, allowing easy intergration of zeno pay in php projects.

## Installation

Install zeno pay library using composer.

```bash
  cd myphp-project
  composer require ms3c/zenopay
```
    
## Environment Variables

To use this library, you will need to add the following environment variables to your .env file, see in example folder.

`ZENO_PAY_WEBHOOK`

`ZENO_PAY_API_KEY`

`ZENO_PAY_API_SECRET`

`ZENO_PAY_ACCOUNT_ID`


## Usage
Code example on how to use the library.
```php
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

```


## Documentation

[Documentation](https://zenopay.gitbook.io/zenopay/basics/create-order-check-status-and-webhook/php)


## Contributing

Contributions are always welcome!

See `contributing.md` for ways to get started.

Please adhere to this project's `code of conduct`.


## License

[GNU GPL v3 or later](https://github.com/ms3c/zenopay-php/blob/main/LICENSE)

## Related Projects

- [Zeno Pay Golang Package](https://github.com/dilungasr/zeno)
- [Zeno Pay Python Package](https://github.com/jovyinny/zenopay)
