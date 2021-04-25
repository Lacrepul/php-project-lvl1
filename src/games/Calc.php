<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\isRightAnswer;
use function Brain\Games\Engine\greetingPart;
use function Brain\Games\Engine\gameEvent;

const START_CNT = 0;

function runCalcGame()
{
    $gameName = "calc";
    $name = greetingPart($gameName);
    gameEvent(START_CNT, $name, $gameName);
}