<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\isRightAnswer;
use function Brain\Games\Engine\greetingPart;
use function Brain\Games\Engine\gameEvent;

const START_CNT = 0;

function runPrimeGame()
{
    $gameName = "prime";
    $name = greetingPart($gameName);
    gameEvent(START_CNT, $name, $gameName);
}
