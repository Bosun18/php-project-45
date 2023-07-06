<?php

namespace Src\Engine;

use function cli\line;
use function cli\prompt;

const COUNT_GAMES = 3;

function getAnswer($task, $rightAnswer)
{
    line("Question: %s", (string)$task);
    $answer = prompt("Your answer");
    if ($answer === $rightAnswer) {
        line("Correct!");
        return true;
    } else {
        line("$answer is wrong answer ;(. Correct answer was $rightAnswer.");
    }
}
