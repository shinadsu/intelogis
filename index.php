<?php

$fastDelivery = new FastDeliveryService("http://fastdelivery.com");
$slowDelivery = new SlowDeliveryService("http://slowdelivery.com");

$sourceKladr = "source_kladr_code";
$targetKladr = "target_kladr_code";
$weight = 5.0;

$fastResult = $fastDelivery->calculateCostAndDate($sourceKladr, $targetKladr, $weight);
$slowResult = $slowDelivery->calculateCostAndDate($sourceKladr, $targetKladr, $weight);

// Приведение результатов к общему формату
$fastFormattedResult = [
    'price' => $fastResult['price'],
    'date' => $fastResult['period'],
    'error' => $fastResult['error'],
];

$slowFormattedResult = [
    'price' => $slowResult['coefficient'] * 150, // базовая стоимость для медленной доставки
    'date' => $slowResult['date'],
    'error' => $slowResult['error'],
];

// Вывод результатов в формате JSON
$response = [
    'fast_delivery' => $fastFormattedResult,
    'slow_delivery' => $slowFormattedResult,
];

echo json_encode($response);

?>
