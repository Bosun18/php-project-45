<?php

namespace Src\Games\Even;

use function cli\line;
use function cli\prompt;
use function Src\Engine\getAnswer;

use const Src\Engine\COUNT_GAMES;

function even(): void
{
    $countRightAnswer = 0;

    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($i = 0; $i < COUNT_GAMES; $i++) {
        $randNum = rand(1, 20);
        $rightAnswer = ($randNum % 2 === 0) ? 'yes' : 'no';
        if (getAnswer($randNum, $rightAnswer)) {
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
