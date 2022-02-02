<?php

declare(strict_types=1);
require_once '../basic/0_overview.php';
echo 'Manual autoload from PHP <br>';

echo 'We have a problem';
print_pre('
require_once \'./PaymentGateway/Paddle/Transaction.php\';
require_once \'./PaymentGateway/Paddle/CustomerProfile.php\';
require_once \'./PaymentGateway/Paddle/DateTime.php\';
require_once \'./PaymentGateway/Stripe/Transaction.php\';
require_once \'./PaymentGateway/Notification/Email.php\';

// The more classes we need, the more require_once commands are written
');

echo 'So PHP introduced a way call Autoloading <br>';
print_pre('
spl_autoload_register(function($class){
    $path =  __DIR__. \'./\'. lcfirst(str_replace(\'\\\',\'/\',$class)) .\'.php\';
    require $path;
}); 
');

// spl_autoload_register(function($class){
//     // $class = Transaction, CustomerProfile, DateTime,..
//     // Something like you open the dir and load the file

//     // Now the mission is to conduct the path from the namespace in $class
//     // Ex : 'App\PaymentGateway\Paddle\Transaction' -> './app/PaymentGateway/Paddle/Transaction.php';

//     // var_dump($class); // App\PaymentGateway\Paddle\Transaction
//     $path =  __DIR__. './'. lcfirst(str_replace('\\','/',$class)) .'.php';
//     require $path;
// }); 

// spl_autoload_register(function($class){
//     var_dump('Autoloader 2');
// }, prepend: true); # prepend : do it first 
// use App\PaymentGateway\Paddle\Transaction;

// $paddleTransaction = new Transaction();

// var_dump($paddleTransaction);
// echo '<br>';
// echo '<br>';


echo 'Autoload from PHP composer <br> Do command \' composer require ramsey/uuid \'<br>';
echo 'First we have to require autoload from composer <br>';
print_pre('
require_once __DIR__ . \'/vendor/autoload.php\';
');
require_once __DIR__ . '/vendor/autoload.php';
echo 'Now we test with vendor class - Worked <br>';
print_pre('
$id = new \Ramsey\Uuid\UuidFactory();
echo $id->uuid4();
');
$id = new \Ramsey\Uuid\UuidFactory();
echo $id->uuid4(); 

echo 'But in app folder not working with autoload, it worked with class inside composer folder,  cause we haven\'t configured in composer.json yet <br>';
print_pre('
// Before 
{
    "require": {
        "ramsey/uuid": "^4.2"
    }
}

// After #Declare new location to autoload 
{
    "require": {
        "ramsey/uuid": "^4.2"
    },
    "autoload":{
        "psr-4": {
            "App\\": "app/" 
        }
    }
}
// And do command "composer dump-autoload" or "composer dump-autoload -o" to see in classmap  
// To check, open the file vendor/composer/autoload_psr4.php, -o in also autoload_classmap.php
');
use App\PaymentGateway\Paddle\Transaction;

$paddleTransaction = new Transaction();

var_dump($paddleTransaction);
echo '<br>';
echo '<br>';


