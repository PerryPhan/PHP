<?php
require_once '../basic/0_overview.php';
require_once __DIR__ . '/vendor/autoload.php';

echo 'Late Static binding in PHP <br>';
echo 'We have problem like : <br>';
print_pre('
class ClassA
{
    protected static string $name = \'A\';

    public static function getName():string
    {
        var_dump(self::class)
        return self::$name;
    }
}
class ClassB extends ClassA
{
    protected static string $name = \'B\';
}

echo \App\ClassA()::getName(); #classA # A
echo \App\ClassB()::getName(); #classA # A # because it called method in A # <- expected classB and B 
');

echo 'A solution is using late binding called static <br>';
echo 'Late binding is using runtime information to determine how to call a method, property or constant <br>';

print_pre('
class ClassA
{
    protected static string $name = \'A\';

    public static function getName():string # static function or non-static function also can be used 
    {
        return static::$name;
    }
    // or 
    public function getName():string 
    {
        return static::$name; # working fine
    }
}
echo \App\ClassA::getName(); 
echo \App\ClassB::getName(); 
');
echo \App\ClassA::getName() . '<br>';
echo \App\ClassB::getName() . '<br>';
two_br();

echo 'Class problem is also like : <br>';
print_pre('
class ClassA
{
    protected static string $name = \'A\';

    public static function getName():string
    {
        var_dump(self::class)
        return self::$name;
    }

    public static function make()
    {
        return new self();
    }
}
class ClassB extends ClassA
{
    protected static string $name = \'B\';
}

echo \App\ClassA()::make(); #classA 
echo \App\ClassB()::make(); #classA # because it called method in A # <- expected classB
');

echo 'Using late binding <br>';
print_pre('
class ClassA
{
    protected static string $name = \'A\';

    public static function getName():string # static function or non-static function also can be used 
    {
        return static::$name;
    }
    // or 
    public function getName():string 
    {
        return static::$name; # working fine
    }
    public static function make():static
    {
        return new static();
    }
}
var_dump(\App\ClassA::make()); #classA
var_dump(\App\ClassB::make()); #classB
');

var_dump(\App\ClassA::make()); #classA
var_dump(\App\ClassB::make()); #classB
