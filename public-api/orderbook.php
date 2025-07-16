<?php
require '../config.php';
require '../functions.php';

$symbol = $_GET['symbol'] ?? 'BTC_USDT';
$apiData = apiRequest(TRADPRO_BASE_API . '/depth?symbol=' . $symbol);

$orderbook = [
    'timestamp' => time(),
    'bids' => [],
    'asks' => [],
];

foreach ($apiData['data']['bids'] ?? [] as $bid) {
    $orderbook['bids'][] = [floatval($bid[0]), floatval($bid[1])];
}
foreach ($apiData['data']['asks'] ?? [] as $ask) {
    $orderbook['asks'][] = [floatval($ask[0]), floatval($ask[1])];
}

header('Content-Type: application/json');
echo json_encode($orderbook);
