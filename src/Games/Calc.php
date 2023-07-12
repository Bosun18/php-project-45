<?php

namespace Src\Games\Calc;

use function Src\Engine\getAnswer;

use const Src\Engine\COUNT_GAMES;

const NAME_GAME = 'What is the result of the expression?';

function isCalc(string $operator, int $num1, int $num2): string
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

function calc()
{
    $question = [];
    for ($i = 0; $i < COUNT_GAMES; $i++) {
        $operators = array('+', '-', '*');
        $operator = $operators[array_rand($operators)];
        $num1 = rand(1, 20);
        $num2 = rand(1, 20);
        $expression = "$num1 $operator $num2";
        $question[] = [$expression => isCalc($operator, $num1, $num2)];
    }
    getAnswer($question, NAME_GAME);
}
