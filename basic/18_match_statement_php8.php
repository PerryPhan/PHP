<?php

/* Match */
$paymentStatus = 1;
echo 'Match statement introduced in PHP 8.0 : <br>';
echo 'Switch : ';
switch ($paymentStatus) { // loose comparasion
    case 1:
        echo 'Paid';
        break;

    case 2:
    case 3:
        echo 'Payment Declined';
        break;

    case 0:
        echo 'Pending Payment';
        break;

    default:
        echo 'Unknown Payment Status';
}
echo '<br>';
$txt= '<pre>
$paymentStatusDisplay = match($paymentStatus){
    1 => \'Paid\',
    2,3 => \'Payment Declined\',
    0 => \'Pending Payment\',
};</pre>';
$paymentStatusDisplay = match($paymentStatus){
    1 => 'Paid',
    2,3 => 'Payment Declined',
    0 => 'Pending Payment',
};
echo $txt;
echo '<br>';
echo 'Match : '.$paymentStatusDisplay;
echo '<br>';
echo 'Match is different from switch is if there is no default config and has some value not same as configured, match will caught error, switch won\'t ( example: 5 ): <br>';
$paymentStatus = 5;
echo 'Switch : ';
switch ($paymentStatus) { // loose comparasion
    case 1:
        echo 'Paid';
        break;

    case 2:
    case 3:
        echo 'Payment Declined';
        break;

    case 0:
        echo 'Pending Payment';
        break;
}
echo '<br>';
echo 'Match : #error';
// $paymentStatusDisplay = match($paymentStatus){
//     1 => 'Paid',
//     2,3 => 'Payment Declined',
//     0 => 'Pending Payment',
// }; // -> error
echo '<br>';
echo 'So u must declare default value when using match <br>';
echo 'Match is strict comparasion due to switch, so value must have same type as config <br>';
$txt= '<pre>
$paymentStatusDisplay = match($paymentStatus){
    1 => \'Paid\',
    2,3 => \'Payment Declined\',
    0 => \'Pending Payment\',
    default => \'Unknown Payment Status\'
};</pre>';
echo $txt;
$paymentStatusDisplay = match($paymentStatus){
    1 => 'Paid',
    2,3 => 'Payment Declined',
    0 => 'Pending Payment',
    default => 'Unknown Payment Status'
};
echo $paymentStatusDisplay;
echo '<br>';
echo 'Also u can do this <br>';
$paymentStatus = false;
$txt= '<pre>
$paymentStatusDisplay = match($paymentStatus){
    1 > 2 => \'Paid\',
    2,3 => \'Payment Declined\',
    0 => \'Pending Payment\',
    default => \'Unknown Payment Status\'
};</pre>';
echo $txt.'<br>';
$paymentStatusDisplay = match($paymentStatus){
    1 > 2=> 'Paid',
    2,3 => 'Payment Declined',
    0 => 'Pending Payment',
    default => 'Unknown Payment Status'
};
echo $paymentStatusDisplay . '<br>';
echo 'Match is for declaring variables so it can\'t contain more than one thing, but switch can. So use it wisely ';