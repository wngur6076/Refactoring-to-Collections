<?php

require_once '../vendor/autoload.php';

$shifts = [
    'Shipping_Steve_A7',
    'Sales_B9',
    'Support_Tara_K11',
    'J15',
    'Warehouse_B2',
    'Shipping_Dave_A6',
];

$parts = collect($shifts)->map(function ($shift) {
    return collect(explode('_', $shift))->last();
});

dd($parts);