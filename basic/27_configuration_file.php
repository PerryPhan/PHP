<?php 
function print_pre($text){
    echo "<pre>$text</pre>";
}
/* php.ini & configuration */
echo 'Get information php.ini due to https://www.php.net/manual/en/ini.list.php <br>';
print_pre("
var_dump(ini_get('error_reporting'));
var_dump(ini_get('display_errors'));
var_dump(ini_get('max_execution_time'));
var_dump(ini_get('memory_limit'));
var_dump(E_ALL & ~E_DEPRECATED & ~E_STRICT);
");
// error_reporting, error_log, display_errors 
var_dump(ini_get('error_reporting'));
echo '<br>';
var_dump(ini_get('display_errors'));
echo '<br>';
var_dump(ini_get('max_execution_time'));
echo '<br>';
var_dump(ini_get('memory_limit'));
echo '<br>';
var_dump(E_ALL & ~E_DEPRECATED & ~E_STRICT);
echo '<br>';
echo 'Set information php.ini <br>';
print_pre("
ini_set('error_reporting', E_ALL & ~E_WARNING);
# Best step to do while in production
ini_set('display_errors', 0); # turn off this error waring; 
\$array[1];
");
ini_set('error_reporting', E_ALL & ~E_WARNING);
ini_set('display_errors', 0); 
