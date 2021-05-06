<?php

use PHPUnit\Framework\TestCase;

class EmployeesBornOnSpecificWeekdayTest extends TestCase
{
    private function employeesBornOn($employees, $day)
    {
        $week_w = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
        return $employees->filter(function ($employee) use ($day, $week_w) {
            return $week_w[date('w', strtotime($employee['date_of_birth']))] === $day;
        })->values();
    }

    public function test()
    {
        $employees = collect([
            ['name' => 'John',  'department' => 'Sales',        'date_of_birth' => '1988-07-11'],
            ['name' => 'Jane',  'department' => 'Marketing',    'date_of_birth' => '1981-09-06'],
            ['name' => 'Dave',  'department' => 'Marketing',    'date_of_birth' => '1986-05-08'],
            ['name' => 'Dana',  'department' => 'Engineering',  'date_of_birth' => '1976-09-26'],
            ['name' => 'Beth',  'department' => 'Marketing',    'date_of_birth' => '1977-03-09'],
            ['name' => 'Kyle',  'department' => 'Engineering',  'date_of_birth' => '1990-02-28'],
            ['name' => 'Steve', 'department' => 'Sales',        'date_of_birth' => '1980-12-01'],
            ['name' => 'Liz',   'department' => 'Engineering',  'date_of_birth' => '1976-07-06'],
            ['name' => 'Joe',   'department' => 'Marketing',    'date_of_birth' => '1978-06-13'],
        ]);

        $this->assertEquals([
            ['name' => 'Jane',  'department' => 'Marketing',    'date_of_birth' => '1981-09-06'],
            ['name' => 'Dana',  'department' => 'Engineering',  'date_of_birth' => '1976-09-26'],
        ], $this->employeesBornOn($employees, 'Sunday')->all());

        $this->assertEquals([
            ['name' => 'John',  'department' => 'Sales',        'date_of_birth' => '1988-07-11'],
            ['name' => 'Steve', 'department' => 'Sales',        'date_of_birth' => '1980-12-01'],
        ], $this->employeesBornOn($employees, 'Monday')->all());

        $this->assertEquals([
            ['name' => 'Liz',   'department' => 'Engineering',  'date_of_birth' => '1976-07-06'],
            ['name' => 'Joe',   'department' => 'Marketing',    'date_of_birth' => '1978-06-13'],
        ], $this->employeesBornOn($employees, 'Tuesday')->all());

        $this->assertEquals([
            ['name' => 'Beth',  'department' => 'Marketing',    'date_of_birth' => '1977-03-09'],
            ['name' => 'Kyle',  'department' => 'Engineering',  'date_of_birth' => '1990-02-28'],
        ], $this->employeesBornOn($employees, 'Wednesday')->all());

        $this->assertEquals([
            ['name' => 'Dave',  'department' => 'Marketing',    'date_of_birth' => '1986-05-08'],
        ], $this->employeesBornOn($employees, 'Thursday')->all());

        $this->assertEquals([], $this->employeesBornOn($employees, 'Friday')->all());
        $this->assertEquals([], $this->employeesBornOn($employees, 'Saturday')->all());
    }
}