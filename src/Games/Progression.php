<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const RULE = 'What number is missing in the progression?';

function makeProgress(int $firstElem, int $progress): array
{
    $arr = [$firstElem];
    for ($j = 0; $j < 10; $j += 1) {
        $firstElem += $progress;
        $arr[] = $firstElem;
    }
    return $arr;
}
function run(): void
{
    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $firstElem = rand(0, 20);
        $step = rand(3, 5);
        $progression = makeProgress($firstElem, $step);
        $rightAnswer = implode('', array_splice($progression, rand(0, 10), 1, '..'));
        $question = implode(' ', $progression);
        $gameData[] = [$question, $rightAnswer];
    }
    startGame($gameData, RULE);
}
