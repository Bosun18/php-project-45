<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const GAME_LEVEL = 3;

function startGame(array $gameData, string $rule): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, $name!");
    line($rule);
    foreach ($gameData as [$ask, $rightAnswer]) {
        line("Question: $ask");
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
