<?php

namespace Src\Games\Progression;

use function Src\Engine\getAnswer;

use const Src\Engine\COUNT_GAMES;

const NAME_GAME = 'What number is missing in the progression?';

function isProgress(int $firstElem, int $progress): array
{
    $arr = [$firstElem];
    for ($j = 0; $j < 10; $j++) {
        $firstElem += $progress;
        $arr[] = $firstElem;
    }
    return $arr;
}
function progression(): void
{
    $question = [];
    for ($i = 0; $i < COUNT_GAMES; $i++) {
        $firstElem = rand(0, 20);
        $progress = rand(3, 5);
        $arr = isProgress($firstElem, $progress);
        $rightAnswer = implode('', array_splice($arr, rand(0, 10), 1, '..'));
        $expression = implode(' ', $arr);
        $question[] = [$expression => $rightAnswer];
    }
    getAnswer($question, NAME_GAME);
}
