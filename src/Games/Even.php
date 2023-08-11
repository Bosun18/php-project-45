<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\NUMBER_OF_ROUND;

const RULE = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $randNum): bool
{
    return $randNum % 2 === 0;
}

function run(): void
{
    $gameData = [];
    for ($i = 0; $i < NUMBER_OF_ROUND; $i += 1) {
        $question = rand(1, 20);
        $rightAnswer = isEven($question) ? 'yes' : 'no';
        $gameData[] = [$question, $rightAnswer];
    }
    startGame($gameData, RULE);
}
