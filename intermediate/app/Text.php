<?php

declare(strict_types=1);

namespace App;

class Text extends Field
{
    public function render(string $default = 'Dai'): string
    {
        return <<<HTML
<input type="text" name="{$this->name}" placeholder="{$default}" />
HTML;
    }
}
