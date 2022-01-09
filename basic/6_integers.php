<?php 

/* INTEGERS */

// Integer as octal numbers, which start with 0 
$x = 0x2A; # 42 
$x = 055 ; # 45
echo 'Octal : '.$x; // get time to convert
echo '<br>';

// Integer as binary numbers 
$x = 0b11; # 3
$x = 0b110; # 6
echo 'Binary : '.$x;
echo '<br>';

// Integer MAXIMUM
$x = PHP_INT_MAX; 
// Overflow it
$x = PHP_INT_MAX + 1; // Convert to float  
echo 'Overflow then convert to float : ';
var_dump($x);
echo '<br>';

// Convert to int 
$x = (int) 5.99; // 5 , not rounded
$x = (int) null; // 0
$x = (int) '8.9'; // 8
$x = (int) 'phandai'; // 0
$x = (int) '89phandai'; // 89
echo 'Convert to int when value is \'89phandai\' : ';
var_dump($x);
echo '<br>';

// Is int 
var_dump(is_int($x)); // -> bool(true/false)
echo '<br>';

// Underscored decoration - more readable
$x = 200_000; // But '_000' in string is removed 
echo 'Underscore when declare int 200_000 : ';
var_dump($x);