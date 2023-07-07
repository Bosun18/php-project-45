<?php

namespace Src\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function Src\Engine\getAnswer;

use const Src\Engine\COUNT_GAMES;

function gcd()
{
    $countRightAnswer = 0;
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Find the greatest common divisor of given numbers.');
    for ($k = 0; $k < COUNT_GAMES; $k++) {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $lenght = ($num1 <= $num2) ? $num1 : $num2;
        $arr1 = [];
        $arr2 = [];
        $expression = "$num1 $num2";
        for ($i = 1; $i <= $lenght; $i++) {
            for ($j = 1; $j <= $lenght; $j++) {
                if ($num1 % $i === 0) {
                    $arr1[] = $i;
                }
                if ($num2 % $j === 0) {
                    $arr2[] = $j;
                }
            }
        }
        $rightAnswer = max(array_intersect($arr1, $arr2));
        if (getAnswer($expression, (string)$rightAnswer)) {
            $countRightAnswer++;
        } else {
            line("Let's try again, $name!");
            break;
        }
    }
    if ($countRightAnswer === COUNT_GAMES) {
        line("Congratulations, $name");
    }
}
