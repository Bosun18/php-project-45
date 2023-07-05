<?php

namespace Src\Games;

use function cli\line;
use function cli\prompt;

function even(): void
{
    $randNum = [rand(1, 20), rand(1, 20), rand(1, 20)];
    $countRightAnswer = 0;

    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    foreach ($randNum as $num) {
        $rightAnswer = ($num % 2 === 0) ? 'yes' : 'no';
        line("Question: %s", (string)$num);
        $answer = prompt("Your answer");
        if ($num % 2 === 0 && trim(strtolower($answer)) === 'yes') {
            line("Correct!");
            $countRightAnswer++;
        } elseif ($num % 2 !== 0 && trim(strtolower($answer)) === 'no') {
            line("Correct!");
            $countRightAnswer++;
        } else {
            line("$answer is wrong answer ;(. Correct answer was $rightAnswer.");
            line("Let's try again, $name!");
            break;
        }
    }
    if ($countRightAnswer === 3) {
        line("Congratulations, $name");
    }
}
