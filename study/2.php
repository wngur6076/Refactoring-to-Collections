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

$shiftIds = collect($shifts)->map(function ($shift) {
    return collect(explode('_', $shift))->last();

    /* if (strrpos($shift, '_') === false) {
        return $shift;
    }
    
    $underscorePosition = strrpos($shift, '_');
    $substringOffset = $underscorePosition + 1;
    return substr($shift, $substringOffset); */
});

var_dump($shiftIds->all());

$shiftIds = [
    'A7',
    'B9',
    'K11',
    'J15',
    'B2',
    'A6',
];