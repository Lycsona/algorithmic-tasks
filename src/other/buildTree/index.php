<?php

function drawChristmasTree($countOfLines)
{
    $spaces = function ($numberOfSpaces) {
        return str_repeat('&nbsp', $numberOfSpaces);
    };

    for ($i = 1; $i <= $countOfLines; $i++) {
        if ($i === 1) {
            $spacesBefore = $spaces($countOfLines + $i);
            echo $spacesBefore . '*' . '</br>';
        } else {
            $spacesBefore = $spaces($countOfLines - $i + 1);
            $spacesBetween = $spaces($i + $i - 2);
            echo $spacesBefore . '*' . $spacesBetween . '*' . '</br>';
        }
    }
}

drawChristmasTree(10);