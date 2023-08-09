<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\GAME_LEVEL;

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
    for ($i = 0; $i < GAME_LEVEL; $i += 1) {
        $firstElem = rand(0, 20);
        $progress = rand(3, 5);
        $arr = makeProgress($firstElem, $progress);
        $rightAnswer = implode('', array_splice($arr, rand(0, 10), 1, '..'));
        $expression = implode(' ', $arr);
        $gameData[] = [$expression, $rightAnswer];
    }
    startGame($gameData, RULE);
}
