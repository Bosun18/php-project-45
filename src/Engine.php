<?php

namespace Src\Engine;

use function cli\line;
use function cli\prompt;

const COUNT_GAMES = 3;

function getAnswer(array $question, string $nameGames)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($nameGames);
    foreach ($question as $item) {
        foreach ($item as $ask => $rightAnswer) {
            line("Question: %s", $ask);
            $answer = prompt("Your answer");
            if ($answer === $rightAnswer) {
                line("Correct!");
            } else {
                line("$answer is wrong answer ;(. Correct answer was $rightAnswer.");
                line("Let's try again, $name!");
                return;
            }
        }
    }
    line("Congratulations, %s!", $name);
}
