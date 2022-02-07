<?php 

namespace App;

class CappuccinoMaker extends CoffeeMaker
{
    use CappuccinoTrait;

    public function makeCappuccino()
    {
        echo static::class . ' is making cappuccino (UPDATED) <br>';
    }
}