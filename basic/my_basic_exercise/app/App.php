<?php

declare(strict_types=1);

/**
 * Go to specified dir, scandir and take files' path out 
 * @param string $dirPath
 * @return array
*/ 
function returnFileListFromDir(string $dirPath): array
{
    if( !$dirPath ) return [];
    $fileList = [];
    foreach ( scandir($dirPath) as $file){
        if (is_dir($file)) {     # Best practice : Check the dir when scaning dir
            continue;
        }
        $fileList[] = $dirPath. $file ;
    }
    return $fileList;
}

/**
 * Go to the file, read all content and pre it 
 * @param string $filePath
 * @return string
*/ 
function returnFileContent(string $filePath, ?callable $contentHandler = null): string
{
    if( !file_exists($filePath) ) return [];
    $file = fopen($filePath, 'r');
    $content = '';
    while (($line  = fgets($file)) !== false) {
        $content .= $line."<br>";
    }
    return $contentHandler ? $contentHandler($content) : $content;
}