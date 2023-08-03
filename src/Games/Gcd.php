<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\getAnswer;

use const BrainGames\Engine\GAME_ROUNDS;

const RULE_GAME = 'Find the greatest common divisor of given numbers.';

function getDivisors(int $num1, int $num2): string
{
    $min = min($num1, $num2);
    $arr1 = [];
    $arr2 = [];
    for ($i = 1; $i <= $min; $i += 1) {
        if ($num1 % $i === 0) {
            $arr1[] = $i;
        }
        if ($num2 % $i === 0) {
            $arr2[] = $i;
        }
    }
    return max(array_intersect($arr1, $arr2));
}

function run(): void
{
    $question = [];
    for ($k = 0; $k < GAME_ROUNDS; $k += 1) {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $expression = "$num1 $num2";
        $question[] = [$expression => getDivisors($num1, $num2)];
    }
    getAnswer($question, RULE_GAME);
}
