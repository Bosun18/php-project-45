<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

const RULE = 'Find the greatest common divisor of given numbers.';

function getMaxDivisor(int $num1, int $num2): ?string
{
    $min = min($num1, $num2);
    for ($i = $min; $i >= 1; $i -= 1) {
        if ($num1 % $i === 0 and $num2 % $i === 0) {
            return $i;
        }
    }
    return null;
}

function run(): void
{
    $gameData = [];
    for ($k = 0; $k < NUMBER_OF_ROUNDS; $k += 1) {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $question = "$num1 $num2";
        $rightAnswer = getMaxDivisor($num1, $num2);
        $gameData[] = [$question, $rightAnswer];
    }
    startGame($gameData, RULE);
}
