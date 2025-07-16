<?php
require '../config.php';
require '../functions.php';

$symbol = $_GET['symbol'] ?? 'BTC_USDT';
$apiData = apiRequest(TRADPRO_BASE_API . '/trades?symbol=' . $symbol);

$trades = [];

foreach ($apiData['data'] ?? [] as $trade) {
    $trades[] = [
        'trade_id' => $trade['id'],
        'price' => floatval($trade['price']),
        'amount' => floatval($trade['amount']),
        'timestamp' => strtotime($trade['created_at']),
        'side' => strtolower($trade['type']),
    ];
}

header('Content-Type: application/json');
echo json_encode($trades);
