<?php
require '../config.php';

$data = [
    'name' => EXCHANGE_NAME,
    'identifier' => EXCHANGE_ID,
    'url' => EXCHANGE_URL,
    'country' => 'N/A',
    'has_trading_incentive' => false,
    'logo' => EXCHANGE_URL . '/assets/img/logo.png',
    'tickers_endpoint' => EXCHANGE_URL . '/public-api/tickers.php',
    'trades_endpoint' => EXCHANGE_URL . '/public-api/trades.php',
    'orderbook_endpoint' => EXCHANGE_URL . '/public-api/orderbook.php',
];

header('Content-Type: application/json');
echo json_encode($data);
