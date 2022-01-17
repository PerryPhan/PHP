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

// Null can be key 
$array = [true => 'a', 1 => 'b', '1' => 'c', 1.8 => 'd', null => 'e'];

print_r($array);
echo '<br>';

echo $array[null]; # e
echo '<br>';
echo '<br>';

//  Index might not be continual
$array = ['a', 'b', 50 => 'c', 'd', 'e'];

print_r($array);
// Array functions 
echo '<br>';
echo '<br>';