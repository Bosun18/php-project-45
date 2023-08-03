<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\getAnswer;

use const BrainGames\Engine\GAME_ROUNDS;

const RULE_GAME = 'What number is missing in the progression?';

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
    $question = [];
    for ($i = 0; $i < GAME_ROUNDS; $i += 1) {
        $firstElem = rand(0, 20);
        $progress = rand(3, 5);
        $arr = makeProgress($firstElem, $progress);
        $rightAnswer = implode('', array_splice($arr, rand(0, 10), 1, '..'));
        $expression = implode(' ', $arr);
        $question[] = [$expression => $rightAnswer];
    }
    getAnswer($question, RULE_GAME);
}
