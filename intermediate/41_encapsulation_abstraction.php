<?php

use App\PaymentGateway\Paddle\Transaction41;

require_once '../basic/0_overview.php';
require_once __DIR__ . '/vendor/autoload.php';

// OOP related : Encapsulation & Abstraction
$transaction = new Transaction41(25);
echo 'This is two OOP related topic : Encapsulation & Abstraction <br>';
echo 'Đóng gói và trừu tượng <br>';
echo 'Don\'t need to know what inside that block. Remove it, the program can still work properly <br>';
two_br();

echo 'Encapsulation: No public properties, no func or code can modify what value is stored in class <br>';
echo 'but something called Getter and Setter, the best practice is use the get not the set. <br>';
print_pre('
$transaction->getAmount();
');
echo $transaction->getAmount() . '<br>';
echo 'No function is public except the facade one ( main func )<br>';
two_br();

echo 'There is a way to get change to private variables. <br>';
$reflectionProperty = new ReflectionProperty(Transaction41::class, 'amount');
$reflectionProperty->setAccessible(true);
echo ' Value of private $amount is : ';
print_pre('
var_dump($reflectionProperty->getValue());
');
var_dump($reflectionProperty->getValue($transaction));
echo '<br>';
echo 'Changing value of private $amount from 25 to 125: ';
print_pre('
$reflectionProperty->setValue(125);
');
$reflectionProperty->setValue($transaction,125);
var_dump($reflectionProperty->getValue($transaction));
two_br();

echo 'So ask yourself question: Is class or function you made can change to them without breaking many thing outside ?';
two_br();

echo 'However when u use class instance, u can access its private <br>';
print_pre('
    public function copyFrom(Transaction41 $transaction41)
    {
        var_dump($transaction41->amount, $transaction41->sendEmail());
    }
$transaction = new Transaction41(25);
$transaction->copyFrom(new Transaction41(100));
');
$transaction->copyFrom(new Transaction41(100));
