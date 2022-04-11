<?php
header('Content-Type: application/json; charset=utf-8');

$totalBottleCount = $_POST["bottleCount"];

$availableBottlePacks = [
    6,
    3,
    12,
];

$optimalBottlePacks = [];

arsort($availableBottlePacks);

foreach ($availableBottlePacks as $bottlePackSize) {
    $bottlePackCount = intdiv($totalBottleCount, $bottlePackSize);
    $optimalBottlePacks['crate-' . $bottlePackSize] = $bottlePackCount;

    $totalBottleCount -= $bottlePackSize * $bottlePackCount;
}

if ($totalBottleCount !== 0)
{
    $optimalBottlePacks['crate-' . end($availableBottlePacks)] += 1;
}

echo json_encode($optimalBottlePacks, JSON_UNESCAPED_UNICODE);