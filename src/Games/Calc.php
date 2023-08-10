<?php

namespace BrainGames\Games\Calc;

use Exception;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

const RULE = 'What is the result of the expression?';

/**
 * @throws Exception
 */
function calc(string $operator, int $num1, int $num2): string
{
    return match ($operator) {
        '+' => $num1 + $num2,
        '-' => $num1 - $num2,
        '*' => $num1 * $num2,
        default => throw new Exception('Неизвестный оператор'),
    };
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
