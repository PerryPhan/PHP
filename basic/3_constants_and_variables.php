<?php 
# Constants 

# There are 2 ways to define a constant
define('STATUS_PAID', 'paid');
# and 
const status = 'paid';

# Differences
if(true){
    // const FOO = 'bar'; # -> error, cause it defined in the compiler time
    define('FOO_DEFINE', 'BAR'); # defined when run time
}

# Can know that constant is defined with function defined
echo defined('FOO_DEFINE');

# Also dynamic naming constant
$dai = 'DAI';
define('PHAN_'.$dai, $dai);
echo PHAN_DAI.'<br>'; # but const can't do this right ?

# Constant also has Predefined and Magic one
echo 'Predefined Constant PHP_VERSION value : '.PHP_VERSION.'<br>';
echo 'Magic Constant __LINE__ value : '.__LINE__.'<br>';

# Variable Variables
# $ is only way to declare a variable, so double it ?
$foo = 'bar';
$$foo = 'barz'; # Mean $bar = 'barz'

echo "$foo , $bar <br>";
echo "$foo , ${$foo} <br>";
echo "$foo , {$$foo} <br>";