<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

const RULE = 'What is the result of the expression?';

function calc(string $operator, int $num1, int $num2): string
{
    switch ($operator) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        default:
            return false;
    }
}

function run(): void
{
    $gameData = [];
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i += 1) {
        $operators = ['+', '-', '*'];
        $operator = $operators[array_rand($operators)];
        $num1 = rand(1, 20);
        $num2 = rand(1, 20);
        $question = "$num1 $operator $num2";
        $rightAnswer = calc($operator, $num1, $num2);
        $gameData[] = [$question, $rightAnswer];
    }
    startGame($gameData, RULE);
}
