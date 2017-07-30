<?php
function multiply(string $num1, string $num2): string
{
    $intermediateCalculation = function ($num1, $num2, $sign, $j = 0) {
        $tmpResult = '';
        $additionalNum = 0;

        $count = strlen($num1) - 1;
        for ($i = $count; $i >= 0; $i--) {
            if ($sign == '+') {
                $resultSum = $num1[$i] + $num2[$i] + $additionalNum;
            } else {
                $resultSum = $num1[$i] * $num2[$j] + $additionalNum;
            }

            if ($i == 0) {
                $tmpResult .= strrev($resultSum);
            } else {
                if ($resultSum <= 9) {
                    $tmpResult .= $resultSum;
                    $additionalNum = 0;
                } else {
                    $tmpResult .= $resultSum % 10;
                    $additionalNum = floor($resultSum / 10);
                }
            }
        }

        return strrev($tmpResult);
    };

    $result = [];

    $num1 = $num1 == 0 ? 0 : ltrim($num1, '0');
    $num2 = $num2 == 0 ? 0 : ltrim($num2, '0');

    $maxCount = strlen($num1);
    $minCount = strlen($num2);
    if ($maxCount < $minCount) {
        list($num1, $num2) = [$num2, $num1];
        $minCount = $maxCount;
    }

    $count = $minCount - 1;
    for ($i = $count; $i >= 0; $i--) {

        $tmpResult = $intermediateCalculation($num1, $num2, '*', $i);

        $shiftZero = strlen($tmpResult) + ($count - $i);
        $result[] = str_pad($tmpResult, $shiftZero, '0');
    }

    $finishResult = '';
    $count = count($result) - 1;
    for ($i = $count; $i >= 0; $i--) {
        $num1 = $finishResult;
        $num2 = $result[$i];
        if (strlen($num1) < strlen($num2)) {
            list($num1, $num2) = [$num2, $num1];
        }
        $num2 = str_pad($num2, strlen($num1), '0', STR_PAD_LEFT);

        $finishResult = ltrim($intermediateCalculation($num1, $num2, '+'), '0');
    }

    return $finishResult == '' ? 0 : $finishResult;
}

var_dump(multiply('2581100575268697731990771624786239818826071216067777706167324000429745742031110584382776468175288645311022635634060464017146865678914885924663784911025561078844007952924546783098103322619074003674180411729199202852227027170232379298667540686031706716325472363096962381814386051716512545745137675805594002001983686758552156333753757',
    '33342512268697731990771624786239818826071216067777706167324000429745742031110584382776468175288645311022635634060464017146865678914885924663784911025561078844007952924546783098103322619074003674180411729199202852227027170232379298667540686031706716325472363096962381814386051716512545745137675805594002001983686758552156333753757'));