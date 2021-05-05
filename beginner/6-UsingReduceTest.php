<?php

use PHPUnit\Framework\TestCase;

class UsingReduceTest extends TestCase
{
    private function reduce($items, $callback, $initial)
    {
        $result = $initial;
        
        foreach ($items as $item) {
            $result = $callback($result, $item);
        }

        return $result;
    }

    public function test_calculate_the_product_of_a_list_of_numbers()
    {
        $numbers = [1, 2, 3, 4, 5, 6];

        $product = $this->reduce($numbers, function ($sum, $number) {
            return $sum * $number;
        }, 1);

        $this->assertEquals(720, $product);
    }

    public function test_create_an_associative_array_of_names_and_emails()
    {
        $users = [
            ['name' => 'John', 'email' => 'john@example.com'],
            ['name' => 'Jane', 'email' => 'jane@example.com'],
            ['name' => 'Dana', 'email' => 'dana@example.com'],
        ];

        $emailLookup = $this->reduce($users, function ($result, $user) {
            return $result += array($user['name'] => $user['email']); 
        }, []);

        $this->assertEquals([
            'John' => 'john@example.com',
            'Jane' => 'jane@example.com',
            'Dana' => 'dana@example.com',
        ], $emailLookup);
    }

    public function test_count_employees_in_each_department()
    {
        $employees = [
            ['name' => 'John', 'department' => 'Sales'],
            ['name' => 'Jane', 'department' => 'Marketing'],
            ['name' => 'Dave', 'department' => 'Marketing'],
            ['name' => 'Dana', 'department' => 'Engineering'],
            ['name' => 'Beth', 'department' => 'Marketing'],
            ['name' => 'Kyle', 'department' => 'Engineering'],
        ];

        $departmentCounts = $this->reduce($employees, function ($result, $employee) {
            if (array_key_exists($employee['department'], $result)) {
                $result[$employee['department']]++;
            }
            return $result += [$employee['department'] => 1];
        }, []);

        $this->assertEquals([
            'Sales' => 1,
            'Marketing' => 3,
            'Engineering' => 2,
        ], $departmentCounts);
    }
}