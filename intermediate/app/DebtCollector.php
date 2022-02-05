<?php 

declare(strict_types = 1);
namespace App;

interface DebtCollector extends AnotherInterface 
// extends mutiple interfaces
{
    // public const MY_CONSTANT = 1;
    // public function __construct();
    public function collect(float $owedAmount) : float;
}