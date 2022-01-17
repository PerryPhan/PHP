<?php

// ARRAYS

$programingLanguages = ['PHP', 'Java', 'Python'];
echo 'We have programing languages like below';
var_dump($programingLanguages);
echo '<br>';
echo '<br>';

$name = 'Dai';

echo 'This is indexing in string <br>';
echo $name[1];
echo '<br>';
echo '<br>';

echo 'Check if it out of bound $programingLanguages[3] <br>';
var_dump(isset($programingLanguages[3]));
echo '<br>';
echo '<br>';

echo 'Using count() to know quantity of array <br>';
var_dump(count($programingLanguages));
echo '<br>';
echo '<br>';

echo '2 ways to insert item to array is (array_push() is recommended): <br>';
echo 'Do array_push($programingLanguages, C++, C, GO); <br>';
array_push($programingLanguages, 'C++', 'C', 'GO');
echo 'Do $programingLanguages[] = <item>; <br>';
$programingLanguages[] = 'Brainf';
echo '<br>';
echo '<br>';

echo 'If we put in <b>pre</b> block, it will go like this <br>';
echo '<pre>';
print_r($programingLanguages);
echo '</pre>';
echo '<br>';

echo 'Also string variable can be defined in array : <br>';
$java = 'Java';
$programingLanguages[$java] = 'Dai';
print_r($programingLanguages);
echo '<br>';
echo '<br>';

echo 'Multi-dimensional array : <br>';
$programingLanguages = [
    'php' => [
        'creator' => $dai ?? null,
        'extension' => ".php" ,
        'website' => "www.php.net",
        'isOpenSource'=> true,
        'versions'=>[
            ['version'=>3.9, 'releaseDate'=>"Oct 5, 2020"],
            ['version'=>3.8, 'releaseDate'=>"Oct 14, 2020"],
        ]
    ],
    'python' => [
        'creator' => 'Guido Van Rossum',
        'extension' => '.py',
        'website' => 'www.python.org',
        'isOpenSource'=> true,
        'versions'=>[
            ['version'=>3.9, 'releaseDate'=>'Oct 5, 2020'],
            ['version'=>3.8, 'releaseDate'=>'Oct 14, 2020'],
        ]
    ]
];
echo $programingLanguages['php']['versions'][0]['releaseDate'];
// echo $programingLanguages['php']['versions'][3]['releaseDate']; // If don't have that index, it will warning. 
echo '<br>';
echo '<br>';

// Null can be key
echo 'Null can also be key, when it work when declare this :';
$array = [true => 'a', 1 => 'b', '1' => 'c', 1.8 => 'd', null => 'e'];
print_r($array);
echo '<br>';

echo 'The value of $array[null]: ' ;
echo $array[null]; # e
echo '<br>';

echo "If string and int key in array can be convert to same int index like this [1 => 'b', '1' => 'c', 1.8 => 'd'], it will be replace with the last value : ";
$array = [1 => 'b', '1' => 'c', 1.8 => 'd'];
print_r($array);
echo '<br>';
echo '<br>';

//  Index might not be continual
echo "It is possible when declare index as u like ['a', 'b', 50 => 'c', 'd', 'e'] : ";
$array = ['a', 'b', 50 => 'c', 'd', 'e'];
print_r($array); # 51 => .., 'd', 52 => 'e'
echo '<br>';
echo '<br>';

// Way to delete array's item but can keep the index 
echo "2 Way to delete array's item but can keep the index : 1. unset , 2. array_shift <br>";
echo 'Unset delete item but keep the index, do unset($array[50], $array[1]); <br>';
unset($array[50], $array[1]); 
print_r($array); # 0 => 'a', 51 => 'd', 52 => 'e'
echo '<br>';
echo '<br>';

// So when append it, index will begin at index after deleted
echo 'So when u unset all value, and append new value, index value will be continuous <br>';
$array = [1, 2, 3];
unset($array[0], $array[1], $array[2]); 
$array[] = 1; 
print_r($array); # 3 => 1  
echo '<br>';
echo '<br>';

echo 'array_shift delete, get first item and rearrange allthe index, do array_shift($array); <br>';
$array = ['a', 'b', 50 => 'c', 'd', 'e'];
$a = array_shift($array);
print "$a <br>";
print_r($array); # 0 => 'b', 1 => 'c', 2 => 'd', 3 => 'e'
echo '<br>';
echo '<br>';


// How to know that key is exist : two ways ( but a little different in use )
$array = ['a'=> 1, 'b'=> null ];
var_dump(array_key_exists('a',$array)); # bool(true)
var_dump(isset($array['a'])); # bool(true)
// But 
var_dump(array_key_exists('b',$array)); # bool(true) - it only requires the key existed.
var_dump(isset($array['b'])); # bool(false) - it will require the key existed and not null.  

echo '<br>';
echo '<br>';