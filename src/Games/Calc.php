<?php

namespace Src\Games\Calc;

use function cli\line;
use function cli\prompt;
use function Src\Engine\getAnswer;

use const Src\Engine\COUNT_GAMES;

function isCalc(string $operator, int $num1, int $num2): string
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
    }
    return $rightAnswer;
}

function calc()
{
    $countRightAnswer = 0;
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('What is the result of the expression?');
    for ($i = 0; $i < COUNT_GAMES; $i++) {
        $operators = array('+', '-', '*');
        $operator = $operators[array_rand($operators)];
        $num1 = rand(1, 20);
        $num2 = rand(1, 20);
        $expression = "$num1 $operator $num2";
        if (getAnswer($expression, (string)isCalc($operator, $num1, $num2))) {
            $countRightAnswer++;
        } else {
            line("Let's try again, $name!");
            break;
        }
    }
    if ($countRightAnswer === COUNT_GAMES) {
        line("Congratulations, %s!", $name);
    }
}
