<?php

namespace Src\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Src\Engine\getAnswer;

use const Src\Engine\COUNT_GAMES;

function isPrime($randNum): bool
{
    for ($i = 2; $i <= $randNum / 2; $i++) {
        if ($randNum % $i === 0) {
            return false;
        }
    }
    return true;
}

function prime(): void
{
    $countRightAnswer = 0;

    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    for ($i = 0; $i < COUNT_GAMES; $i++) {
        $randNum = rand(2, 100);
        $rightAnswer = (isPrime($randNum) === true) ? 'yes' : 'no';
        if (getAnswer($randNum, $rightAnswer)) {
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
