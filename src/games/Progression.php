<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\isRightAnswer;
use function Brain\Games\Engine\greetingPart;
use function Brain\Games\Engine\gameEvent;

const START_CNT = 0;

/**
 * @return null
 */
function runProgressionGame()
{
    $gameName = "progression";
    $name = greetingPart($gameName);
    gameEvent(START_CNT, $name, $gameName);
}
