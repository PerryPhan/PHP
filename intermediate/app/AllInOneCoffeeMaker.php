<?php 

namespace App;

class AllInOneCoffeeMaker extends CoffeeMaker
{
    use LatteTrait;
    use CappuccinoTrait{
        CappuccinoTrait::makeCappuccino as public;
        CappuccinoTrait::makeLatte insteadOf LatteTrait;
    }
}