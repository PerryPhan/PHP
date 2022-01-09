<?php 

/* BOOLEANS */

$isComplete = true;
// ! All thing below is not in 2 way convert 
# integers 0 , -0 <-> false
# float 0.0, -0.0 <-> false
# string ''       <-> false
# array  []       -> false
# null            <-> false


echo $isComplete; // true display 1 
echo ' = ';
var_dump( (string) $isComplete );
echo ' is TRUE <br>';

echo !$isComplete; // false display '' 
echo ' = ';
var_dump( (string) !$isComplete );
echo ' is FALSE <br>';

echo (string) !$isComplete; // this is how echo convert boolean -> ''  
echo ' is FALSE convert String <br>';

// So this also work true 
$isComplete = 'false'

if($isComplete){
    // do something
    echo 'success';
}else{
    // do something else
    echo 'fail';
}
// To know that variable has boolean value 
echo is_bool($isComplete); // -> bool(true/false)
