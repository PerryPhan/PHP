<?php


require_once '../basic/0_overview.php';
require_once __DIR__ . '/vendor/autoload.php';

echo 'Introducing Abstract class <br>';
print_pre('
    Field : Abstract of 
    -    Text
    -    Boolean : Abstract of 
         +    Checkbox 
         +    Radio
');
print_pre('
$fields = [
    new \App\Text(\'textField\'),
    new \App\Checkbox(\'checkboxField\'),
    new \App\Radio(\'radioField\'),
];

foreach ($fields as $field){
    echo $field->render();
}
');
$fields = [
    new \App\Text('textField'),
    new \App\Checkbox('checkboxField'),
    new \App\Radio('radioField'),
];
foreach ($fields as $field) {
    echo $field->render() . '<br />';
}
two_br();

echo 'One thing to remind that Field is abstract, Boolean is a child of Field and abstract too, so Boolean do not need to be forced to declare abstract func <br>';
print_pre(
    '
abstract class Field
{
    public function __construct(protected string $name)
    {
        
    }

    abstract public function render(): string;
}
abstract class Boolean extends Field
{
    # work fine without declaring render() func 
}
'
);
two_br();

echo 'You can also overide argument to abstract function that do not have argument if only the argument has default value in order not to break the logic <br>';
print_pre(
    '
abstract class Field
{
    public function __construct(protected string $name)
    {
        
    }

    abstract public function render(): string;
}
class Text extends Field
{
    public function render(string $default = \'Dai\'): string
    {
        return <<<HTML
<input type="text" name="{$this->name}" placeholder="{$default}" />
HTML;
    }
}
'
);
echo $fields[0]->render();
two_br();
