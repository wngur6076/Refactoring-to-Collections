<?php

require_once '../vendor/autoload.php';

function load_json($path)
{
    return json_decode(file_get_contents(__DIR__.'/'.$path), true);
}

function github_score($events)
{
    
}

function j2oin($items, $callback)
{
    return $items->reduce(function ($string, $item) use ($callback) {
        return $string . $callback($item);
        }, '');
}

class Customer
{
    public $email;
}

$customers = collect();
$customers->push(new Customer());
$customers->push(new Customer());
$customers->first()->email = "1@wadawd";
$customers->last()->email = "2@wadwadaw";

$bcc = j2oin($customers, function ($customer) {
    return $customer->email . ', ';
});

var_dump($bcc);

