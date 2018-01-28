<?php

class OddOccurrencesInArray
{
    public function searchUnpairedElement($array)
    {
        $result = null;

        $values = array_count_values($array);

        foreach ($values as $key => $value) {
            if ($value % 2 !== 0) {
                $result = $key;
            }
        }

        return $result;
    }
}

$oddOccurrencesInArray = new OddOccurrencesInArray();
var_dump($oddOccurrencesInArray->searchUnpairedElement([0 => 9, 1 => 4, 2 => 9, 3 => 4, 4 => 5, 5 => 7, 6 => 7]));