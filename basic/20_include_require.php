<?php

/** require / include / require_once / include_once */
echo 'Require / Include / Require_once / Include_once + file path <br>';

# include_path 
echo 'The difference between include/ require vs include_once/ require_once is<br>';
echo "<pre>
require 'files/file.php';
require 'files/file.php';
</pre>";
// require 'files/file.php'; # Execute
// require 'files/file.php'; # Execute
echo "<pre>
require_once 'files/file.php';
require_once 'files/file.php';
</pre>";
// require_once 'files/file.php'; # Do once 
// require_once 'files/file.php'; # Don't matter how many call, it won't execute
echo 'Hello World <br>';
echo '<br>';

echo 'The second difference between include/ require vs include_once/ require_once is <br>';
$x = 5;
echo `<pre>
\$x = 5;
require 'files/file.php'; // \$x++
echo \$x . '<br>'; // 6 
require 'files/file.php';
echo \$x . '<br>'; // 7

require_once 'files/file.php';
echo \$x . '<br>'; // 6
require_once 'files/file.php';
echo \$x . '<br>'; // 6
</pre>`;
// require 'files/file.php';
// echo $x . '<br>';
// require 'files/file.php';
// echo $x . '<br>';

// require_once 'files/file.php';
// echo $x . '<br>';
// require_once 'files/file.php';
// echo $x . '<br>';
echo '<br>';

echo 'File can return value to one including <br>';
$y = require 'files/file.php';
print_r($y);

echo '<br>';
echo 'File can return html to one including <br>';
ob_start();
require 'files/nav.php';
$nav = ob_get_clean();
$lang = [
    'a1232123' => 'Home',
    'a1232124' => 'About',
    'a1232125' => 'Contact'
];
var_dump($nav);

foreach( $lang as $key => $value){
    $nav = str_replace($key, $value, $nav);
}
var_dump($nav);