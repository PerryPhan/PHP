<?php 
declare(strict_types=1);

/** return / declare / goto */
echo 'Return <br>';
echo 'Return inside func block that end the function not end the whole script program <br>';
function dai(){
    return 1;
}
// return ;
$dai = dai();
echo '<br>';
echo 'If return globally, Hello World will not be printed';

echo 'Declare - 3 types ( tick, encoding, strict_type )<br>';
echo 'About tick<br>';

function onTick(){
    echo 'Tick<br/>';
}

register_tick_function('onTick');
declare(ticks = 3);
echo 'Tick will do function every number of steps been executed <br>';
$i = 0;
$length =10;
$txt = '<pre>
while ($i < $length){
    echo $i++ . \'<br>\';
}</pre>';

while ($i < $length){
    echo $i++ . '<br>';
}
function sum(int $x, int $y){
    return $x + $y;
}
echo '<pre>
function sum(int $x, int $y){
    return $x + $y;
}
</pre>';
echo 'When strict type is on, echo sum(\'5\', 10); returns error <br>';
// echo sum('5', 10); // -> error
