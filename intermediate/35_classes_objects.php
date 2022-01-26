<?php 
declare(strict_types = 1 );
require_once '../basic/0_overview.php';

echo 'Class and object <br>';
// Creating class & object 
// Class properties
class Transaction{
    public ?float $amount;
    public string $description;
}

// Type properties 
$tran = new Transaction( 4 , 'Demo');
echo 'The special thing that if you set the';
print_pre('<pre>
...
public $amount #1 
vs 
public ?float $amount #2  
...
</pre>');
echo 'Then the result when you don\'t pass any value to $transaction->amount is ';
print_pre('var_dump($transaction->amount); #1 NULL ');
print_pre('var_dump($transaction->amount); #2 Fatal error ');
// var_dump($tran->amount); // #2 Fatal Error
echo 'Because PHP don\'t know whether this property which has a type has already set or you forgot to set value on it <br>';
echo 'And as solution PHP set that type to uninitialized(<type_you_declare_for_it>)';
print_pre('var_dump($transaction)');
var_dump($tran); # object(Transaction)#1 (0) { ["amount"]=> uninitialized(?float) ["description"]=> uninitialized(string) }
echo '<br>';
echo '<br>';

// Class constructor, $this, & constructor arguments
// Methods
// Methods chaining // return $this
class TransactionFull{
    private ?float $amount;
    private string $description;

    public function __construct(float $amount, string $description)
    {
        $this->amount = $amount;
        $this->description = $description;
    }

    public function addTax(float $rate) : TransactionFull
    {
        $this->amount += $this->amount * $rate / 100;
        return $this;
    }
    
    public function applyDiscount(float $rate) : self
    {
        $this->amount -= $this->amount * $rate / 100;       
        return $this;
    }
    

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of amount
     */ 
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     *
     * @return  self
     */ 
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    public function __destruct()
    {
        echo "Destruct $this->description called <br>";
    }
}

// Methods chaining // return $this
echo 'A little bit about methods chaining, which you can return $this and process upon func call, is declare return type as its own classname ( Ex: TransactionFull ) or "self" when strict rule on <br>';
print_pre('
$transaction = (new TransactionFull(100, \'Transaction 1\'))->addTax(8)->applyDiscount(10);
// Remember to add brasket ( ) to class or it will cause error
$transaction = new TransactionFull(100, \'Transaction 1\')->addTax(8)->applyDiscount(10); # error
');
$amount = (new TransactionFull(100, 'Transaction 1'))
        ->addTax(8)
        ->applyDiscount(10)
        ->getAmount();
var_dump($amount);
echo '<br>';
echo 'Also can be declare class and object through variables <br>';
print_pre('
$class = \'TransactionFull\'; 
$tran  = new $class(100, \'Transaction 1\');
// ...
');
$class = 'TransactionFull';
$amount = (new $class(100, 'Transaction 1'))
        ->addTax(8)
        ->applyDiscount(10)
        ->getAmount();
var_dump($amount);
echo '<br>';

// Destruct 
echo 'Destruct will be called when there is no preference or method been called <br>';
print_pre('
// We have this, the system will perform call destruction
$amount = (new $class(100, \'Transaction 1\'))
        ->addTax(8)
        ->applyDiscount(10)
        ->getAmount(); # System : "Destruct first then var_dump" 
var_dump($amount);
');

// Var dump first
$transaction = (new $class(100, 'Transaction 1'))
        ->addTax(8)
        ->applyDiscount(10);
print_pre('
// Var dump first
// ... 
$amount = $transaction->getAmount(); # Systen : "Var_dump first"
var_dump($amount); 
');
$amount = $transaction->getAmount(); # Systen : "Var_dump first"
var_dump($amount); 
echo '<br>';

// Destruct first

$transaction = (new $class(100, 'Transaction 2'))
        ->addTax(8)
        ->applyDiscount(10);
print_pre('
// Destruct first
// ... 
$amount = $transaction->getAmount();
unset($transaction); // or $transaction = null; # System : "Destruct first then var_dump"
var_dump($amount); 
');
$amount = $transaction->getAmount();
unset($transaction); // or $transaction = null; # System : "Destruct first then var_dump"
var_dump($amount);

echo '<br>';
echo '<br>';

// stdClass & object casting
echo 'Casting other type to Object <br>';
print_pre('
// Object-type String to Object
$str = \'{"a":1,"b":2,"c":3}\';
$arr = json_decode($str, true);
var_dump($arr); # return array 
$arr = json_decode($str); 
var_dump($arr->a, $arr->b, $arr->c); #return obj
');
$str = '{"a":1,"b":2,"c":3}';
$arr = json_decode($str);
var_dump($arr->a, $arr->b, $arr->c);

print_pre('
// Array to Object
$str = [1, 2, 3];
$obj = (object) $arr;
var_dump($obj->{0});
var_dump($obj->{1});
var_dump($obj->{2});
');
$arr = [1, 2, 3];
$obj = (object) $arr;
var_dump($obj->{0});
var_dump($obj->{1});
var_dump($obj->{2});

print_pre('
// Int/Bool/Null/String to Object
$obj = (object) 1;
var_dump($obj->scalar); // 1
');
$obj = (object) '';
var_dump($obj->scalar); // ''