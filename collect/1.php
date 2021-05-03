<?php

require_once '../vendor/autoload.php';

$productJson = json_decode(file_get_contents('products.json'), true);
$products = collect($productJson['products']);

$totalCost = 0;
foreach ($products as $product) {
    if ($product["product_type"] == "Wallet" || $product["product_type"] == "Lamp") {
        foreach ($product["variants"] as $variant) {
            $totalCost += $variant["price"];
        }
    }
}

$walletAndLamp = $products->filter(function ($product) {
    return collect(['Wallet', 'Lamp'])->contains($product["product_type"]);
})->flatMap(function ($product) {
    return $product['variants'];
})->sum('price');

dd($totalCost);