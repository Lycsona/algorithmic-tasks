<?php


class PermMissingElem
{
    public function findMissedElement($array)
    {
        $result = 0;

        if (is_array($array) && !empty($array)) {

            asort($array);

            $arrayValues = array_values($array);
            $arrayCount = count($arrayValues);
            for ($i = 0; $i < $arrayCount; $i++) {

                if ($arrayCount == 1) {
                    return $arrayValues[$i];
                }

                if (key_exists($i + 1, $arrayValues) && $arrayValues[$i] + 1 !== $arrayValues[$i + 1]) {
                    return $arrayValues[$i] + 1;
                }
            }
        }

        return $result;
    }
}

$permMissingElem = new PermMissingElem();
var_dump($permMissingElem->findMissedElement([6]));