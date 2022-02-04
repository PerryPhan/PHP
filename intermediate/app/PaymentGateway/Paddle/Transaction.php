<?php 
declare(strict_types = 1);
namespace App\PaymentGateway\Paddle;

use App\Enums\Status as Status;

class Transaction{
    
    private static int $count = 0;

    // Prehaps we have private var status 
    private string $status;

    public function __construct()
    {
        // # 39 Uncomment to test this file -----------------------------------------
        // echo 'var_dump(self::STATUS_PAID) from construct : ';
        // var_dump(Status::PAID);
        // echo '<br>';   

        // echo 'set Status to Pending : $this->setStatus(self::STATUS_PENDING); ';
        // $this->setStatus(Status::PENDING);
        // echo '<br>';

        # 40 Uncomment to test this -------------------------------------------------
        self::$count++;
    }
    
    
    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus(string $status) : self | Transaction
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus() : string
    {
        return $this->status;
    }

    /**
     * Get the value of count
     */ 
    public static function getCount(): int
    {
        return self::$count;
    }
}