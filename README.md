# Suretly LenderAPI SDK

PHP7 SDK for Suretly Lender API

## Installing LenderAPI SDK

The recommended way to install LenderAPI SDK is through
[Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Next, run the Composer command to install the latest stable version of LenderAPI SDK:

```bash
php composer.phar require suretly/lender-api-sdk
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

## Use

After installing, you need to create a new `Suretly\LenderApi\LenderManager`. 

Include LenderManager class
```php
use Suretly\LenderApi\LenderManager;
```

You can create SDK from static method:
```php
$sdk = LenderManager::create('id', 'token', 'server'):
```

Or you can create a configuration for your connection and create a LenderManager:
```php
$config = [
    'id' => '<your_id>',
    'token' => '<your_token>',
    'server' => '<server_name>'
];
$sdk = new LenderManager($config);
```

## Calling API methods with SDK

### 1 General methods

#### 1.1 Getting parameters for surety search

```php
$options = $sdk->getOptions();
```

#### #1.2 Orders list

Get orders with parameter `$limit` and optional parameter `$skip`.
The limit parameter must be set in the range from 0 to 25.

```php
$orders = $sdk->getOrders($limit, $skip);
```

### #2 Creating and handling orders

#### #2.2 Create surety order

For a create a new order, you must create a new `Suretly\LenderApi\Model\NewOrder` object.
```php
/** @var Suretly\LenderApi\Model\NewOrder $newOrder */
$newOrder = new NewOrder()

// ...
// set data
// ..
```

After, you can add new order on Suretly server with method `postNewOrder`:
```php
/** @var string $orderID */
$orderID = $sdk->postNewOrder($newOrder)->id;
```

Method `postNewOrder` return object with 2 fields
```php
/** @var object $response */
$response = $sdk->postNewOrder($newOrder);
$orderID = $response->id;
$feeAmount = $response->fee_amount;
```

For example, json data
```json
{
    "id": "string"
}
```

#### #2.3 Get order status

To get the status of the order, run method `getOrderStatus`, which return Suretly\LenderApi\Model\OrderStatus object:
```php
$orderStatus = $sdk->getOrderStatus($orderID);
``` 

For example, json data
```json
{
    "id": "string",
    "public": true,
    "sum": 0,
    "cost": 0,
    "bids_count": 0,
    "stop_time": 0,
    "fee_total": 0,
    "fee_paid": 0,
    "payment_link": "string"
}
```
 
#### #2.4 Get public Order and public Order Url

To get a order, you must call method `getOrder` with parameter `$orderID`:

```php
/** @var \Suretly\LenderApi\Model\Order $order */
$order = $sdk->getOrder($orderID);
``` 

For example, json data for Borrower with russian passport:
```json
{
  "id": "string",
  "uid": "string",
  "status": "string",
  "borrower": {
    "name": {
      "first": "string",
      "middle": "string",
      "last": "string",
      "maiden": "string"
    },
    "gender": "string",
    "birth": {
      "date": "string",
      "place": "string"
    },
    "email": "string",
    "phone": "string",
    "profile_url": "string",
    "photo_url": "string",
    "city": "string",
    "identity_document_type": "passport_rf",
    "identity_document": {
      "series": "string",
      "number": "string",
      "issue_date": "string",
      "issue_place": "string",
      "issue_code": "string",
      "registration": {
        "country": "string",
        "zip": "string",
        "area": "string",
        "city": "string",
        "street": "string",
        "house": "string",
        "building": "string",
        "flat": "string",
        "address_line_1": "string",
        "address_line_2": "string"
      },
      "iin": "string",
      "expire_date": "string",
      "ssn": "string",
      "authority": "string"
    },
    "residential": {
      "country": "string",
      "zip": "string",
      "area": "string",
      "city": "string",
      "street": "string",
      "house": "string",
      "building": "string",
      "flat": "string",
      "address_line_1": "string",
      "address_line_2": "string"
    }
  },
  "user_credit_score": 0,
  "cost": "string",
  "loan_sum": "string",
  "loan_term": "string",
  "loan_rate": 0,
  "currency_code": "string",
  "max_wait_time": "string",
  "created_at": "string",
  "modify_at": "string",
  "closed_at": "string",
  "bids_count": "string",
  "bids_sum": "string",
  "callback": "string"
}
```
 
#### #2.5 Cancel order

For a cancel the order, you must call method `postOrderStop` with parameter `$orderID`:
```php
$sdk->postOrderStop($orderID);
```

#### #2.6 Get borrower contract

To get a contract for a Borrower, you must call method `getContract` with parameter `$orderID`:
```php
/** @var string $contractHTML */
$contractHTML = $sdk->getContract($orderID);
```

Method `getContract` return HTML code:
```php
'<html><head>Contract</head>...</html>'
```
    
#### #2.7 Confirm that contract is signed by borrower

To confirm that contract is signed by borrower:
```php
$sdk->postContractAccept($orderID);
```
    
#### #2.8 Confirm that order is paid and issued

To confirm that order is paid and issued:
```php
$sdk->postOrderIssued($orderID);
```
    
### #2.9 8 Confirm that order is paid

To confirm that order is paid:
```php
$sdk->postOrderPaid($orderID);
```
    
#### #2.10 Confirm that order is partial paid

To confirm that order is partial paid:
```php
$sdk->postOrderPartialPaid($orderID, $sum);
```

#### #2.11 Prolong order

To get fee_amount prolong order, you must run method `getOrderProlong` with parameter `$orderID` and parameter `$days`, which return float value:
```php
/** @var float $feeAmount */
$feeAmount = $sdk->getOrderProlong($orderID, $days);
```

For example, json data
```json
{
  "fee_amount": 0
}
```

To prolong order, you must call method `postOrderUnpaid`
```php
$sdk->postOrderProlong($orderID, $days);
```

#### #2.13 Upload borrower image

To upload a borrower image, you must call method `postUploadImageOrder` with parameter `$orderID`, parameter `$realPathToFile`, which is realpath to file, and optional parameter `$filename`:
```php
$sdk->postUploadImageOrder($orderID, $realPathToFile, $filename);
```

#### #2.14 Mark loan as overdue
Mark loan as overdue:
```php
$sdk->postOrderUnpaid($orderID, $sum);
```

### Dictionaries

#### Currencies
```php
/** @var \Suretly\LenderApi\Model\Currency[] $currencies */
$currencies = $sdk->getCurrencies();
```

For example, json data
```json
[
    {
      "code": "DE",
      "name": "Germany"
    },
    {
      "code": "FR",
      "name": "France"
    },
    {
      "code": "US",
      "name": "United States of America"
    },
    {
      "code": "RU",
      "name": "Russia"
    },
    {
      "code": "KZ",
      "name": "Казахстан"
    }
]
```

#### Countries
```php
/** @var \Suretly\LenderApi\Model\Country[] $countries */
$countries = $sdk->getCountries();
```

For example, json data
```json
[
    {
      "code": "DE",
      "name": "Germany",
      "currency_code": "EUR"
    },
    {
      "code": "FR",
      "name": "France",
      "currency_code": "EUR"
    },
    {
      "code": "US",
      "name": "United States of America",
      "currency_code": "USD"
    },
    {
      "code": "SWE",
      "name": "Sweden",
      "currency_code": "BTC"
    },
    {
      "code": "RU",
      "name": "Russia",
      "currency_code": "RUB"
    },
    {
      "code": "KZ",
      "name": "Казахстан",
      "currency_code": "KZT"
    }
]
```

### # Work with errors

All SDK methods should use try/catch. For example:
```php
try {
    $sdk->postOrderUnpaid($orderID, $sum);
} catch (\Exception $exception) {
    echo $exception->getMessage();
}
```

All SDK methods call ResponseErrorException when an error occurs on the server.
You can see all errors in class - `SuretlySDK\Type\ResponseErrorStatusType`.

```php
try {
    $sdk->postOrderUnpaid($orderID, $sum);
} catch (\SuretlySDK\Type\ResponseErrorStatusType $exception) {
    echo $exception->getCode() . ': ' . $exception->getMessage();
}
```

## Migration 

### version v0.3,  v0.4 to v1.0
Now, you should use LenderManager instead Suretly.

```php
use Suretly\LenderApi\LenderManager;

// create sdk
$sdk = LenderManager::create('id', 'token');
```

Also, all field on Model is private and you should use getters and setters.

```php
// create sdk
/** @var Order $order */
$orderId = $order->getId();
```

That's all.

## Development

For run examples test in root project directory run commands

```php
cd examples
php example.php
```

For run unit tests in root project directory run command in console

```php
/vendor/bin/phpunit
```

For Windows
```php
/vendor/bin/phpunit.bat
```

