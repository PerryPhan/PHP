<?php 

namespace App;

class LatteMaker extends CoffeeMaker
{
    use LatteTrait;
    
    public function getMilkType()
    {
        return $this->milkType; 
    }

    public function bar()
    {
        echo 'Fooobar <br>';
    }
}