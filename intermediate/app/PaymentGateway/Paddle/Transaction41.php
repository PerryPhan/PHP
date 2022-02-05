<?php

declare(strict_types=1);

namespace App\PaymentGateway\Paddle;

class Transaction41
{

    public function __construct(
        private float $amount # public can break encapsulation and abstraction
    ) {
    }

    // also class instance can access each other private var 
    public function copyFrom(Transaction41 $transaction41)
    {
        var_dump($transaction41->amount, $transaction41->sendEmail());
    }

    public function process()
    {
        echo 'Processing $' . $this->amount . ' transaction';
        $this->generateReceipt();
    }


    /**
     * Get the value of amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    private function generateReceipt()
    {
    }

    private function sendEmail()
    {
        return true;
    }
}
