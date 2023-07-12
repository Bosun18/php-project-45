<?php

namespace Src\Games\Prime;

use function Src\Engine\getAnswer;

use const Src\Engine\COUNT_GAMES;

const NAME_GAME = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $randNum)
{
    for ($i = 2; $i <= $randNum / 2; $i++) {
        if ($randNum % $i === 0) {
            return false;
        }
    }
    return true;
}

function prime(): void
{
    $question = [];
    for ($i = 0; $i < COUNT_GAMES; $i++) {
        $randNum = rand(2, 100);
        $rightAnswer = (isPrime($randNum) === true) ? 'yes' : 'no';
        $question[] = [$randNum => $rightAnswer];
    }
    getAnswer($question, NAME_GAME);
}
