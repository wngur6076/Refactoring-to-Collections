<?php

use PHPUnit\Framework\TestCase;

class EmployeesPerDepartmentTest extends TestCase
{
    public function test()
    {
        $employees = collect([
            ['name' => 'John',  'department' => 'Sales',        'email' => 'john3@example.com'],
            ['name' => 'Jane',  'department' => 'Marketing',    'email' => 'jane8@example.com'],
            ['name' => 'Dave',  'department' => 'Marketing',    'email' => 'dave1@example.com'],
            ['name' => 'Dana',  'department' => 'Engineering',  'email' => 'dana8@example.com'],
            ['name' => 'Beth',  'department' => 'Marketing',    'email' => 'beth4@example.com'],
            ['name' => 'Kyle',  'department' => 'Engineering',  'email' => 'kyle8@example.com'],
            ['name' => 'Steve', 'department' => 'Sales',        'email' => 'steve7@example.com'],
            ['name' => 'Liz',   'department' => 'Engineering',  'email' => 'liz6@example.com'],
            ['name' => 'Joe',   'department' => 'Marketing',    'email' => 'joe5@example.com'],
        ]);

        $departmentCounts = $employees->reduce(function ($result, $employee) {
            if (! isset($result[$employee['department']])) {
                $result[$employee['department']] = 0;
            }
            $result[$employee['department']] += 1;
            return $result;
        }, collect());

        $this->assertEquals([
            'Sales' => 2,
            'Marketing' => 4,
            'Engineering' => 3,
        ], $departmentCounts->all());
    }
}