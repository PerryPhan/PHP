<?php

require_once '../basic/0_overview.php';
require_once __DIR__ . '/vendor/autoload.php';

echo 'Trait in PHP <br>';
echo ' We have the problem : <br>';
print_pre('
    CoffeeMaker: 
        - LatteMaker
        - CappuccinoMaker
    # Now create class
    All in one Coffee Maker 
    # want to have all methods of LatteMaker and CappuccinoMaker methods ( included CoffeeMaker\'s methods )
    
    # But when CoffeeMaker method (Ex: makeCoffee() ) change, LatteMaker makes that method override another version and CappuccinoMaker does too.
    ? What will All in one Coffee Maker will take that function from ?

    # Or you have multiple classes that have many methods that you want to create new class to control all the different one. 
    ? Do you really open that class and copy paste all the different methods in classes to the destination one ? 

    -> So PHP introduce Trait - to contain all common-use functions between classes.
');
echo 'To use Trait do : <br>';
print_pre('
class AllInOneCoffeeMaker extends CoffeeMaker
{
    use LatteTrait, CappuccinoTrait;
}
');
echo 'Do : <br>';
print_pre('
$coffeeMaker = new \App\CoffeeMaker();
$coffeeMaker->makeCoffee();

$latteMaker = new \App\LatteMaker();
$latteMaker->makeCoffee();
$latteMaker->makeLatte();

$cappuccinoMaker = new \App\CappuccinoMaker();
$cappuccinoMaker->makeCoffee();
$cappuccinoMaker->makeCappuccino();

$allInOneCoffeeMaker = new \App\AllInOneCoffeeMaker();
$allInOneCoffeeMaker->makeCoffee();
$allInOneCoffeeMaker->makeLatte();
$allInOneCoffeeMaker->makeCappuccino();

');
$coffeeMaker = new \App\CoffeeMaker();
$coffeeMaker->makeCoffee();

$latteMaker = new \App\LatteMaker();
$latteMaker->makeCoffee();
$latteMaker->makeLatte();

$cappuccinoMaker = new \App\CappuccinoMaker();
$cappuccinoMaker->makeCoffee();
$cappuccinoMaker->makeCappuccino();

$allInOneCoffeeMaker = new \App\AllInOneCoffeeMaker();
$allInOneCoffeeMaker->makeCoffee();
$allInOneCoffeeMaker->makeLatte();
$allInOneCoffeeMaker->makeCappuccino();
two_br();

echo 'If you want to overide, write your own code bellow Trait usage <br>';
print_pre('
class CappuccinoMaker extends CoffeeMaker
{
    use CappuccinoTrait;

    public function makeCappuccino()
    {
        echo static::class . \' is making cappuccino (UPDATED) <br>\';
    }
}
');
$cappuccinoMaker->makeCappuccino();
two_br();

echo 'But you want to overide some Trait\'s functions existed in another Trait <br>';
print_pre('
trait CappuccinoTrait
{
    public function makeCappuccino()
    {
        echo static::class . \' is making cappuccino <br>\';
    }
    public function makeLatte()
    {
        echo static::class . \' is making latte (UPDATED from Cappuccino ) <br>\';
    }
}
// VS
trait LatteTrait
{
    public function makeLatte()
    {
        echo static::class . \' is making latte <br>\';
    }
}
$allInOneCoffeeMaker->makeLatte(); #error 

# -> Solution is config \'insteadOf\' in the AllInOneCoffeeMaker 
class AllInOneCoffeeMaker extends CoffeeMaker
{
    use LatteTrait;
    use CappuccinoTrait{
        CappuccinoTrait::makeLatte insteadOf LatteTrait;
    }
}
$allInOneCoffeeMaker->makeLatte(); # work 
');
$allInOneCoffeeMaker->makeLatte();
two_br();

echo 'Methods in Trait can be changed from private/protected/public to other too  <br>';
print_pre('
trait CappuccinoTrait
{
    public function makeCappuccino()
    {
        echo static::class . \' is making cappuccino <br>\';
    }
    public function makeLatte()
    {
        echo static::class . \' is making latte (UPDATED from Cappuccino ) <br>\';
    }
}
// So in the using-trait class, we will use \'as\' keyword
class AllInOneCoffeeMaker extends CoffeeMaker
{
    use LatteTrait;
    use CappuccinoTrait{
        CappuccinoTrait::makeCappuccino as public;
        CappuccinoTrait::makeLatte insteadOf LatteTrait;
    }
}
$allInOneCoffeeMaker->makeCappuccino(); # work
');
$allInOneCoffeeMaker->makeCappuccino(); # work
two_br();

echo 'Trait can be nested <br>';
print_pre('
trait CappuccinoTrait
{
    use LatteTrait; 

    public function makeCappuccino()
    {
        echo static::class . \' is making cappuccino <br>\';
    }
    public function makeLatte()
    {
        echo static::class . \' is making latte (UPDATED from Cappuccino ) <br>\';
    }
}
');
two_br();

echo 'The right way to use properties in Trait is <br>';
print_pre('
trait LatteTrait
{
    use LatteTrait; 

    private string $milkType = \'whole-milk\';

    public function makeLatte()
    {
        echo static::class . \' is making latte <br>\';
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
}
// Outside the destination class, we can declare getter 
class LatteMaker extends CoffeeMaker
{
    use LatteTrait;
    
    public function getMilkType() <- cleanest way 
    {
        return $this->milkType; 
    }
}
');
two_br();

echo 'Static properties and methods in Trait <br>';
print_pre('
trait LatteTrait
{
    static public string $foo;
    static public function foo(): string
    {
        return \'Foo Bar\';
    }
}
// So when 
\App\LatteMaker::$foo = \'foo\';
\App\AllInOneCoffeeMaker::$foo = \'bar\';
echo \App\LatteMaker::$foo; #foo 
\App\AllInOneCoffeeMaker::$foo; #bar - is different, even in same Trait
');
echo  \App\LatteMaker::$foo = 'foo' . '<br>';
echo  \App\AllInOneCoffeeMaker::$foo = 'bar' . '<br>';
two_br();

echo 'Trait even has magic method called __CLASS__ which is similar to static::class ';
print_pre('
trait LatteTrait
{
    public function makeLatte()
    {
        echo __CLASS__ . \' is making latte <br>\';
    }
}
$latteMaker->makeLatte();
');
$latteMaker->makeLatte();

echo 'With above benefit, a ADVICE : when u want to reuse any easy common code and multi inheritances in PHP , create Trait. But not overuse it. Why ?';
print_pre('
trait LatteTrait
{
    final public function bar(){
        echo \' Bar <br>\';
    }
}
// In LatteMaker
use LatteTrait;
public function bar()
{
    echo \'Fooobar <br>\';
}
$latteMaker->bar(); # Fooobar - Final is not effected in Trait - this is bug
');
