<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\getAnswer;

use const BrainGames\Engine\GAME_ROUNDS;

const NAME_GAME = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $randNum): string
{
    return ($randNum % 2 === 0) ? 'yes' : 'no';
}

function run(): void
{
    $question = [];
    for ($i = 0; $i < GAME_ROUNDS; $i++) {
        $randNum = rand(1, 20);
        $question[] = [$randNum => isEven($randNum)];
    }
    getAnswer($question, NAME_GAME);
}
