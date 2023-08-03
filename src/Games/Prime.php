<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\getAnswer;

use const BrainGames\Engine\GAME_ROUNDS;

const RULE_GAME = 'Answer "yes" if given number is prime. Otherwise answer "no".';

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
    $question = [];
    for ($i = 0; $i < GAME_ROUNDS; $i += 1) {
        $randNum = rand(2, 100);
        $rightAnswer = isPrime($randNum) ? 'yes' : 'no';
        $question[] = [$randNum, $rightAnswer];
    }
    getAnswer($question, RULE_GAME);
}
