<?php

/* Loop */

# While 
echo 'While <br>';
echo 'Break 2 can break 2 level of while :<br> ';
$i = 0;
$txt = '<pre>
while (true):
    while ( $i > 10 ){
        break 2; 
    }
    echo $i++;
endwhile;
</pre>';
echo $txt;
while (true) :
    while ($i > 10) {
        break 2; // Break at level 2 - mean break out 2 loop
    }
    echo $i++;
endwhile;
echo '<br>';
$txt = '<pre>
while ($i <= 15):
    if ( $i % 2 === 0 ){ 
        $i++; 
        continue;
    }
    echo $i++;
endwhile;
</pre>';
echo $txt . '<br>';
$i = 0;
while ($i <= 15) :
    while ($i % 2 === 0) {
        $i++;
        continue; // Skip all line below it and limit by while block
    }
    echo $i++;
endwhile;
echo '<br>';
echo '<br>';

// do - while
echo 'Do while <br>';
echo '<br>';
$i = 0;
$txt = '<pre>
do {
    echo $i++;
} while ($i <= 15);
</pre>';
echo $txt . '<br>';
do {
    echo $i++;
} while ($i <= 15);
echo '<br>';
echo '<br>';


// for
echo 'For <br>';
echo 'for(;;) is while(true) <br>';
echo 'for( <1>;<2>;<3>) <1> run 1 time, <2> and <3> run with loop . All <1>, <2>, <3> can contain multiple command <br>';
$txt = '<pre> 
Debug purpose or lazy use 
for( $i = 0; print $i." ", $i < 15; $i++ ) {}
</pre>';
echo $txt . '<br>';
for( $i = 0; print $i." ", $i < 15; $i++ ) {}
echo '<br>';
$text = ['a','b','c','d'];
$txt = '<pre> 
$text = [a,b,c,d];
for( $i = 0, $length = count($text); $i < $length; $i++ ) 
    echo $text[$i]. " ";
</pre>';
echo $txt . '<br>';
for( $i = 0, $length = count($text); $i < $length; $i++ ) 
    echo $text[$i]. " ";
echo $i;
echo '<br>';
echo '<br>';

// foreach
echo 'Foreach <br>';
print_r($programingLanguages = ['php', 'java', 'c++', 'go', 'rust']);
$txt = '<pre> 
foreach($programingLanguages as $key => $language){
    echo $key : $language ;
}
</pre>';
echo $txt . '<br>';
foreach($programingLanguages as $key => &$language){
    echo $key . ': '. $language . '<br />';
}
echo '<br>';
$language = 'javascript'; # Language is still there, and point to last item of array
echo '$language is: '.$language.'<br>';
print_r($programingLanguages);
echo '<br>';

unset($language); # So must unset. 
$language = 'php';
echo 'unset($language)<br>';
echo '$language is: '.$language.'<br>';
print_r($programingLanguages);
echo '<br>';
$txt = '<pre> 
foreach($user as $key => $value) {
    echo $key json_encode($value) . <br/>;
}
</pre>';
echo $txt . '<br>';

$user = [
    'name' => 'Dai',
    'email' => 'dai@gmail.com',
    'skills' => ['php', 'graphql', 'react']
];

foreach($user as $key => $value) {
    echo $key .': '. json_encode($value) .'<br/>';
}
echo '<br>';

foreach($user as $key => $value) {
    if (is_array($value)){
        $value = implode(',', $value);
    }
    echo $key .': '. $value .'<br/>';
}
echo '<br>';

foreach($user as $key => $value):
    echo $key .': ';
    if (is_array($value)) {
        foreach($value as $skill){
            echo $skill.' - ';
        }
    } else {
        echo $value;
    }
    echo '<br>';
endforeach;    

echo '<br>';