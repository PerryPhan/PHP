<?php 

namespace App\Enums;

class Status{
    public const PAID = 'paid';
    public const PENDING = 'pending';
    public const DECLINED = 'declined';
    
    // With constants, we can form a look-up table 
    public const ALL_STATUSES = [
        self::PAID => 'Paid',
        self::PENDING => 'Pending',
        self::DECLINED => 'Declined'
    ];
}