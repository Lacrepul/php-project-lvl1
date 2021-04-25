<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\isRightAnswer;
use function Brain\Games\Engine\greetingPart;
use function Brain\Games\Engine\gameEvent;

const START_CNT = 0;

/**
 * @return nothing
 */
function runEvenGame()
{
    $gameName = "even";
    $name = greetingPart($gameName);
    gameEvent(START_CNT, $name, $gameName);
}
