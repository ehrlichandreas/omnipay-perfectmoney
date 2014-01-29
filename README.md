Perfect Money Omnipay gateway
==============


#### Installation

To install, simply add it to your composer.json file:

```json
{
    "require":
    {
        "ehrlichandreas/omnipay-perfectmoney":  "dev-master"
    }
}
```

and run `composer update`

#### Usage

```php

// include the composer autoloader
$autoloader = require __DIR__.'/vendor/autoload.php';

$parameters = array
(
    'username'  => 'your_account_id',
    'password'  => 'password',
);

$gateway = new \EhrlichAndreas\Omnipay\Perfectmoney\Gateway();

$gateway->initialize($parameters);

$response = $gateway->balance(array())->send();

$isSuccessful = $response->isSuccessful();

if ($isSuccessful)
{
    $balances = $response->getBalance();

    echo '<pre>';

    print_r($balances);
}

```
