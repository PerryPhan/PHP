<?php 

/** variable scopes */
echo 'Global Variables : not recommended except COOKIES, SESSION or system var <br>';
$x = 5;
include('files/increase_x.php');
echo '<br>';
echo $x;
echo '<br>';
echo '<pre>
function foo(){
    global $x; // Get preference of outside $x
    // or $GLOBALS[\'x\'] = 15;
    $x = 15;
    echo $x; 
}
foo();
</pre>';
function foo(){
    global $x; // Get preference of outside $x
    // or $GLOBALS['x'] = 10;
    $x = 15;
    echo $x; 
}
foo();
echo '<br>';
echo 'Static Variables : More use-case than global <br>';
echo '<pre>
# The useful case of reuse variable
function getValue(){
    static $value = null; # Value will be contained by this $value and not reset every time called
    if( $value === null ){
        $value = someVeryExpensiveFunction();
    }    
    // ...
    return $value;
}
function someVeryExpensiveFunction(){
    sleep(2);
    echo \'Processing\';
    return 10;
}
echo getValue(); // But it only causes 2 sec 
echo getValue();
echo getValue();
</pre>';
function getValue(){
    static $value = null;
    if( $value === null ){
        $value = someVeryExpensiveFunction();
    }    
    // ...
    return $value;
}
function someVeryExpensiveFunction(){
    sleep(2);
    echo 'Processing ';
    return 10;
}
echo getValue().'<br>';
echo getValue().'<br>';
echo getValue().'<br>';