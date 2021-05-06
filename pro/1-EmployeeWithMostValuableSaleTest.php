<?php

use PHPUnit\Framework\TestCase;


class EmployeeWithMostValuableSaleTest extends TestCase
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
                    ['customer' => 'Foggy Toaster', 'order_total' => 700],
                ],
            ],
            [
                'name' => 'Jane',
                'email' => 'jane8@example.com',
                'sales' => [
                    ['customer' => 'The Grey Apple Company', 'order_total' => 203],
                    ['customer' => 'Yellow Cake', 'order_total' => 8730],
                    ['customer' => 'The Piping Bull Company', 'order_total' => 3337],
                    ['customer' => 'The Cloudy Dog Company', 'order_total' => 5310],
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
        ]);
        // 순서대로 하고 -> 1번째만 필터
        
        $employeeWithMostValuableSale = $employees->map(function ($employee) {
            return array_merge($employee, ['sales_total' => collect($employee['sales'])->sum('order_total')]);
        })->sortByDesc('sales_total')
        ->first();

        $this->assertEquals($employeeWithMostValuableSale['name'], 'Jane');
    }
}