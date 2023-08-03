<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\getAnswer;

use const BrainGames\Engine\GAME_ROUNDS;

const RULE_GAME = 'Answer "yes" if the number is even, otherwise answer "no".';

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
    $question = [];
    for ($i = 0; $i < GAME_ROUNDS; $i += 1) {
        $randNum = rand(1, 20);
        $rightAnswer = isEven($randNum) ? 'yes' : 'no';
        $question[] = [$randNum, $rightAnswer];
    }
    getAnswer($question, RULE_GAME);
}
