<?php

/* Variable, Anonymous, Callable, Closure & Arrow Functions */
echo 'Variable, Anonymous, Callable, Closure & Arrow Functions <br>';
echo 'How to be function variable <br>';
echo '<pre>
function sum(int|float ...$numbers): int|float {
    return array_sum($numbers);
}
$x = \'sum\';
echo $x(1,2,3,4,5);
</pre>';
function sum(int|float ...$numbers): int|float {
    return array_sum($numbers);
}
$x = 'sum';
echo $x(1,2,3,4,5).'<br>';
echo 'We can check if that function has type callable or not by is_callable($x) <br>'; 
echo '<pre>
if( is_callable($x) ){
    echo $x(1,2,3,4,5);
}else {
    echo \'Not Callable\';
}
</pre>';
if( is_callable($x) ){
    echo $x(1,2,3,4,5).'<br>';
}else {
    echo 'Not Callable'.'<br>';
}
echo '<br>';

echo 'How to be Anonymous Function : it is Function that has no name<br>';
echo '<pre>
# Because it has no name we can declare variable with it
$sum = function (int|float ...$numbers): int|float {
    return array_sum($numbers);
};
echo $sum(1,2,3,4);
</pre>';
$sum = function (int|float ...$numbers): int|float {
    return array_sum($numbers);
};
echo $sum(1,2,3,4).'<br>';
echo '<br>';
echo '<pre>
# We can access to outside variable by use ($x) ( & : for its preference ) 
$sum = function (int|float ...$numbers) use (&$x): int|float {
    $x = 15;
    echo $x;
    return array_sum($numbers);
};
echo $sum(1,2,3,4);
echo $x;
</pre>';
$x = 1;
$sum = function (int|float ...$numbers) use (&$x): int|float {
    $x = 15;
    echo '$x: '.$x. '<br>';
    return array_sum($numbers);
};
echo $sum(1,2,3,4). '<br>'; 
echo '$x: '.$x;
echo '<br>';
echo '<br>';
echo 'As we know, callable is a type, it can be declare as argument in function <br>';
echo '<pre>
# We can put the closure type in, but closure only accept annonymous function.
$sum = function (callable $callback, int|float ...$numbers): int|float {
    return $callback(array_sum($numbers)); # as above principle 
};
echo $sum(\'foo\', 1,2,3,4);
echo $sum($foo, 1,2,3,4);
echo $sum( function( $element){
    return $element *2;
}, 1,2,3,4 );
</pre>';
$sum = function (callable $callback, int|float ...$numbers): int|float {
    return $callback(array_sum($numbers)); # as above principle 
};
function foo( $element){
    return $element *2;
};
$foo = function( $element){
    return $element *2;
};
echo $sum('foo', 1,2,3,4).'<br>';
echo $sum($foo, 1,2,3,4).'<br>';
echo $sum( function( $element){
    return $element *2;
}, 1,2,3,4 ).'<br>';
echo '<br>';
echo 'Shorthand we can use arrow function, arrow fn can access any outside variable  <br>';
echo '<pre>
# The cons of arrow function that it is only one-lined function, and cannot pass argument\'s reference as closure
$y = 10;
echo $sum( fn( $element) => $element * $y , 1,2,3,4 );
</pre>';
$y = 10;
echo $sum( fn( $element) => $element * $y , 1,2,3,4 ).'<br>';
echo '<br>';
echo 'Other way to handle array reducer by using arrow function <br>';
echo '<pre>
$y = 10;
$arr = [1,2,3,4,5];
$arr2 = array_map(fn($item) => $item * $item * $y, $arr );
print_r($arr2);
</pre>';
$arr = [1,2,3,4,5];
$arr2 = array_map(fn($item) => $item * $item * $y, $arr);
print_r($arr2);