<?php

namespace Brain\Games\AllGames;

use function Brain\Games\Engine\isRightAnswer;
use function Brain\Games\Engine\greetingPart;
use function Brain\Games\Engine\gameEvent;

const START_CNT = 0;

function runEvenGame()
{
    $gameName = "even";
    $name = greetingPart($gameName);
    $question = gameEvent(START_CNT, $name, $gameName);
    isRightAnswer($question, $gameName);
}

function runCalcGame()
{
    $gameName = "calc";
    $name = greetingPart($gameName);
    $question = gameEvent(START_CNT, $name, $gameName);
    isRightAnswer($question, $gameName);
}

function runGcdGame()
{
    $gameName = "gcd";
    $name = greetingPart($gameName);
    $question = gameEvent(START_CNT, $name, $gameName);
    isRightAnswer($question, $gameName);
}
