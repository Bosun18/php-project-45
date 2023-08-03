<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\getAnswer;

use const BrainGames\Engine\GAME_ROUNDS;

const RULE_GAME = 'What is the result of the expression?';

function calc(string $operator, int $num1, int $num2): string
{
    $rightAnswer = null;

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
    }
    return $rightAnswer;
}

function run(): void
{
    $question = [];
    for ($i = 0; $i < GAME_ROUNDS; $i += 1) {
        $operators = array('+', '-', '*');
        $operator = $operators[array_rand($operators)];
        $num1 = rand(1, 20);
        $num2 = rand(1, 20);
        $expression = "$num1 $operator $num2";
        $question[] = [$expression => calc($operator, $num1, $num2)];
    }
    getAnswer($question, RULE_GAME);
}
