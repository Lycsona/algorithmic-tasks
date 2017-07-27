<?php
function multiply(string $num1, string $num2): string
{
    $result = [];

    $num1 = ltrim($num1, '0');
    $num2 = ltrim($num2, '0');

    $maxCount = $num1Count = strlen($num1);
    $minCount = $num2Count = strlen($num2);
    if ($num1Count < $num2Count) {
        $minCount = $num1Count;
        $maxCount = $num2Count;
        list($num1, $num2) = [$num2, $num1];
    }

    $count1 = $maxCount - 1;
    $count2 = $minCount - 1;

    for ($i = $count2; $i >= 0; $i--) {

        $additionalNum = 0;
        $tmpNum = '';
        for ($j = $count1; $j >= 0; $j--) {
            $tmpMultiply = $num1[$j] * $num2[$i] + $additionalNum;

            if ($j == 0) {
                $tmpNum .= strrev($tmpMultiply);
            } else {
                if ($tmpMultiply <= 9) {
                    $tmpNum .= $tmpMultiply;
                    $additionalNum = 0;
                } else {
                    $tmpNum .= $tmpMultiply % 10;
                    $additionalNum = floor($tmpMultiply / 10);
                }
            }
        }

        $tmpResult = strrev($tmpNum);
        $shiftZero = strlen($tmpResult) + ($count2 - $i);
        $result[] = str_pad($tmpResult, $shiftZero, '0');
    }

    $tmpResult = '';
    //  echo(var_dump($result));echo('    ');exit;
    $cuntResult = count($result);
    for ($j = 0; $j < $cuntResult; $j++) {
        $tmpRes = strrev($tmpResult);
        $num1 = $tmpRes;
        $num2 = $result[$j];
        if (strlen($num1) < strlen($num2)) {
            list($num1, $num2) = [$num2, $num1];
        }

        $tmpResult = '';
        $additionalNum = 0;

        $num2 = str_pad($num2, strlen($num1), '0', STR_PAD_LEFT);

        $count = strlen($num1) - 1;
        for ($i = $count; $i >= 0; $i--) {

            $resultSum = $num1[$i] + $num2[$i] + $additionalNum;
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
    }

    $final = (strrev($tmpResult) == '') ? 0 : strrev($tmpResult);
    return $final;
}

var_dump(multiply('2581100575268697731990771624786239818826071216067777706167324000429745742031110584382776468175288645311022635634060464017146865678914885924663784911025561078844007952924546783098103322619074003674180411729199202852227027170232379298667540686031706716325472363096962381814386051716512545745137675805594002001983686758552156333753757',
    '3421100575268697731990771624786239818826071216067777706167324000429745742031110584382776468175288645311022635634060464017146865678914885924663784911025561078844007952924546783098103322619074003674180411729199202852227027170232379298667540686031706716325472363096962381814386051716512545745137675805594002001983686758552156333753757'));