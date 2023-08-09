<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\GAME_LEVEL;

const RULE = 'What is the result of the expression?';

function calc(string $operator, int $num1, int $num2): string
{
    switch ($operator) {
        case '+':
            $rightAnswer = $num1 + $num2;
            break;
        case '-':
            $rightAnswer = $num1 - $num2;
            break;
        case '*':
            $rightAnswer = $num1 * $num2;
            break;
        default:
            $rightAnswer = false;
    }
    return $rightAnswer;
}

function run(): void
{
    $gameData = [];
    for ($i = 0; $i < GAME_LEVEL; $i += 1) {
        $operators = array('+', '-', '*');
        $operator = $operators[array_rand($operators)];
        $num1 = rand(1, 20);
        $num2 = rand(1, 20);
        $expression = "$num1 $operator $num2";
        $gameData[] = [$expression, calc($operator, $num1, $num2)];
    }
    startGame($gameData, RULE);
}
