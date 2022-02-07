<?php 

namespace App;

trait LatteTrait
{
    
    static public string $foo;
    static public function foo(): string
    {
        return 'Foo Bar';
    }

    private string $milkType = 'whole-milk';

    public function makeLatte()
    {
        echo __CLASS__ . ' is making latte <br>';
    }

    // Abstract method can be applied in Trait 
    // abstract public function getMilkType();

    public function setMilk(string $milkType): static
    {
        // We can use $this as destination class
        $this->milkType = $milkType;
        // static is also can be use in non-static function as this
        return $this;
    }

    final public function bar(){
        echo ' Bar <br>';
    }

}