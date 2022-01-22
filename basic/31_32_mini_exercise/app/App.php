<?php

declare(strict_types=1);

// Your code 
// Find if there is a file and get file 
function getTransactionFiles(string $dirPath): array
{
    $files = [];

    foreach (scandir($dirPath) as $file) {
        if (is_dir($file)) {
            continue;
        }

        $files[] = $dirPath . $file;
    }

    return $files;
}
// Convert to transactions array due to that file 
function getTransactions(string $fileName, ?callable $transactionHandler = null): array
{
    if (!file_exists($fileName)) {
        trigger_error('File "' . $fileName . '" does not exsist.', E_USER_ERROR);
    }

    $file = fopen($fileName, 'r');

    fgetcsv($file); // Except title row 

    $transactions = [];
    
    if ($transactionHandler === null ) return [];

    while (($transaction  = fgetcsv($file)) !== false) {
        
        $transactions[] = $transactionHandler($transaction);
    }
    return $transactions;
}
function extractTransaction(array $transactionRow): array
{
    [$date, $checkNumber, $description, $amount] = $transactionRow;

    $amount = str_replace(['$', ','], '', $amount);

    return [
        'date' => $date,
        'checkNumber' => $checkNumber,
        'description' => $description,
        'amount' => $amount,
    ];
}
function calculateTotals(array $transactions): array
{
    $totals = ['netTotal' => 0, 'totalIncome' => 0, 'totalExpense' => 0];
    
    foreach($transactions as $transaction){
        $totals['netTotal'] += $transaction['amount'];

        if ($transaction['amount'] >= 0){
            $totals['totalIncome'] += $transaction['amount'];
        } else{
            $totals['totalExpense'] += $transaction['amount'];
        }
    }
    
    return $totals;
}
