<?php

require_once '../vendor/autoload.php';

class Collection implements ArrayAccess, Countable, IteratorAggregate
{
    protected $items;
    public function __construct($items)
    {
        $this->items = $items;
    }
    public function getIterator()
    {
        return new ArrayIterator($this->items);
    }
    public function count()
    {
        return count($this->items);
    }
    public function map($callback)
    {
        return new static(array_map($callback, $this->items));
    }
    public function filter($callback)
    {
        return new static(array_filter($this->items, $callback));
    }
    public function toArray()
    {
        return $this->items;
    }

    public static function make($items)
    {
        return new static($items);
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->items);
    }
    public function offsetGet($offset)
    {
        return $this->items[$offset];
    }
    public function offsetSet($offset, $value)
    {
        if ($offset === null) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }
    public function offsetUnset($offset)
    {
        unset($this->items[$offset]);
    }
}

$employees = new Collection([
    ['name' => 'Mary', 'email' => 'mary@example.com', 'salaried' => true],
    ['name' => 'John', 'email' => 'john@example.com', 'salaried' => false],
    ['name' => 'Kelly', 'email' => 'kelly@example.com', 'salaried' => true],
]);

$employeeEmails = $employees->map(function ($employee) {
    return $employee['email'];
});

$salariedEmployees = $employees->filter(function ($employee) {
    return $employee['salaried'];
});

$items = Collection::make([1, 2, 3]);

foreach ($items as $item) {
    echo $item;
}
// =>