<?php

use PHPUnit\Framework\TestCase;


class MostValuableCustomerTest extends TestCase
{
    public function test()
    {
        $employees = collect([
            [
                'name' => 'John',
                'email' => 'john3@example.com',
                'sales' => [
                    ['customer' => 'The Blue Rabbit Company', 'order_total' => 7444],
                    ['customer' => 'Black Melon', 'order_total' => 1445],
                    ['customer' => 'Yellow Cake', 'order_total' => 700],
                ],
            ],
            [
                'name' => 'Jane',
                'email' => 'jane8@example.com',
                'sales' => [
                    ['customer' => 'The Grey Apple Company', 'order_total' => 203],
                    ['customer' => 'Yellow Cake', 'order_total' => 8730],
                    ['customer' => 'The Blue Rabbit Company', 'order_total' => 3337],
                    ['customer' => 'Green Mobile', 'order_total' => 5310],
                ],
            ],
            [
                'name' => 'Dave',
                'email' => 'dave1@example.com',
                'sales' => [
                    ['customer' => 'The Acute Toaster Company', 'order_total' => 1091],
                    ['customer' => 'Green Mobile', 'order_total' => 2370],
                ],
            ],
            [
                'name' => 'Dana',
                'email' => 'dana2@example.com',
                'sales' => [
                    ['customer' => 'Green Mobile', 'order_total' => 203],
                    ['customer' => 'Yellow Cake', 'order_total' => 8730],
                    ['customer' => 'The Piping Bull Company', 'order_total' => 3337],
                    ['customer' => 'The Cloudy Dog Company', 'order_total' => 5310],
                ],
            ],
            [
                'name' => 'Beth',
                'email' => 'beth9@example.com',
                'sales' => [
                    ['customer' => 'The Grey Apple Company', 'order_total' => 1091],
                    ['customer' => 'Green Mobile', 'order_total' => 2370],
                ],
            ],
        ]);

        $mostValuableCustomer = $employees
            ->pluck('sales')
            ->flatten(1)
            ->groupBy('customer')
            ->map(function ($groupedSales) {
                return $groupedSales->sum('order_total');
            })
            ->sort()
            ->reverse()
            ->keys()
            ->first();
            
        $this->assertEquals('Yellow Cake', $mostValuableCustomer);
    }
}