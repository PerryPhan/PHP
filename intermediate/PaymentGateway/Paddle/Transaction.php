<?php 

namespace PaymentGateway\Paddle;

class Transaction{

    public function __construct()
    {
        # 37_namespace.php - Uncomment to test it ---------------------------------------
        echo ' <br> <b> Contruct in PaymentGateway\Paddle\Transaction </b> <br>';
        echo ' new CustomerProfile() : ';
        var_dump( new CustomerProfile() ); # require_once in the index
        echo '<br>';

        echo ' new \DateTime() : ';
        var_dump( new \DateTime());
        echo '<br>';
        
        echo ' new Datetime() : ';
        var_dump( new Datetime()); # automatically finding in local       
        echo '<br>';
        echo '<br>';
        
        echo ' new Notification\Email()  : Error : cuz there is no result in finding PaymentGateway\Paddle\Notification\Email <br>';
        echo ' new \Notification\Email() : Work  : use fully qualified ns will work';
        var_dump( new \Notification\Email()); # automatically finding in local       
        echo '<br>';
        echo '<br>';

        echo 'But everything is a difference story in using global function <br>';
        echo '<pre> var_dump(explode(\',\', \' hello,world \'); 
                // still work cause it is got from global
                // but when overide it in local, still need \'\\\' to know it global or not </pre>';
        var_dump(\explode(',', ' hello,world '));
        echo '<br>';
        echo '<br>';

        // If CustomerProfile not require_once in index or in this file -> error 
        // If it does not have namespace, begin with '\' for glocal namespace, this apply to global class ( like \Datetime() )
        // Classes which have the same name but not namespace can be two seperated classes 
    
    
    }

    # 37_namespace.php - Uncomment to test it ---
    public function explode($seperator, $string){
        echo 'Foo';
    }

}