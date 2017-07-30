<?php

class UniqueStringHandler
{
    private $array;

    function __construct($array)
    {
        $this->array = $array;
    }

    public function findUnique()
    {
        $strToLower = $this->stringToLower($this->array);
        $charsArray = $this->splitString($strToLower);
        $sortStrings = $this->assembleStrings($charsArray);

        return $this->searchUnique($sortStrings);
    }

    private function stringToLower($array)
    {
        return array_map('strtolower', $array);
    }

    private function deleteSpaces($str)
    {
        return str_replace(" ", "", $str);
    }

    private function splitString($array)
    {
        $charsArr = [];
        for ($i = 0; $i < count($array); $i++) {
            $prepareStrings = $this->deleteSpaces($array[$i]);

            $char = str_split($prepareStrings);
            asort($char);
            $charsArr[$i] = array_unique($char);
        }

        return $charsArr;
    }

    private function assembleStrings($charsArr)
    {
        $assembleStrings = [];
        for ($i = 0; $i < count($charsArr); $i++) {
            $assembleStrings[] = implode('', $charsArr[$i]);
        }

        return $assembleStrings;
    }

    private function searchUnique($arr)
    {
        $result = '';
        $elementFirst = $arr[0];

        for ($i = 1; $i < count($arr) - 1; $i++) {
            if ($arr[$i] !== $arr[$i + 1]) {
                $elementSecond = $arr[$i];
                $elementThird = $arr[$i + 1];

                if ($elementFirst == $elementSecond) {
                    $result = $elementThird;
                } elseif ($elementFirst == $elementThird) {
                    $result = $elementSecond;
                } else {
                    $result = $elementFirst;
                }
            }
        }

        return $this->getOriginElement(array_search($result, $arr));
    }

    private function getOriginElement($key)
    {
        return $this->array[$key];
    }
}

$array = ['abc', 'acb', 'bac', 'foo', 'ba c', 'ba c', 'cba'];
$arrayHandler = new UniqueStringHandler($array);
$uniqueString = $arrayHandler->findUnique();
var_dump($uniqueString);