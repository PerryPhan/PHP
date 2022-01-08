<?php

# 1- Echo and Print - Way to display in PHP 
echo "Echo Hello World <br>"; print("Echo Hello World in bracket \() <br>");
# vs
print "Print Hello World <br>"; print("Print Hello World in bracket \() <br>");

# Echo can do this, also return what print function return which is '1' after 'Hello World'
echo print "Echo Print Hello World ";
echo '<br>';
# but not print echo
// print echo 'Print Echo Hello World'; # -> error

# Variables in PHP  ( ^[a-zA-Z_][0-9]$, no $this  )
$a = 0 ;
$_123a = 0;
// $this = 2; # error 

# 2- Variables that pass by value not by preference 
$x = 1;
$y = $x;

$x = 3; 
echo '<br>Y passed by value :'.$y;

$y = &$x;

$x = 3; 
echo '<br>Y passed by preference :'.$y;

# 3-Variables can be pass in str by 
$inserted = 'Dai';
echo "<br>You can know my name with \$inserted value $inserted ";

?>