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
        $makeProgress = makeProgress($firstElem, $progress);
        $rightAnswer = implode('', array_splice($makeProgress, rand(0, 10), 1, '..'));
        $question = implode(' ', $makeProgress);
        $gameData[] = [$question, $rightAnswer];
    }
    startGame($gameData, RULE);
}
