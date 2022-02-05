<?php 

require_once __DIR__ . '/vendor/autoload.php';

$collector = new \App\CollectionAgency();

echo $collector->collect(100) . '<br>';

$service = new \App\DebtCollectionService();

echo $service->collectDebt( $collector ).'<br>';

$rocky = new \App\Rocky();

echo $service->collectDebt( $rocky ).'<br>';