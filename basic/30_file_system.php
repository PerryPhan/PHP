<?php 
include_once '0_overview.php';
// Working with filesystem
echo 'Working with filesystem <br>';
echo 'To see which file in dir, use scandir(__DIR__) <br>';
print_pre('$dir = scandir(__DIR__);');
$dir = scandir(__DIR__);
var_dump($dir);
echo '<br>';
echo '<br>';

echo 'To know that is a file, use is_file(filename) <br>';
print_pre('var_dump(is_file($dir[2]));');
var_dump(is_file($dir[2]));
echo '<br>';
echo '<br>';

echo 'To know that is a dir, use is_dir(name) <br>';
print_pre('var_dump(is_dir($dir[2]));');
var_dump(is_dir($dir[2]));
echo '<br>';
echo '<br>';

// Making and Removing dir
echo 'To make new dir and remove dir, use mkdir() and rmdir() <br>';
print_pre('
mkdir(\'foo/bar\', recursive: true); // allow bar is nested dir 
rmdir(\'foo/bar\');
rmdir(\'foo\');
');
// mkdir('foo/bar', recursive: true);
// rmdir('foo');
echo '<br>';

// Working with files
echo 'Working with file, <br>
1) filesize( $file_path ) : <br>
2) clearstatcache( ) : <br>
3) file_put_contents( $file_name, $content ) : <br> 
';
print_pre('
$filename = \'foo.php\';
$filepath = \'files/\'.$filename;
if ( file_exists($filepath)){
    echo filesize($filepath);
    file_put_contents($filename, \'Hello World\');
    clearstatcache();
    echo filesize($filepath);
}else {
    echo \'File not found\';
}');
$filename = 'foo.php';
$filepath = 'files/'.$filename;
if ( file_exists($filepath)){
//     echo filesize($filepath).'<br>';
    // file_put_contents($filename, 'Hello World');
    // clearstatcache();
    echo filesize($filepath).'<br>';
}else {
    echo 'File not found';
}
echo '<br>';
echo '<br>';

echo 'Opening with file, using fopen(file_name, open_mode) : file|false <br>';
print_pre('
if( !file_exists(\'files/foo.txt\')){
    echo \'File not found\';
    return;    
}
$file = fopen(\'files/foo.txt\', \'r\');
');
if( !file_exists($filepath)){
    echo 'File not found';
    return;    
}
$file = fopen($filepath, 'r');
// $file = @fopen('foobar.txt', 'r'); // without throwing error 

echo 'Getting a line of file as string, using fgets(file) : string|false <br>';
print_pre('while (($line = fgets($file)) !== false){
    echo $line . \'<br>\';
}');
while (($line = fgets($file)) !== false){
    echo $line . '<br>';
}

echo 'Getting a line of file as array, using fgetcsv(file) : array|false <br>';
print_pre('while (($line = fgetcsv($file)) !== false){
    print_r($line);
    echo \'<br>\';
}');
fseek($file, 0);
while (($line = fgetcsv($file)) !== false){
    print_r($line);
    echo '<br>';
}
fclose($file);
echo '<br>';
echo '<br>';

echo 'To get and put the content to file, use file_get_content() and file_put_content <br>';
print_pre('
$filepath = \'files/file.txt\';
$content = file_get_contents($filepath, offset:3, length:2);
echo $content;
');
$filepath = 'files/file.txt';
$content = file_get_contents($filepath, offset:3, length:2);
echo $content;
echo '<br>';
print_pre('
file_put_contents($filepath, \'hello\');
file_put_contents($filepath, \'world\', FILE_APPEND);
$content = file_get_contents($filepath);
echo $content;
');
file_put_contents($filepath, 'hello ');
file_put_contents($filepath, 'world', FILE_APPEND);
$content = file_get_contents($filepath);
echo $content;
echo '<br>';
echo '<br>';

echo 'To delete , copy, rename file , use unlink(), copy(), rename() <br>';
print_pre('
$file = null;
if ( !file_exists($filepath) ){
    $file = fopen($filepath, \'w\');
}
$newfilepath = \'files/file2.txt\';
$newfilepath2 = \'files/file3.txt\';

# Comment one of three to see affect
copy($filepath, $newfilepath);
rename($newfilepath, $newfilepath2 );
unlink($newfilepath);
');
$file = null;
if ( !file_exists($filepath) ){
    $file = fopen($filepath, 'w');
}
$newfilepath = 'files/file2.txt';
$newfilepath2 = 'files/file3.txt';

# Comment one of three to see affect
copy($filepath, $newfilepath);
rename($newfilepath, $newfilepath2 );
unlink($newfilepath2);
