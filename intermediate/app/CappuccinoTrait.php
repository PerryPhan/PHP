<?php 

namespace App;

trait CappuccinoTrait
{
    // use LatteTrait;
    private function makeCappuccino()
    {
        echo static::class . ' is making cappuccino <br>';
    }

    public function makeCoffee()
    {
        echo static::class . ' is making coffee (UPDATED) <br>';   
    }

    public function makeLatte()
    {
        echo static::class . ' is making latte (UPDATED from Cappuccino ) <br>';
    }
}