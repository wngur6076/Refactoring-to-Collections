<?php

require_once '../vendor/autoload.php';



/* function binaryToDecimal($binary)
{
    $total = 0;
    $exponent = strlen($binary) - 1;

    for ($i = 0; $i < strlen($binary); $i++) {
        $decimal = $binary[$i] * (2 ** $exponent);
        $total += $decimal;
        $exponent--;
    }

    return $total;
}
 */

function binaryToDecimal($binary)
{
    return collect(str_split($binary))
        ->reverse()
        ->values()
        ->map(function ($column, $exponent) {
            return $column * (2 ** $exponent);
        })->sum();
}

var_dump(binaryToDecimal("100110101"));