<?php 

/* STRINGS */

$firstName = 'Phan';
$lastName = 'Dai';

// Way to concat string
$name = "{$firstName} Dai";
$name = "$firstName Dai";

echo $name.'<br/>';

// Way to get/set index char
echo 'At index 1 : '.$name[1].'<br>';
echo 'Set at index 15 : <br>';
$name[15] = 'I';
echo $name.'<br>';
echo '<br>';

// Heredoc 
echo 'Heredoc : <br>';
$x = 1;
$y = 2;
$text = <<<end
Line 1 $x
Line 2 $x 
end;

echo nl2br($text);
echo '<br>';

// Nowdoc - no variable render  
echo 'Nowdoc : <br>';
$text = <<<'end'
Line 1 $x
Line 2 $x 
end;
echo nl2br($text);
echo '<br>';

// Use case for nowdoc and heredoc is 
$text = <<<html
<div>
    <p> Phan Dai </p>
    <p> 30/08/1999 </p>
</div>
html;
echo nl2br($text);
echo '<br>';

// Just remind tab in here & nowdoc is count
$text = <<<html
Hello World 
html;
var_dump($text);
echo '<br>';
$text = <<<html
    Hello World 
html;
var_dump($text);