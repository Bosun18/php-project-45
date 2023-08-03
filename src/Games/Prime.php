<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\getAnswer;

use const BrainGames\Engine\GAME_ROUNDS;

const NAME_GAME = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $randNum): bool
{
    for ($i = 2; $i <= $randNum / 2; $i++) {
        if ($randNum % $i === 0) {
            return false;
        }
    }
    return true;
}

function run(): void
{
    $question = [];
    for ($i = 0; $i < GAME_ROUNDS; $i++) {
        $randNum = rand(2, 100);
        $rightAnswer = (isPrime($randNum) === true) ? 'yes' : 'no';
        $question[] = [$randNum => $rightAnswer];
    }
    getAnswer($question, NAME_GAME);
}
