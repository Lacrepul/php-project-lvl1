<?php

namespace Brain\Games\Gcd;

use function Brain\Games\Engine\isRightAnswer;
use function Brain\Games\Engine\greetingPart;
use function Brain\Games\Engine\gameEvent;

const START_CNT = 0;

/**
 * @return nothing
 */
function runGcdGame()
{
    $gameName = "gcd";
    $name = greetingPart($gameName);
    gameEvent(START_CNT, $name, $gameName);
}
