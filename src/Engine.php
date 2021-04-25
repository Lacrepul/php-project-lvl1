<?php
namespace Brain\Games\Engine;
use function cli\line;
use function cli\prompt;

function greetingPart(string $gameName)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    if($gameName === "calc")
        line("What is the result of the expression?");
    elseif($gameName === "even")
        line("Answer \"yes\" if the number is even, otherwise answer \"no\".");

    return $name;
}

function gameEvent($cnt, $name, $gameName)
{
    if(congratzCheck($cnt, $name))
        return true;

    if($gameName === "even")
    {
        if(gameEven($name, $gameName))
        {
            $cnt = incrementCnt($cnt);

            return gameEvent($cnt, $name, $gameName);
        }
        else
        {
            return false;
        }
    }
    elseif($gameName === "calc")
    {
        if(gameCalc($name, $gameName))
        {
            $cnt = incrementCnt($cnt);

            return gameEvent($cnt, $name, $gameName);
        }
        else
        {
            return false;
        }
    }
    //todo other games
}

function isRightAnswer($question, string $gameName)
{
    if($gameName == "even")
    {
        return $question%2 ==  0 ? "yes" : "no";
    }
    elseif($gameName == "calc")
    {
        [$first, $second, $operator] = $question;
        $answer = null;
        if($operator == "-")
            $answer = (int)$first - (int)$second;
        elseif($operator == "+")
            $answer = (int)$first + (int)$second;
        else
            $answer = (int)$first * (int)$second;

        return $answer;
    }
    //todo others responses
}

function congratzCheck($cnt, $name)
{
    if($cnt >= 3)
    {
        line("Congratulations, {$name}!");

        return true;
    }
}


function incrementCnt(int $cnt)
{
    $cnt = $cnt += 1;

    return $cnt;
}

/**
 * zone of games
 */
function gameEven($name, $gameName)
{
    $question = getQuestion($gameName);
    line("Question: {$question}");
    $answer = prompt("Your answer: ");

    if(isRightAnswer($question, $gameName) == $answer)
    {
        line("Correct!");
        
        return true;
    }
    else
    {
        $rightAnswer = isRightAnswer($question, $gameName);
        line("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
        line("Let's try again, {$name}");

        return false;
    }
}

function gameCalc($name, $gameName)
{
    $question = getQuestion($gameName);
    [$first, $second, $operator] = $question;
    line("Question: {$first} {$operator} {$second}");
    $answer = prompt("Your answer: ");

    if(isRightAnswer($question, $gameName) == $answer)
    {
        line("Correct!");
        
        return true;
    }
    else
    {
        $rightAnswer = isRightAnswer($question, $gameName);
        line("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
        line("Let's try again, {$name}");

        return false;
    }
}

function getQuestion($gameName)
{
    if($gameName === "calc")
    {
        $result     =   [];
        $result[]   =   random_int(1, 100);
        $result[]   =   random_int(1, 100);
        if($rand = random_int(1, 3))
        {
            if($rand == 1)
                $result[] = "-";
            elseif($rand == 2)
                $result[] = "+";
            else
                $result[] = "*";
        }

        return $result;
    }
    elseif($gameName === "even")
    {
        return random_int(1, 100);
    }
}