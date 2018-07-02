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

After installing, you need to create a new LenderManager. 

```php
use Suretly\LenderApi\LenderManager;

// Configuring your connection
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

```php
$orders = $sdk->getOrders($limit, $skip);
```

### #2 Creating and handling orders

#### #2.2 Create surety order

```php
$newOrder = $sdk->mapToObject($orderJson, new NewOrder());
$orderID = $sdk->postNewOrder($newOrder)->id;
```
    
#### #2.3 Get order status

```php
$orderStatus = $sdk->getOrderStatus($orderID);
```
    
#### #2.4 Cancel order

```php
$sdk->postOrderStop($orderID);
```
    
#### #2.9 Get borrower contract

```php
$contractHTML = $sdk->getContract($orderID);
```
    
#### #2.10 Confirm that contract is signed by borrower

```php
$sdk->postContractAccept($orderID);
```
    
#### #2.11 Confirm that order is paid and issued

```php
$sdk->postOrderIssued($orderID);
```
    
### #3 Working with order payment

#### #3.5 Mark loan as paid

```php
$sdk->postOrderPaid($orderID);
```
    
#### #3.6 Mark loan as partially paid

```php
$sdk->postOrderPartialPaid($orderID, $sum);
```

#### #3.7 Mark loan as overdue

```php
$sdk->postOrderUnpaid($orderID, $sum);
```

### Dictionaries

#### Currencies

```php
$currencies = $sdk->getCurrencies();
```
    
#### Countries

```php
$countries = $sdk->getCountries();
```
    

