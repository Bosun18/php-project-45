<?php

namespace Src\Games\Gcd;

use function Src\Engine\getAnswer;

use const Src\Engine\COUNT_GAMES;

const NAME_GAME = 'Find the greatest common divisor of given numbers.';

function maxDivisors(int $num1, int $num2): string
{
    $length = min($num1, $num2);
    $arr1 = [];
    $arr2 = [];
    for ($i = 1; $i <= $length; $i++) {
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
    for ($k = 0; $k < COUNT_GAMES; $k++) {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $expression = "$num1 $num2";
        $question[] = [$expression => maxDivisors($num1, $num2)];
    }
    getAnswer($question, NAME_GAME);
}
