<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function runEvenGame()
{
    $cnt = 0;
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");
    gameEvent($cnt, $name);
}

function gameEvent($cnt, $name)
{
    if($cnt >= 3)
    {
        line("Congratulations, {$name}!");

        return true;
    }

    $question = random_int(1, 100);
    line("Question: {$question}");
    $answer = prompt("Your answer: ");

    if(isRightAnswer($question) == $answer)
    {
        $cnt += 1;
        line("Correct!");
        
        return gameEvent($cnt, $name);
    }
    else
    {
        line("'{$answer}' is wrong answer ;(. Correct answer was 'yes'.");
        line("Let's try again, {$name}");

        return false;
    }
}

function isRightAnswer($question)
{
    return $question%2 ==  0 ? "yes" : "no";
}