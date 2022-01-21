<?php

/** 
 * Array Function 
 * array_chunk(array $array, int $length, bool $preverseKeys - giữ key = false): array
 * 
 */
function prettyPrintArray(array $value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}
//  array_chunk(array $array, int $length, bool $preverseKeys = false): array
echo 'array_chunk(array $array, int $length, bool $preverseKeys = false): array
<pre>
$items = [\'a\' => 1, \'b\' => 2, \'c\' => 3, \'d\' => 4, \'e\' => 5];
prettyPrintArray(array_chunk($items, 2));
</pre>';
$items = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
prettyPrintArray(array_chunk($items, 2));
echo '<pre>
prettyPrintArray(array_chunk($items, 2, true));
</pre>';
prettyPrintArray(array_chunk($items, 2, true));
echo '<br>';

// array_combine(array $keys, array $values):array
echo 'array_combine(array $keys, array $values): array 
<pre>
$array1 = [\'a\', \'b\', \'c\']; # Must be same length as 2nd array. 
$array2 = [5, 10, 15];
prettyPrintArray(array_combine($array1, $array2));
</pre>
';
$array1 = ['a', 'b', 'c'];
$array2 = [5, 10, 15];
prettyPrintArray(array_combine($array1, $array2));

// array_filter(array $array, callable|null $callback = null, int $mode = 0): array
echo 'array_filter(array $array, callable|null $callback = null, int $mode = 0): array
<pre>
$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$even = array_filter($array, fn($number, $key) => $number % 2 === 0, ARRAY_FILTER_USE_BOTH); # ARRAY_FILTER_USE_BOTH allow to use $key
prettyPrintArray($even);
</pre>
';
$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$even = array_filter($array, fn ($number, $key) => $number % 2 === 0, ARRAY_FILTER_USE_BOTH);
prettyPrintArray($even);
echo '<pre>
$array = [1, 2, 3, 4, 5, 6, 7, false, [], 8, 9, 10];
$even = array_filter($array);
$even = array_values($even);
prettyPrintArray($even);
</pre>';
$array = [1, 2, 3, 4, 5, 6, 7, false, [], 8, 9, 10];
$even = array_filter($array);
$even = array_values($even);
prettyPrintArray($even);

// array_keys(array $keys, mixed $search_value, bool $strict = false):array
echo 'array_keys(array $keys, mixed $search_value, bool $strict = false):array
<pre>
$array = [\'a\' => 5, \'b\' => 10, \'c\' => 15, \'d\' => 5, \'e\' => 10];
$keys = array_keys($array, 10);
prettyPrintArray($keys);
$keys = array_keys($array, \'10\'); // equal with conversion
prettyPrintArray($keys);
$keys = array_keys($array, \'10\', true); // equal type and value by strict_type on
prettyPrintArray($keys);
</pre>';
$array = ['a' => 5, 'b' => 10, 'c' => 15, 'd' => 5, 'e' => 10];
$keys = array_keys($array, 10);
prettyPrintArray($keys);
$keys = array_keys($array, '10');
prettyPrintArray($keys);
$keys = array_keys($array, '10', true);
prettyPrintArray($keys);

// array_map(callable|null $callback, array $array, array ...$arrays):array
echo 'array_map(callable|null $callback, array $array, array ...$arrays):array
<pre>
$array1 = [\'a\' => 1, \'b\' => 2]; // null => null ] if not enough length 
$array2 = [\'d\' => 4, \'e\' => 5, \'f\' => 6];
$array = array_map(fn($number1, $number2) => $number1 * $number2, $array1, $array2);
prettyPrintArray($array);
</pre>';
$array1 = ['a' => 1, 'b' => 2]; // null => null
$array2 = ['d' => 4, 'e' => 5, 'f' => 6];
$array = array_map(fn ($number1, $number2) => $number1 * $number2, $array1, $array2);
prettyPrintArray($array);

// array_merge(array ...$arrays): array
echo 'array_merge( array ...$arrays)
<pre>
$array1 = [1,2,3];
$array2 = [6 => 4,7 => 5,8 => 6]; # it\'s not overide if same numeric key
$array3 = [7,8,9];
$merge = array_merge($array1, $array2, $array3);
prettyPrintArray($merge);
</pre>';
$array1 = [1, 2, 3];
$array2 = [6 => 4, 7 => 5, 8 => 6]; # it's not overide if same numeric key
$array3 = [7, 8, 9];
$merge = array_merge($array1, $array2, $array3);
prettyPrintArray($merge);
echo '<pre>
$array1 = [1,2,3];
$array2 = [\'a\' => 4,\'b\' => 5,\'c\' => 6]; # it\'s overide if its key is not numeric
$array3 = [7,8,9, \'b\'=> 10];
$merge = array_merge($array1, $array2, $array3);
prettyPrintArray($merge);
</pre>';
$array1 = [1, 2, 3];
$array2 = ['a' => 4, 'b' => 5, 'c' => 6]; # it's not overide if same numeric key
$array3 = [7, 8, 9, 'b' => 10];
$merge = array_merge($array1, $array2, $array3);
prettyPrintArray($merge);

// array_reduce(array $array, callable $callback, mixed $initialValue = null): mixed
echo 'array_reduce(array $array, callable $callback, mixed $initialValue = null): mixed';
echo '<pre>
$invoiceItems = [
    [\'price\' => 9.99, \'qty\' => 3, \'desc\' => \'Item 1\'],
    [\'price\' => 29.99, \'qty\' => 1, \'desc\' => \'Item 2\'],
    [\'price\' => 149, \'qty\' => 1, \'desc\' => \'Item 3\'],
    [\'price\' => 14.99, \'qty\' => 2, \'desc\' => \'Item 4\'],
    [\'price\' => 4.99, \'qty\' => 4, \'desc\' => \'Item 5\']
];

$total = array_reduce(
    $invoiceItems, 
    fn ($sum, $item) => $sum + $item[\'qty\'] * $item[\'price\'], // sum is the static variable
    500 // initial value 
);

</pre>';
$invoiceItems = [
    ['price' => 9.99, 'qty' => 3, 'desc' => 'Item 1'],
    ['price' => 29.99, 'qty' => 1, 'desc' => 'Item 2'],
    ['price' => 149, 'qty' => 1, 'desc' => 'Item 3'],
    ['price' => 14.99, 'qty' => 2, 'desc' => 'Item 4'],
    ['price' => 4.99, 'qty' => 4, 'desc' => 'Item 5']
];

$total = array_reduce(
    $invoiceItems, 
    fn ($sum, $item) => $sum + $item['qty'] * $item['price'], // sum is the static variable
    500 // initial value 
);

echo $total .'<br>';

// array_search(mixed $needle, array $haystack, bool $strict = false): int|string|false
echo 'array_search(mixed $needle, array $haystack, bool $strict = false): int|string|false
<pre>
$array = [\'a\',\'b\',\'c\',\'D\', \'E\', \'ab\', \'bc\', \'cd\', \'b\', \'d\'];

$key = array_search(\'a\', $array); // 0
echo $key;
$key = array_search(\'b\', $array); // 1 // not 8 
echo $key;
$key = array_search(\'d\', $array); // 9 // not 4 (\'D\') 
echo $key;
</pre>';

$array = ['a','b','c','D', 'E', 'ab', 'bc', 'cd', 'b', 'd'];

$key = array_search('a', $array); // 0
echo $key;
echo '<br>';
$key = array_search('b', $array); // 1 // not 8 
echo $key;
echo '<br>';
$key = array_search('d', $array); // 9 // not 4 ('D') 
echo $key;
echo '<br>';

echo 'There is another way to check if it exists in array : in_array() 
<pre>
if ( in_array(\'a\',$array) ){
    echo \'Letter found\';
}
</pre>';
if ( in_array('a',$array) ){
    echo 'Letter found';
}

// array_diff(array ...$arrays): array
echo 'array_diff(array ...$arrays): array
<pre>
$array1 = [\'a\'=>1,\'b\'=>2,\'c\'=>3,\'d\'=>4,\'e\'=>5];
$array2 = [\'f\'=>4,\'g\'=>5,\'i\'=>6,\'j\'=>7,\'k\'=>8];
$array3 = [\'l\'=>3,\'m\'=>9,\'n\'=>10];

prettyPrintArray(array_diff($array1, $array2, $array3)); // check different in value 
prettyPrintArray(array_diff_assoc($array1, $array2, $array3)); // check differences in value and in key 
</pre>';
$array1 = ['a'=>1,'b'=>2,'c'=>3,'d'=>4,'e'=>5];
$array2 = ['f'=>4,'g'=>5,'i'=>6,'j'=>7,'k'=>8];
$array3 = ['l'=>3,'m'=>9,'n'=>10];

prettyPrintArray(array_diff($array1, $array2, $array3)); // check differences in value 
prettyPrintArray(array_diff_assoc($array1, $array2, $array3)); // check differences in both value and key 

// Sorting in array
echo 'Sorting in array <br>
1) asort(array) : Sorting by value <br>
2) ksort(array) : Sorting by key <br>
3) usort(array, callable ) : Custom sorting 
<pre>
$array = [\'d\' => 3, \'b\' => 1, \'c\' => 4, \'a\' => 2];
prettyPrintArray($array);
asort($array); 
prettyPrintArray($array);
ksort($array); 
prettyPrintArray($array);
usort($array, fn($a, $b) => $a <=> $b ); // sort by increasing
prettyPrintArray($array);
usort($array, fn($a, $b) => $b <=> $a ); // sort by decreasing
prettyPrintArray($array);
</pre>';

$array = ['d' => 3, 'b' => 1, 'c' => 4, 'a' => 2];
prettyPrintArray($array);
asort($array);
prettyPrintArray($array);
ksort($array); 
prettyPrintArray($array);
usort($array, fn($a, $b) => $a <=> $b ); // sort by increasing
prettyPrintArray($array);
usort($array, fn($a, $b) => $b <=> $a ); // sort by decreasing
prettyPrintArray($array);

// Unpacking array 
echo 'Unpacking array 
<pre>
# Full unpack 
[$a, $b, $c, $d] = $array;
echo $a.\'-\'.$b.\'-\'.$c.\'-\'.$d;

# Skip unpack
[$a, , $c, ] = $array; 
echo $a.\'-\'.$c;

# Nested unpack
$array = [1, 2, [3, 4]];
[$a, $b, [$c, $d]] = $array;
echo $a.\'-\'.$b.\'-\'.$c.\'-\'.$d; 
echo \'<br>\'; 

# Object unpack
$array = [1,2,3];
[1 => $a, 0 => $b, 2 => $c] = $array;
echo $a.\'-\'.$b.\'-\'.$c; 
</pre>';
$array = [1, 2, 3, 4];
# Full unpack 
[$a, $b, $c, $d] = $array;
echo $a.'-'.$b.'-'.$c.'-'.$d;
echo '<br>'; 

# Skip unpack
[$a, , $c, ] = $array; 
echo $a.'-'.$c; 
echo '<br>'; 

# Nested unpack
$array = [1, 2, [3, 4]];
[$a, $b, [$c, $d]] = $array;
echo $a.'-'.$b.'-'.$c.'-'.$d; 
echo '<br>'; 

# Object unpack
$array = [1,2,3];
[1 => $a, 0 => $b, 2 => $c] = $array;
echo $a.'-'.$b.'-'.$c; 
