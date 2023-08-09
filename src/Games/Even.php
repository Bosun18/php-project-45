<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\GAME_LEVEL;

const RULE = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $randNum): bool
{
    if ($randNum % 2 === 0) {
        return true;
    } else {
        return false;
    }
}

function run(): void
{
    $gameData = [];
    for ($i = 0; $i < GAME_LEVEL; $i += 1) {
        $question = rand(1, 20);
        $rightAnswer = isEven($question) ? 'yes' : 'no';
        $gameData[] = [$question, $rightAnswer];
    }
    startGame($gameData, RULE);
}
