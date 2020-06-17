<?php

function drawChristmasTree($countOfLines)
{
    $spaces = function ($numberOfSpaces) {
        return str_repeat(' ', $numberOfSpaces);
    };

    for ($i = 1; $i <= $countOfLines; $i++) {
        if ($i === 1) {
            $spacesBefore = $spaces($countOfLines + $i);
            $row = $spacesBefore . '*';
        } else {
            $spacesBefore = $spaces($countOfLines - $i + 2);
            $spacesBetween = $spaces($i + $i - 3);
            $row = $spacesBefore . '*' . $spacesBetween . '*';
        }
        var_dump($row);
    }
}

drawChristmasTree(10);