<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\GAME_LEVEL;

const RULE = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $randNum): bool
{
    for ($i = 2; $i <= $randNum / 2; $i += 1) {
        if ($randNum % $i === 0) {
            return false;
        }
    }
    return true;
}

function run(): void
{
    $gameData = [];
    for ($i = 1; $i <= GAME_LEVEL; $i += 1) {
        $question = rand(2, 100);
        $rightAnswer = isPrime($question) ? 'yes' : 'no';
        $gameData[] = [$question, $rightAnswer];
    }
    startGame($gameData, RULE);
}
