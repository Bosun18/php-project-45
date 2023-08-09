<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\GAME_LEVEL;

const RULE = 'Find the greatest common divisor of given numbers.';

function getDivisors(int $num1, int $num2): string
{
    $min = min($num1, $num2);
    $result = null;
    for ($i = 1; $i <= $min; $i += 1) {
        if ($num1 % $i === 0 and $num2 % $i === 0) {
            $result = $i;
        }
    }
    return $result;
}

function run(): void
{
    $gameData = [];
    for ($k = 0; $k < GAME_LEVEL; $k += 1) {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $expression = "$num1 $num2";
        $gameData[] = [$expression, getDivisors($num1, $num2)];
    }
    startGame($gameData, RULE);
}
