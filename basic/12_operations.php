<?php

/* OPERATIONS */

// Arithmetic Operators (+ - * / % ** )
echo 'Arithmetic Operators (+ - * / % ** ) <br>';
$x = 10;
$y = 2;
# about + - *
# if the one in / is float then the result is float
echo 'Do var_dump(-$x * $y) when $x = 10, $y = 2 : ';
var_dump(-$x * $y); # int(-20) 
echo '<br>';
echo '<br>';
$x = '10';
echo 'Auto convert to int if has operators: <br> ';
echo 'Base $x: ';
var_dump($x); # string(10)
echo '<br>';
echo '+$x : ';
var_dump(+$x); # convert to int(10) 
echo '<br>';
echo '-$x : ';
var_dump(-$x); # convert to int(-10)
echo '<br>';
echo '<br>';
# about /, fdiv()
$x = 10;
$y = 5.0;
echo 'Auto convert to float if one of the two values is float: <br>';
echo 'Do var_dump($x / $y) when $x = 10, $y = 5.0 : ';
var_dump($x / $y); # float(2)
echo '<br>';
echo '<br>';

$y = 0;
echo 'If do divided by zero with regular /, it will cause error, only fidv() return INF  <br>';
echo 'Do var_dump($x / $y) when $x = 10, $y = 0 : ';
// var_dump($x / $y); # error
var_dump(fdiv($x, $y)); # float(INF)
echo '<br>';
echo '<br>';

# about %, fmod()
$x = 10.5;
$y = 2.7;
// Operator % will try to convert two param to int and return int
echo ' Operator % will try to convert two param to int and return int, only fmod() return float <br>';
echo 'Do var_dump($x % $y) when $x = 10.5, $y = 2.7 : ';
var_dump($x % $y); # int(0)
var_dump(fmod($x, $y)); # float(2.3999999999999995)
echo '<br>';
echo '<br>';

# specially, minus must be placed at first one 
echo 'Specially, minus must be placed at first one, or the result does not logical <br>';
$x = 10;
$y = -3;
echo 'Do var_dump($x % $y) when $x = 10, $y = -3 : ';
var_dump($x % $y); # int(1)
echo '<br>';

$x = -10;
$y = 3;
echo 'Do var_dump($x % $y) when $x = -10, $y = 3 : ';
var_dump($x % $y); # int(-1)
echo '<br>';
echo '<br>';

// Assignment Operators (= += -= *= /= %= **=)
echo 'Assignment Operators (= += -= *= /= %= **=) <br>';
$x = ($y = 10) + 5; # can assign while in operator
echo 'Do var_dump($x, $y) when $x = ($y = 10) + 5: ';
var_dump($x, $y);
echo '<br>';
echo '<br>';

$x *= 3;
echo 'Do echo $x when $x *= 3 : ';
echo $x;
echo '<br>';
echo '<br>';

$z *= 3;
echo 'Do echo $z when $z *= 3 and not defined $z: ';
echo $z; # can throw result, but get error.
echo '<br>';
echo '<br>';
# the truth is that it only worked when have a copy of previous value. 

// String Operators (. .=)
echo 'String Operators (. .=) <br>';
$hello = "Hello ";
$world = "World";
$hello .= $world;
echo $hello;
echo '<br>';
echo '<br>';

// Comparasion Operators (== === != <> !== < > <= => <=> ?? ?:)
echo 'Comparasion Operators (== === != <> !== < > <= => <=> ?? ?:) <br>';
# The problems when use '==' 
echo "var_dump(0 == '0') : ";
var_dump(0 == '0'); # true - because numeric string(0) can convert to int(0) 
echo '<br>';
echo "var_dump(0 == '0asd') : ";
var_dump(0 == '0asd'); # false - because '0asd' was not numeric and it began to convert int(0) to string(0) for comparasion.
echo '<br>';
echo "var_dump(0 == 'hello') : ";
var_dump(0 == 'hello'); # false - because the same reason as above.
echo '<br>';

$y = strpos($hello, 'H'); # at index 0
echo "strpos($hello, 'H') when if ( $y == false) : ";
if ($y == false) { # because 0 is convert to bool(false)
    echo 'H not found';
} else {
    echo "H found at index $y";
}
echo '<br>';

echo "strpos($hello, 'H') when if ( $y === false) : ";
$result = $y === false ? 'H not found' : "H found at index $y"; # it works properly
echo $result;
echo '<br>';
echo '<br>';

// $x = false;
echo "Do \$y = \$x ?? 'hello' when not declare \$x : ";
$y = $x ?? 'hello'; # this work when $x is null , it will return other option
var_dump($y);

// Error Control Operators (@)
echo 'Error Control Operators (@) <br>';
echo 'Just for knowledge, this @ silence your warning or error, useless, not recommended <br>';
echo 'You can silence file not found when you declare $x = @file(\'foo.txt\') ';
$x = @file('foo.txt');
echo '<br>';
echo '<br>';

// Increment/ Decrement Operators (++, --)
echo 'Increment/ Decrement Operators (++, --) <br>';
$x = 5;
echo 'Two position to put this operators is front and back of variables ( $x = 5 ) <br>';
echo 'Front do increase first then run echo ++$x : ';
echo ++$x . '->';
echo $x;
echo '<br>';
echo 'While back is reverse echo $x++ : ';
echo $x++ . '->';
echo $x;
echo '<br>';
echo '<br>';

echo 'Null can only be effect by ++ <br>';
$x = null;
echo 'This is null : ' . $x;
echo '<br>';
echo 'This is ++null : ' . ++$x;
echo '<br>';
$x = null;
echo 'This is --null : ' . --$x;
echo '<br>';
echo '<br>';

echo 'String can only be effect by ++ (string abc)<br>';
$x = 'abc';
echo 'This is --abc : ' . --$x;
echo '<br>';
echo 'This is ++abc : ' . ++$x;
echo '<br>';
echo '<br>';

// Logical Operators (&& || ! and or xor)
echo 'Logical Operators (&& || ! and or xor) <br>';
// Main thing 
echo 'about && : it will find first false part, stop there and return false <br>';
echo 'about || : it will find first true part ,stop there and return true <br>';
$x = true;
$y = false;

echo 'If we have a function that echo hello named hello() and $x = true <br>';
function hello(){
    echo 'Hello';
    return false;
}
echo 'var_dump($x || hello()) : ';
var_dump($x || hello());# hello() will never be called if $x = true;
echo '<br>';
echo 'var_dump(!$x && hello()) : ';
var_dump(!$x && hello());# hello() will never be called if $x = true;
echo '<br>';

