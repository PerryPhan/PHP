<?php 
// Data Types & Type Casting
declare(strict_types=1);
// Statically typed language at compile time : C/ C++, Java, C#

// Dynamically typed language at run time: PHP, JS
// help flexiable redeclaring type.

// 10 types - with 3 groups
/*
 - 4 Scalar Types 
 *  # bool
 *  # int
 *  # float 
 *  # string 
 */
    $completed = true; # display: true -> 1 ; false -> empty 
    $score = 75;
    $price = 0.99;
    $greeting = "Hello";
    echo 'Boolean '.$completed.'<br>';
    echo 'Int '.$score.'<br>';
    echo 'Float '.$price.'<br>';
    echo 'String '.$greeting.'<br>';

    // To know thich type only 
    echo gettype($greeting) . '<br>';
    // To know which type and data 
    var_dump($score);

/* 
 - 4 Compound Types 
 *  # array
 *  # object
 *  # callable
 *  # iterable
 */
    $arr = [1, 2, 3, .5, -9.4, 'A', 'B', true];
    // Display arr 
    # echo $arr -> error : not convert array to string 
    print_r($arr);
    var_dump($arr);
/*
 - 2 Special Types
 *  # resource
 *  # null
 */

# Type Hinting and Casting 
echo '<br> SUM <br>';
function sum($x, $y){
    return $x + $y;
}
# PHP can do the convert if it in same group 
 echo sum(2,3).'<br>'; # 5  
 echo sum(2,'3').'<br>'; # 5  
 echo sum('2',3).'<br>'; # 5  
 echo sum(2.5,3).'<br>'; # 5  
//  echo sum([1,2,3],3).'<br>'; # error  

echo 'STRICT SUM WITHOUT STRICT RULE <br>';

// ! Without strict_type, it works the same way as default. 
function strict_sum(int $x, int $y){
    return $x + $y;
}
echo strict_sum(2,3).'<br>'; # 5  
// echo strict_sum(2,'3').'<br>'; # warning + error 
// echo strict_sum('2',3).'<br>'; # warning + error  
// echo strict_sum(2.5,3).'<br>'; # warning + error  
//  echo strict_sum([1,2,3],3).'<br>'; # warning + error  

