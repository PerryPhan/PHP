<?php

declare(strict_types = 1 );
/**
 * Named function argument for App.php/returnFileContent()
 * @param string $content
 * @return string
*/ 
function compressAndApplyFormatRule(string $content): string
{
    return "<pre>$content</pre>";
}