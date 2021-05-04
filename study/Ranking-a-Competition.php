<?php

require_once '../vendor/autoload.php';

$scores = collect([
    ['score' => 76, 'team' => 'A'],
    ['score' => 62, 'team' => 'B'],
    ['score' => 82, 'team' => 'C'],
    ['score' => 86, 'team' => 'D'],
    ['score' => 91, 'team' => 'E'],
    ['score' => 67, 'team' => 'F'],
    ['score' => 67, 'team' => 'G'],
    ['score' => 82, 'team' => 'H'],
]);

//  결과
[
    ['rank' => 1, 'score' => 91, 'team' => 'E'],
    ['rank' => 2, 'score' => 86, 'team' => 'D'],
    ['rank' => 3, 'score' => 82, 'team' => 'C'],
    ['rank' => 3, 'score' => 82, 'team' => 'H'],
    ['rank' => 5, 'score' => 76, 'team' => 'A'],
    ['rank' => 6, 'score' => 67, 'team' => 'F'],
    ['rank' => 6, 'score' => 67, 'team' => 'G'],
    ['rank' => 8, 'score' => 62, 'team' => 'B'],
];