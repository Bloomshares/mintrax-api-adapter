<?php
require '../config.php';
require '../functions.php';

$apiData = apiRequest(TRADPRO_BASE_API . '/ticker');

$tickers = [];

foreach ($apiData['data'] ?? [] as $pair) {
    $symbol = explode('_', $pair['symbol']);
    $base = strtoupper($symbol[0]);
    $target = strtoupper($symbol[1]);

    $tickers[] = [
        'base' => $base,
        'target' => $target,
        'market' => [
            'name' => EXCHANGE_NAME,
            'identifier' => EXCHANGE_ID,
            'has_trading_incentive' => false
        ],
        'last' => floatval($pair['last_price']),
        'volume' => floatval($pair['base_volume']),
        'converted_last' => ['usd' => null],
        'converted_volume' => ['usd' => null],
        'trust_score' => 'green',
        'bid_ask_spread_percentage' => null,
        'timestamp' => date('c'),
        'last_traded_at' => date('c'),
        'last_fetch_at' => date('c')
    ];
}

header('Content-Type: application/json');
echo json_encode(['tickers' => $tickers]);
