<?php

namespace Src\Games\Progression;

use function cli\line;
use function cli\prompt;
use function Src\Engine\getAnswer;

use const Src\Engine\COUNT_GAMES;

function progression(): void
{
    $countRightAnswer = 0;

    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line('What number is missing in the progression?');

    for ($i = 0; $i < COUNT_GAMES; $i++) {
        $firstElem = rand(0, 20);
        $progress = rand(3, 5);
        $arr = [$firstElem];
        for ($j = 0; $j < 10; $j++) {
            $firstElem += $progress;
            $arr[] = $firstElem;
        }
        $rightAnswer = implode('', array_splice($arr, rand(0, 10), 1, '..'));
        $expression = implode(' ', $arr);
        if (getAnswer($expression, $rightAnswer)) {
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
