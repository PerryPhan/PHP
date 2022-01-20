<?php
declare(strict_types=1);

// Functions 
echo 'Functions <br>';
// Hoisting
echo 'Hoisting function, function can be called before its declare if it is called in the file which declare it without statement <br>';
var_dump(foo1());

function foo1(){
    return 'Hello World';    
}
echo "<pre>
# So this hoisting is causing error
include 'files/file.php'; #error
var_dump(foo1()); # error 
    if(false/ true){
        function foo1(){
            return 'Hello World';
        }
    }
</pre>";

echo 'Declare nesting function but can use it globally ';
echo '<pre>
function foo2()
{
    echo \'Foo\';
    function bar() {
        echo \'Bar\';
    }
}
foo2();
bar(); #work
</pre>';
function foo2(){
    echo 'Foo';
    function bar() {
        echo 'Bar';
    }
}
foo2();
bar();
echo '<br>';

echo 'But can not <br>';
echo '<pre>
    bar(); #error
    foo2(); 
    # Because till foo2() declare, bar() declare later
</pre>';
echo '<br>';
echo 'That lead to <br>';
echo '<pre>
function foo3()
{
    echo \'Foo\';
    function bar() {
        echo \'Bar\';
        function foo3(){
            echo \'Foo\';
        }
    }
}
foo3();
bar(); # Show error can not redeclare foo3() 
</pre>';
echo '<br>';

echo 'Return types and strict types <br>';
echo 'In PHP 8.0, it can return multiple type seperate by | <br>';
echo '<pre>
function foo(): int { # without strict_type
    return \'1\'; # work
}
function foo(): null|int|float { # or :mixed for any
    return 1.2;
}
</pre>';
function foo(): null|int|float {
    return 1.2;
}
var_dump(foo());
