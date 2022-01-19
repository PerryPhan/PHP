<?php

/* Switch */
$paymentStatus = 'paid';
$paymentStatus = '1';
$paymentStatus = true;
echo 'Switch statement : <br>';
switch ($paymentStatus) { // loose comparasion
    case 'paid':
    case 1:
        echo 'Paid';
        break;

    case 'declined':
    case 2:
    case 'rejected':
    case 3:
        echo 'Payment Declined';
        break;

    case 'pending':
    case 0:
        echo 'Pending Payment';
        break;

    default:
        echo 'Unknown Payment Status';
}
$paymentStatuses = [1, 3, 0]; // as same as [ true, 3 ,false]
foreach ($paymentStatuses as $paymentStatus) {
    switch ($paymentStatus) {
        case 1:
            echo 'Paid';
            break 2;

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
}
echo 'The big difference between switch and if elseif is that it only called once <br>';
echo 'Example : <br>';
echo '<pre> 
function x(){
    sleep(3);
    echo \'Done <br>\';
    return 3;
</pre>';
echo 'If using if <br>';
echo '<pre> 
    if ( x() === 1 ) {
        echo 1; 
    }elseif ( x() === 2 ){
        echo 2;
    }elseif ( x() === 3 ){
        echo 3;
    }else {
        echo 4;
    }
</pre>';
function x()
{
    sleep(3);
    echo 'Done <br>';
    return 3;
}
echo '<br>';
echo 'It takes 9 second to do it or have to declare a variable <br>';
echo 'With switch <br>';
echo '<pre> 
    switch( x() ){
        case 1 : echo 1; break;
        case 2 : echo 2; break;
        case 3 : echo 3; break;
        default: echo 4; break;
    }
</pre>';

switch (x()) {
    case 1:
        echo 1;
        break;
    case 2:
        echo 2;
        break;
    case 3:
        echo 3;
        break;
    default:
        echo 4;
        break;
}
echo '<br>';
echo 'It only takes 3 second to do it <br>';
