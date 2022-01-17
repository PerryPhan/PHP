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

