<?php

use PHPUnit\Framework\TestCase;

class UsingMapTest extends TestCase
{
    private function map($items, $callback)
    {
        $result = [];
        foreach ($items as $item) {
            $result[] = $callback($item);
        }
        return $result;
    }

    public function test_get_employee_names()
    {
        $employees = [
            ['name' => 'John', 'department' => 'Sales'],
            ['name' => 'Jane', 'department' => 'Marketing'],
            ['name' => 'Dave', 'department' => 'Marketing'],
            ['name' => 'Dana', 'department' => 'Engineering'],
            ['name' => 'Beth', 'department' => 'Marketing'],
            ['name' => 'Kyle', 'department' => 'Engineering'],
        ];

        
        
        $employeeNames = $this->map($employees, function ($employee) {
            return $employee['name'];
        });
        

        $this->assertEquals([
            'John',
            'Jane',
            'Dave',
            'Dana',
            'Beth',
            'Kyle',
        ], $employeeNames);
    }

    public function test_get_the_year_from_each_date()
    {
        $dates = [
            new DateTime('2015-01-05'),
            new DateTime('1967-11-23'),
            new DateTime('1988-10-14'),
            new DateTime('1995-05-04'),
            new DateTime('2007-08-09'),
        ];

        $years = $this->map($dates, function ($date) {
            return $date->format('Y');
        });

        $this->assertEquals([
            '2015',
            '1967',
            '1988',
            '1995',
            '2007',
        ], $years);
    }

    public function test_convert_each_price_in_cents_into_a_displayable_format()
    {
        $pricesInCents = [
            79,
            599,
            699,
            289,
            89,
            249,
            785,
        ];

        $displayPrices = $this->map($pricesInCents, function ($pricesInCent) {
            return '$'.number_format($pricesInCent / 100, 2);
        });

        $this->assertEquals([
            '$0.79',
            '$5.99',
            '$6.99',
            '$2.89',
            '$0.89',
            '$2.49',
            '$7.85',
        ], $displayPrices);
    }
}