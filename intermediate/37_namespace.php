<?php 
declare(strict_types = 1);


require_once '../basic/0_overview.php';

echo 'Namespace is the thing you want to distinct two same class but in different dir <br>';
echo 'We have a problem here :<br>';
print_pre('
require_once \'./PaymentGateway/Paddle/Transaction.php\';
require_once \'./PaymentGateway/Stripe/Transaction.php\';
// In each Transaction.php we have empty class called Transaction
// So without namespace, declare class Transaction is causing error.
$transaction = new Transaction() # error : name in use 
');

echo 'But with namespace declaring, we can solve this problem <br>';
require_once './PaymentGateway/Paddle/Transaction.php';
require_once './PaymentGateway/Paddle/CustomerProfile.php';
require_once './PaymentGateway/Paddle/DateTime.php';
require_once './PaymentGateway/Stripe/Transaction.php';
require_once './PaymentGateway/Notification/Email.php';
print_pre('
var_dump(new \PaymentGateway\Paddle\Transaction()); 
var_dump(new \PaymentGateway\Stripe\Transaction());
');
var_dump(new \PaymentGateway\Paddle\Transaction()); 
echo '<br>';
echo '<br>';
var_dump(new \PaymentGateway\Stripe\Transaction()); 
echo '<br>';
echo '<br>';

echo 'With \'use\' to create alias for long namespace <br>';
use PaymentGateway\Paddle\Transaction as PaddleTransaction;
use PaymentGateway\Stripe\Transaction as StripeTransaction;

print_pre('
use PaymentGateway\Paddle\Transaction as PaddleTransaction;
use PaymentGateway\Stripe\Transaction as StripeTransaction;
var_dump(new PaddleTransaction()); 
var_dump(new StripeTransaction());
');
var_dump(new PaddleTransaction()); 
echo '<br>';
echo '<br>';
var_dump(new StripeTransaction());
echo '<br>';
echo '<br>';

echo 'With multi class has same namespace, can group it like this <br>';
print_pre('
use PaymentGateway\Paddle\{Transaction, CustomerProfile};
// or 
use PaymentGateway\Paddle\ as PA;
var_dump(new PA\Transaction());
var_dump(new PA\CustomerProfile());
');
use PaymentGateway\Paddle\{Transaction, CustomerProfile};
// or 
use PaymentGateway\Paddle as PA;
var_dump(new PA\Transaction());
var_dump(new PA\CustomerProfile());