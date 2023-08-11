<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const NUMBER_OF_ROUND = 3;

function startGame(array $gameData, string $rule): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, $name!");
    line($rule);
    foreach ($gameData as [$question, $rightAnswer]) {
        line("Question: $question");
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
