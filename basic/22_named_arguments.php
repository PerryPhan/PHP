<?php

declare(strict_types=1);
/** Named function' agruments  */
echo 'Named function\' agruments<br>';
echo '<pre>
function foo(int|float $x, int|float $y){
    return $x * $y;
}
echo foo(5.0, 10);
</pre>';
function foo(int|float $x, int|float $y)
{
    return $x * $y;
}
echo foo(5.0, 10);

echo '<pre>
# We can have default value but it need to be declared at last
function foo1(int|float &$x, int|float $y = 0){
    if( $x % 2 === 0){
        $x /= 2; 
    }
    return $x * $y;
}
$a = 6.0;
$b = 7;
echo foo($a, $b);
</pre>';
function foo1(int|float &$x, int|float $y)
{
    if ($x % 2 === 0) {
        $x /= 2;
    }
    return $x * $y;
}
$a = 6.0;
$b = 7;
echo foo1($a, $b);
echo '<pre>
# We can put many arguments as we want
# Especially, we can declare type for each item of array
function foo2( int|float /* blank for mixed */ ...$numbers): int|float{
    return array_sum($numbers);
}
# or
function foo2( int|float $x, int|float $y ,int|float ...$numbers): int|float{
    return $x + $y + array_sum($numbers);
}
$a = 6.0;
$b = 7;
echo foo($a, $b, 50, 55, 65, 100, 70, 8.0, 9);
</pre>';
function foo2(int|float $x, int|float $y, int|float ...$numbers): int|float
{
    return $x + $y + array_sum($numbers);
}
$a = 6.0;
$b = 7;
echo foo2($a, $b, 50, 55, 65, 100, 70, 8.0, 9);
echo '<br>';

echo 'With unpack operator, we can do this <br>';
echo '<pre>
$a = 6.0;
$b = 7;
$numbers = [50, 100, 25.9, 8, 9];
echo foo2($a, $b, ...$numbers);
</pre>';
$a = 6.0;
$b = 7;
$numbers = [50, 100, 25.9, 8, 9];
echo foo2($a, $b, ...$numbers);
echo '<br>';
echo 'Or this 
<pre>
$argu = [
    $a, 
    $b, 
    ...$numbers,
];
echo foo2(...$argu);
</pre>
<br>';
$argu = [
    $a,
    $b,
    ...$numbers,
];
echo foo2(...$argu);
echo '<br>';
echo '<br>';

echo 'In PHP 8.0, there is feature help u solve the problem put value to param $c in func abc( $a = \'\', $b = false,... , $c = \'\') ';
echo 'By abc( c: \'123\') <br>';
echo '<pre>
$x = 6;
$y = 3;
echo foo(y: $y, x: $x); # PHP 8
echo foo($y, x: $x); # error - $x is already passed 
echo foo(x : $y, x: $x); # error - $x is already passed
# Just remind this: can not duplicate param .
</pre>';
$x = 6;
$y = 3;
echo foo(y: $y, x: $x); # PHP 8
echo '<br>';
echo 'With unpack operator, we can use like this <br>';
echo '<pre>
$arr = [\'y\' => 2, \'x\' => 1];
$arr = [2, \'x\' => 1]; # it strictly checks too so error
echo foo(...$arr);
</pre>';
$arr = ['y' => 2, 'x' => 1];
echo foo(...$arr);
