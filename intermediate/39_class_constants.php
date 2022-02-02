<?php 
require_once __DIR__ . '/vendor/autoload.php';

use App\Enums\Status;
use App\PaymentGateway\Paddle\Transaction;

echo 'Constant testing <br>';
$transaction = new Transaction();
// echo 'Transaction::STATUS_PAID : '.Transaction::STATUS_PAID.'<br>';
// echo '$transaction::STATUS_PAID : '.$transaction::STATUS_PAID.'<br>';
// echo 'Transaction::class : '.Transaction::class.'<br>';
echo '<br>';
echo 'Using constant in case <br>';
echo '$transaction->setStatus(Status::PAID) : <br>';
$transaction->setStatus(Status::PAID);
var_dump($transaction->getStatus());