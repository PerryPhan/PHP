<?php 
require_once '../basic/0_overview.php';
require_once __DIR__ . '/vendor/autoload.php';

use App\PaymentGateway\Paddle\Transaction;

echo 'Static properties <br>';
echo 'We have private static variable in this class, like this<br>';
print_pre('
class Transaction{
    
    private static int $count = 0; // <- here

    // ...

    public function __construct()
    {
        # 40 Uncomment to test this -------------------------------------------------
        self::$count++;
    }

    /**
     * Get the value of count
     */ 
    public static function getCount()  // <- its getter function 
    {
        return self::$count;
    }
}
');
two_br();
echo 'We can called it out by Class::static_var <br>';
echo 'The inital Transaction::getCount() is : '.Transaction::getCount().'<br>';
print_pre('
$transaction = new Transaction();
');
$transaction = new Transaction();
echo 'The +1 $transaction::getCount() is '.$transaction::getCount().'<br>';
two_br();

use App\DB;
echo 'The usecase of static is when u declare the private constructor ( the skeleton design pattern ). <br>';
print_pre('
namespace App;

class DB
{
    public static ?DB $instance = null;

    private function __construct()
    {
        echo \'DB Instance created <br>\';
    }

    public static function getInstance(array $config):DB
    {
        if(self::$instance === null){
            self::$instance = new DB($config);
        }

        return self::$instance;
    }
}
');
echo 'So when we call : <br>';
print_pre('
$db = DB::getInstance([]);
$db = DB::getInstance([]);
$db = DB::getInstance([]);
$db = DB::getInstance([]);
$db = DB::getInstance([]);
$db = DB::getInstance([]);
');
$db = DB::getInstance([]);
$db = DB::getInstance([]);
$db = DB::getInstance([]);
$db = DB::getInstance([]);
$db = DB::getInstance([]);
$db = DB::getInstance([]);

