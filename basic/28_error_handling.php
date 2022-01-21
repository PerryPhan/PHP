<?php 

/* Error handling*/
echo 'We can declare our own error handler function <br>';
function errorHandler(
    int $type,
    string $msg,
    ?string $file = null, 
    ?int $line = null
){
    echo $type . ': '.$msg. 'in ' . $file . ' on line '. $line;

    exit;
}

error_reporting(E_ALL & ~E_WARNING);

set_error_handler('errorHandler');

echo $x; 
// echo $x; But it's happen before set_error_handler it may come problem 