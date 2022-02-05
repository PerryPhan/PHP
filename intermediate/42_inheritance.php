<?php

use App\Toaster;
use App\ToasterPro;

require_once '../basic/0_overview.php';
require_once __DIR__ . '/vendor/autoload.php';

echo 'Related OOP topic : Inheritance <br>';
print_pre('
class Toaster
{
    public array $slices = [];
    public int $size = 2;

    public function addSlice(string $slice): void
    {
        if (count($this->slices) < $this->size) {
            $this->slices[] = $slice;
        }
    }

    public function toast()
    {
        foreach ($this->slices as $i => $slice) {
            echo ($i + 1) . \': Toasting \' . $slice . PHP_EOL;
        }
    }
}
$toaster = new Toaster();
$toaster->addSlice(\'bread\');
$toaster->addSlice(\'bread\');
$toaster->addSlice(\'bread\');
$toaster->addSlice(\'bread\');
$toaster->addSlice(\'bread\');
// only 2 been called 
');
echo 'How many addSlice called only 2 slice be toasted <br>';
$toaster = new Toaster();
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->toast();
echo 'So if u want $size to be 4, you must change or create another class ? <br>';
two_br();

echo 'Inheritance is born to solve that problem, the parent-child relationship, the child class will extend upon what parent class have. <br>';
print_pre('
class ToasterPro extends Toaster
{
    public int $size = 4; // couldn\'t overide parrent private properties or method

    public function toastBagel()
    {
        foreach ($this->slices as $i => $slice) {
            echo ($i + 1) . \': Toasting \' . $slice .\' with bagels option \'. PHP_EOL;
        }
    }
}
');
$toaster = new ToasterPro();
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->toastBagel();
two_br();

echo 'Child class can also overide protected or function class and magic function too as __construct() <br>';
print_pre('
class Toaster
{
    protected array $slices;
    protected int $size;
    public function __construct()
    {
        $this->slices = [];
        $this->size = 2;
    }
}
class ToasterPro extends Toaster
{
    public function __construct()
    {
        parent::__construct(); // This to initial the rest variable value
        $this->size = 4;
    }
}
');
echo 'But overiding function may cause some bug during process, so be wise to use <br>';
two_br();

echo 'Also parent can not use the method or properties of the child. <br>';
print_pre('
# we have 
function foo(Toaster $toaster)
{
    $toaster->toastBagel();
}
# use case 
foo(new Toaster()) # error : cause parent class - Toaster do not have toastBagel() method 
foo(new ToasterPro()) # worked
');
function foo(Toaster $toaster)
{
    $toaster->toastBagel();
}
