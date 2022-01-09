<?php 

/* FLOAT */

$x = 13.5e3;// -> e3 = x 10^3 
$x = 13.5e-3;
$x = 13_000.5e-3;
echo 'Float value that include e like 13_000.5e-3 <br>';
echo $x; 
echo '<br>';
echo '<br>';

// Problem in PHP Float
echo 'Float problem with floor() when floor((0.1 + 0.7) * 10), will it get 8 <br>';
$x = floor((0.1 + 0.7) * 10); // output will be 8, won't it?
// No -> 7
// because 7.99999999999999118 * 10, get floor is 7
// so ceil it will return 8
echo $x;
echo '<br>';
echo 'because 0.1 + 0.7 = 7.99999999999999118 due to binary thing <br>';
echo '<br>';

// But also there is problem in ceil
echo 'Float problem with ceil() when ceil((0.1 + 0.2) * 10), will it get 3 <br>';
$x = ceil((0.1 + 0.2) * 10); // output will be 3, won't it?
// No -> 4
// because 3.0000000000000004 * 10, ceil it will get 4
echo $x;
echo '<br>';
echo 'because 0.1 + 0.2 = .300000000000004 due to https://floating-point-gui.de/ <br>';
echo '<br>';

// ! So don't compare directly float value
$x = 0.23;
$y = 1 - 0.77; # 0.23
echo 'When Compare directly two float (0.23 and 1 - 0.77), it will always be different, So do not  <br>';
var_dump($x, $y);
echo '<br>';
if ( $x == $y ){
    echo 'yes';
}else{
    echo 'no';
} // ! return no
echo '<br>';
echo '<br>';

// NAN for not-a-number and INF for infinitive float value
echo 'Two special value of float <br>';
echo 'Value of log(-1) is : '.log(-1); # NAN
echo '<br>';
echo 'Value of PHP_FLOAT_MAX * 2 is : '.PHP_FLOAT_MAX * 2; # INF
echo '<br>';
var_dump(NAN, INF); # Float ( NAN / INF )
echo '<br>';
echo '<br>';

// ! Never compare directly to NAN or INF 
echo 'Do not compare them directly, use bellow <br>';
echo 'is_nan(log(-1)): ';
var_dump(is_nan(log(-1)));
echo '<br>';
echo 'is_infinite(PHP_FLOAT_MAX * 2): ';
var_dump(is_infinite(PHP_FLOAT_MAX * 2));
echo '<br>';
echo 'is_finite(PHP_FLOAT_MAX * 2): ';
var_dump(is_finite(PHP_FLOAT_MAX * 2)); // !infinite
echo '<br>';
echo '<br>';

// Convert Float 
echo 'Convert float <br>';
$x = 15; // 15
$x = '15'; // 15
$x = '15.5a'; // 15.5
$x = 'abc'; // 0
echo $x;