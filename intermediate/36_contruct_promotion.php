<?php 

declare(strict_types = 1);
include_once('../basic/0_overview.php');
//Constructor Property Promotion
class Transaction
{
    private float $amount;
    // In PHP 8.0, you can declare properties as argument of construct with full options  
    // The advanced of this declare, is you can use type callable, which is impossible in normal declaring
    // Ex: callable $description ( but not public/private callable $description )
    public function __construct(
        float $amount,
        private ?string $description,
        // callable $handler
    )
    {
        $this->amount = $amount;
    }
}
print_pre('
//Constructor Property Promotion
class Transaction
{
    private float $amount;
    // In PHP 8.0, you can declare properties as argument of construct with full options  
    // The advanced of this declare, is you can use type callable, which is impossible in normal declaring
    // Ex: callable $description ( but not public/private callable $description )
    public function __construct(
        float $amount,
        private ?string $description,
        // callable $handler
    )
    {
        $this->amount = $amount;
    }
}
$tran = new Transaction(5, \'Transaction 1\');
');
$tran = new Transaction(5, null);
echo '<br>';
echo '<br>';

//  Nullable operator
echo 'Nullable operator<br>';
class PaymentProfile
{
    public ?int $id = null;
} 

class Customer
{
    private ?PaymentProfile $paymentProfile = null;

    /**
     * Set the value of paymentProfile
     *
     * @return  self
     */ 
    public function setPaymentProfile($paymentProfile)
    {
        $this->paymentProfile = $paymentProfile;

        return $this;
    }
} 

class TransactionFull
{
    private ?Customer $customer = null;
    public function __construct(
        private float $amount ,
        private ?string $description = 'Test nullable'
    ) {
        echo $this->description;
    }

    /**
     * Get the value of customer
     */ 
    public function getCustomer()
    {
        return $this->customer;
    }

}
$transaction = new TransactionFull(5);
// This nullable will help preventing error which null Object call function.
// echo $transaction->customer->paymentProfile->id; # Error because customer value is null, can not calling paymentProfile
// echo $transaction->customer?->paymentProfile?->id; # echo null
// You can also
print_pre('
$tran = new TransactionFull(5, \'Test nullable\');
// This nullable will help preventing error which null Object call function.
// echo $transaction->customer->paymentProfile->id; # Error because customer value is null, can not calling paymentProfile
// echo $transaction->customer?->paymentProfile?->id; # echo null

// You can also
echo $transaction->getCustomer()?->setPaymentProfile( doSomethingLong() )?->id ?? \'Null case\';
echo \'Without null case : \'.$transaction->getCustomer()?->setPaymentProfile( doSomethingLong() )?->id;

// The pro of this is :
// That is doSomethingLong may cost so expensive, if getCustomer() does return value, that function will be called 
');
// echo $transaction->getCustomer()?->setPaymentProfile(doSomethingLong())?->id ?? 'Null case'; echo '<br>';
// echo 'Without null case : '.$transaction->getCustomer()?->setPaymentProfile(doSomethingLong())?->id;

