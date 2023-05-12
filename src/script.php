<?php
require __DIR__ . '/vendor/autoload.php'; // Include web3 library

use Web3\Web3;

$web3 = new Web3('http://localhost:8545'); // Connect to local Ethereum node

if (isset($_GET['account'])) {
    $account = $_GET['account']; // Get Ethereum account address from request parameter

    $balance = $web3->eth->getBalance($account); // Get balance of Ethereum account

    echo $balance; // Return balance to JavaScript file
} else {
    echo 'No account address specified.'; // Handle missing parameter error
}
?>