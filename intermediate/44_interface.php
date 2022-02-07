<?php
require_once '../basic/0_overview.php';
require_once __DIR__ . '/vendor/autoload.php';

echo 'Interface <br>';
print_pre('
// We have 
DebtCollector is interface of :
    - CollectionAgency 
    - Rokcy 
    - DebtCollectionService 

interface DebtCollector extends AnotherInterface 
{
    public function collect(float $owedAmount) : float;
}
');
$collector = new \App\CollectionAgency();
print_pre('
$collector = new \App\CollectionAgency(); 
$collector->collect(100); 
');
echo ' Result : ' . $collector->collect(100) . '<br>';

$service = new \App\DebtCollectionService();
print_pre('
$service = new \App\DebtCollectionService();
$service->collectDebt( $collector ); 
');
echo ' Result : ' . $service->collectDebt($collector) . '<br>';

$rocky = new \App\Rocky();
print_pre('
$rocky = new \App\Rocky();
$service->collectDebt( $rocky ); 
');
echo ' Result : ' . $service->collectDebt($rocky) . '<br>';
