<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

/**
 * @param string $gameName
 * @return string $name
 */
function greetingPart(string $gameName)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    if ($gameName === "calc") {
        line("What is the result of the expression?");
    } elseif ($gameName === "even") {
        line("Answer \"yes\" if the number is even, otherwise answer \"no\".");
    } elseif ($gameName === "gcd") {
        line("Find the greatest common divisor of given numbers.");
    } elseif ($gameName === "progression") {
        line("What number is missing in the progression?");
    } elseif ($gameName === "prime") {
        line("Answer \"yes\" if given number is prime. Otherwise answer \"no\".");
    }

    return $name;
}

/**
 * @param int $cnt
 * @param string $name
 * @param string $gameName
 * @return mixed
 */
function gameEvent($cnt, $name, $gameName)
{
    if (congratzCheck($cnt, $name)) {
        return true;
    }


    if ($gameName === "even") {
        if (gameEven($name, $gameName)) {
            $cnt = incrementCnt($cnt);
            return gameEvent($cnt, $name, $gameName);
        } else {
            return false;
        }
    } elseif ($gameName === "calc") {
        if (gameCalc($name, $gameName)) {
            $cnt = incrementCnt($cnt);
            return gameEvent($cnt, $name, $gameName);
        } else {
            return false;
        }
    } elseif ($gameName === "gcd") {
        if (gameGcd($name, $gameName)) {
            $cnt = incrementCnt($cnt);
            return gameEvent($cnt, $name, $gameName);
        } else {
            return false;
        }
    } elseif ($gameName === "progression") {
        if (gameProgression($name, $gameName)) {
            $cnt = incrementCnt($cnt);
            return gameEvent($cnt, $name, $gameName);
        } else {
            return false;
        }
    } elseif ($gameName === "prime") {
        if (gamePrime($name, $gameName)) {
            $cnt = incrementCnt($cnt);
            return gameEvent($cnt, $name, $gameName);
        } else {
            return false;
        }
    }
}

/**
 * @param mixed $question
 * @param string $gameName
 * @param mixed $questionKey
 * @return mixed
 */
function isRightAnswer($question, string $gameName, $questionKey = null)
{
    if ($gameName == "even") {
        return $question % 2 ==  0 ? "yes" : "no";
    } elseif ($gameName == "calc") {
        [$first, $second, $operator] = $question;
        $answer = null;
        if ($operator == "-") {
            $answer = (int)$first - (int)$second;
        } elseif ($operator == "+") {
            $answer = (int)$first + (int)$second;
        } else {
            $answer = (int)$first * (int)$second;
        }

        return $answer;
    } elseif ($gameName == "gcd") {
        [$first, $second] = $question;
        while (true) {
            if ($first == $second) {
                return $second;
            }
            if ($first > $second) {
                $first -= $second;
            } else {
                $second -= $first;
            }
        }
    } elseif ($gameName == "progression") {
        if (array_key_exists($questionKey, $question)) {
            return $question[$questionKey];
        } else {
            return false;
        }
    } elseif ($gameName == "prime") {
        for ($i = $question - 1; $i > 1; $i -= 1) {
            if ($question % $i == 0) {
                return "no";
            }
        }
        return "yes";
    }
}

/**
 * @param int $cnt
 * @param string $name
 * @return bool
 */
function congratzCheck($cnt, $name)
{
    if ($cnt >= 3) {
        line("Congratulations, {$name}!");
        return true;
    }
}

/**
 * @param int $cnt
 * @return int $cnt
 */
function incrementCnt(int $cnt)
{
    $cnt = $cnt += 1;
    return $cnt;
}

/**
 * @param string $name
 * @param string $gameName
 * @return bool
 */
function gameEven($name, $gameName)
{
    $question = getQuestion($gameName);
    line("Question: {$question}");
    $answer = prompt("Your answer: ");

    if (isRightAnswer($question, $gameName) == $answer) {
        line("Correct!");
        return true;
    } else {
        $rightAnswer = isRightAnswer($question, $gameName);
        line("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
        line("Let's try again, {$name}!");

        return false;
    }
}

/**
 * @param string $name
 * @param string $gameName
 * @return bool
 */
function gameCalc($name, $gameName)
{
    $question = getQuestion($gameName);
    [$first, $second, $operator] = $question;
    line("Question: {$first} {$operator} {$second}");
    $answer = prompt("Your answer: ");

    if (isRightAnswer($question, $gameName) == $answer) {
        line("Correct!");
        return true;
    } else {
        $rightAnswer = isRightAnswer($question, $gameName);
        line("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
        line("Let's try again, {$name}!");

        return false;
    }
}

/**
 * @param string $name
 * @param string $gameName
 * @return bool
 */
function gameGcd($name, $gameName)
{
    $question = getQuestion($gameName);
    [$first, $second] = $question;
    line("Question: {$first} {$second}");
    $answer = prompt("Your answer: ");

    if (isRightAnswer($question, $gameName) == $answer) {
        line("Correct!");
        return true;
    } else {
        $rightAnswer = isRightAnswer($question, $gameName);
        line("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
        line("Let's try again, {$name}!");

        return false;
    }
}

/**
 * @param string $name
 * @param string $gameName
 * @return bool
 */
function gameProgression($name, $gameName)
{
    $question = getQuestion($gameName);
    $questionWithSecret = $question;
    $questionKey = array_rand($questionWithSecret);
    $questionWithSecret[$questionKey] = "..";
    $questionSeparated = implode(" ", $questionWithSecret);
    line("Question: {$questionSeparated}");
    $answer = prompt("Your answer: ");
    if (isRightAnswer($question, $gameName, $questionKey) == $answer) {
        line("Correct!");
        return true;
    } else {
        $rightAnswer = isRightAnswer($question, $gameName, $questionKey);
        line("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
        line("Let's try again, {$name}!");

        return false;
    }
}

/**
 * @param string $name
 * @param string $gameName
 * @return bool
 */
function gamePrime($name, $gameName)
{
    $question = getQuestion($gameName);
    line("Question: {$question}");
    $answer = prompt("Your answer: ");
    if (isRightAnswer($question, $gameName) == $answer) {
        line("Correct!");
        return true;
    } else {
        $rightAnswer = isRightAnswer($question, $gameName);
        line("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
        line("Let's try again, {$name}!");

        return false;
    }
}

/**
 * @param string $gameName
 * @return mixed
 */
function getQuestion($gameName)
{
    if ($gameName === "calc") {
        $result     =   [];
        $result[]   =   random_int(1, 100);
        $result[]   =   random_int(1, 100);
        if ($rand = random_int(1, 3)) {
            if ($rand == 1) {
                $result[] = "-";
            } elseif ($rand == 2) {
                $result[] = "+";
            } else {
                $result[] = "*";
            }
        }

        return $result;
    } elseif ($gameName === "even") {
        return random_int(1, 100);
    } elseif ($gameName === "gcd") {
        $result     =   [];
        $result[]   =   random_int(1, 100);
        $result[]   =   random_int(1, 100);

        return $result;
    } elseif ($gameName === "progression") {
        $count          =   0;
        $result         =   [];
        $rand           =   random_int(1, 10);
        $progression    =   random_int(1, 10);
        for ($i = 0; $i < 10; $i += 1) {
            if ($i === 0) {
                $result[]   =   $progression + $rand;
            } else {
                $result[]   =   $result[$i - 1] + $rand;
            }
        }
        return $result;
    } elseif ($gameName === "prime") {
        return random_int(1, 100);
    }
}
