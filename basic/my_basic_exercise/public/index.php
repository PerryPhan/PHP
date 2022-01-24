<?php 

declare(strict_types = 1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'sample' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);
/*

TODO: 
Tạo 1 thứ gì đó đơn giản, chỉ có nút import 
Xuất ra những gì trong file PHP theo string
 
*/
/* YOUR CODE */
require APP_PATH . 'App.php';
require APP_PATH . 'helpers.php';
/* PROCESSING YOUR CODE -> PASS VARIABLE -> RENDER VIEW */
$fileList = returnFileListFromDir(FILES_PATH);
foreach ($fileList as $file){
    try{
        echo( returnFileContent($file) );
    }catch(Exception $e){
        continue;
    }
}
// require VIEWS_PATH . 'main.php';
