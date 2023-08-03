<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const GAME_ROUNDS = 3;

function getAnswer(array $question, string $ruleGame): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($ruleGame);
    foreach ($question as [$ask, $rightAnswer]) {
        line("Question: " . $ask);
        $answer = prompt("Your answer");
        if ($answer !== $rightAnswer) {
            line("$answer is wrong answer ;(. Correct answer was $rightAnswer.");
            line("Let's try again, $name!");
            return;
        }
        line("Correct!");
    }
    line("Congratulations, %s!", $name);
}
