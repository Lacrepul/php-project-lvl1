<?php

namespace Brain\Games\AllGames;

use function Brain\Games\Engine\isRightAnswer;
use function Brain\Games\Engine\greetingPart;
use function Brain\Games\Engine\gameEvent;

const START_CNT = 0;

/**
 * @return void
 */
function runEvenGame()
{
    $gameName = "even";
    $name = greetingPart($gameName);
    gameEvent(START_CNT, $name, $gameName);
}

/**
 * @return void
 */
function runCalcGame()
{
    $gameName = "calc";
    $name = greetingPart($gameName);
    gameEvent(START_CNT, $name, $gameName);
}

/**
 * @return void
 */
function runGcdGame()
{
    $gameName = "gcd";
    $name = greetingPart($gameName);
    gameEvent(START_CNT, $name, $gameName);
}

/**
 * @return void
 */
function runProgressionGame()
{
    $gameName = "progression";
    $name = greetingPart($gameName);
    gameEvent(START_CNT, $name, $gameName);
}

/**
 * @return void
 */
function runPrimeGame()
{
    $gameName = "prime";
    $name = greetingPart($gameName);
    gameEvent(START_CNT, $name, $gameName);
}
