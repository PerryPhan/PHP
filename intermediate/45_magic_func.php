<?php
require_once '../basic/0_overview.php';
require_once __DIR__ . '/vendor/autoload.php';

echo 'PHP Magic function <br>';
$invoice = new App\Invoice();
echo ' --------------------------------------- GET & SET ------------------------------------------------------<br> ';
echo '__get(string $name): is $name of the variable does not exsist in or not accessible, it will call this __get method <br>';
print_pre('
echo $invoice->amount;

# $amount does not exist in the class
# so this func is called  
public function __get(string $name)
{
    var_dump($name);   
} 
');
echo 'Result : echo $invoice->amount will print : ';
echo $invoice->amount . '<br>';
two_br();

echo '__set(string $name, any $value): is passing value to $name of the variable does not exsist in or not accessible, it will call this __set method <br>';
echo 'In defualt, $invoice->amount = 15 statement will declare a var as defualt __set() to class, but using __set() we can do some custom logic to it<br>';
print_pre('
$invoice->amount = 15;

# $amount does not exist in the class
# so this func is called  
public function __set(string $name, $value):void
{   
    var_dump($name, $value);   
}
');
echo 'Result : $invoice->amount = 15 will print :';
$invoice->amount = 15;
two_br();

echo 'In some usecases both GET and SET ,magic method, are bad ideas<br>';
print_pre('
class Invoice
{
    protected float $amount; // <- not accessible variable

    public function __get(string $name)
    {
        if( property_exists($this, $name)){
            return $this->$name; 
        }
        return null;
        // var_dump($name);   
    }
    
    public function __set(string $name, $value):void
    {           
        if( property_exists($this, $name)){
            $this->$name = $value;
        }
    }
}
$invoice = new \App\Invoice();
$invoice->amount = 15;
echo $invoice->amount; #15 - be accessible
');
two_br();

echo 'Use case for this is : use array to append every unknown variables <br>';
print_pre('
class Invoice
{
    protected array $data;

    public function __get(string $name)
    {
        if( array_key_exists($name, $this->data)){ 
            return $this->data[$name];
        }
        return null;
    }
    public function __set(string $name, $value):void
    {   
        $data[$name] = $value;
    }
}
$invoice = new \App\Invoice();
$invoice->amount = 15;
echo $invoice->amount; #15 - no problem
var_dump($invoice);
');
$invoice = new \App\Invoice();
$invoice->amount = 15;
echo $invoice->amount . '<br>'; #15 - no problem
var_dump($invoice);
two_br();

echo ' --------------------------------------- ISSET & UNSET ------------------------------------------------------ <br>';
echo '__isset(string $name): using isset() for $name of the variable does not exsist in or not accessible, it will call this __isset method <br>';
print_pre('
class Invoice
{
    public function __isset(string $name): bool
    {
        var_dump(\'isset\');
        return array_key_exists($name, $this->data);
    }
}
');
$invoice = new \App\Invoice();
$invoice->amount = 15;
var_dump(isset($invoice->amount));
echo '<br>';
var_dump($invoice);
echo '<br>';
two_br();

echo '__unset(string $name): using unset() for $name of the variable does not exsist in or not accessible, it will call this __unset method <br>';
print_pre('
class Invoice
{
    public function __isset(string $name): bool
    {
        var_dump(\'unset\');
        unset($this->data[$name]);
    }
}
');
$invoice = new \App\Invoice();
$invoice->amount = 15;
var_dump(isset($invoice->amount));
echo '<br>';
unset($invoice->amount);
echo '<br>';
var_dump(isset($invoice->amount));
echo '<br>';
var_dump($invoice);
echo '<br>';
two_br();

echo ' --------------------------------------- CALL & CALL STATIC ------------------------------------------------------ <br>';
echo '__call(string $name, array $agruments): $name of the function does not exsist in or not accessible, it will call this __call method <br>';
print_pre('
class Invoice
{
    public function __call(string $name, array $arguments)
    {
        var_dump($name, $arguments);
    }
}
');
$invoice = new \App\Invoice();
$invoice->process(1, 2, 3);
two_br();

echo 'static __callStatic(string $name, array $agruments): $name of the static function does not exsist , it will call this __callStatic method <br>';
print_pre('
class Invoice
{
    public static function __callStatic(string $name, array $arguments)
    {
        var_dump(\'static\');
        var_dump($name, $arguments);
    }
}
');
\App\Invoice::process(1, 2, 3);
two_br();

echo 'Usecase for __call is to hide information of function <br>';
print_pre('
class Invoice
{
    public function __call(string $name, array $arguments)
    {
        if (method_exists($this, $name)){
            $this->$name();
        }
    }

    protected function process(){
        var_dump(\'process\');
    }
}
#especially when with arguments 
public function __call(string $name, array $arguments)
{
    if (method_exists($this, $name)){
        $this->$name();
    }
}

');
$invoice = new \App\Invoice();
$invoice->process( 1, 'asd'); # = $this->process() 
two_br();

echo ' --------------------------------------- TO STRING ------------------------------------------------------ <br>';
echo '__toString(): when you echo class\'s instance, it will call __toString method <br>';
print_pre('
public function __toString(): string 
{
    return \'hello\';
}
echo $invoice;
');
echo $invoice . '<br>';
echo 'Because in the old day, class must implement Stringable, now it is auto <br>';
var_dump($invoice instanceof Stringable);
two_br();

echo ' --------------------------------------- INVOKE ------------------------------------------------------ <br>';
echo '__invoke(): when you called class\'s instance as func , it will call __invoke method <br>';
print_pre('
public function __invoke()
{
    var_dump(\'invoked\');   
}
$invoice();
');
$invoice();
two_br();

echo ' --------------------------------------- DEBUG INFO  ------------------------------------------------------ <br>';
echo '__debugInfo(): when you use var_dump to class\'s instance to show information of class included inaccessable variables <br>';
print_pre('
public function __debugInfo(): ?array
{
    return [
        \'id\' => $this->id,
        \'phone\' => \'****\' . substr($this->phone, -4)
    ];
}
var_dump($invoice);
');
var_dump($invoice);
two_br();
