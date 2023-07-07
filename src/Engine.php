<?php

namespace Src\Engine;

use function cli\line;
use function cli\prompt;

const COUNT_GAMES = 3;

function getAnswer(string $task, string $rightAnswer)
{
    line("Question: %s", $task);
    $answer = prompt("Your answer");
    if ($answer === $rightAnswer) {
        line("Correct!");
        return true;
    } else {
        line("$answer is wrong answer ;(. Correct answer was $rightAnswer.");
    }
}
