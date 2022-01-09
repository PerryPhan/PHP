<?php

// NULL

// null constant
$x = null;

// is_null
echo is_null($x);

// null convert to other
echo 'To int '.var_dump((int)$x).'<br>';
echo 'To boolean '.var_dump((bool)$x).'<br>';
echo 'To string '.var_dump((string)$x).'<br>';
echo 'To array '.var_dump((array)$x).'<br>';
