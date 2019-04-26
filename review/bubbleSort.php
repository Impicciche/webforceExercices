Create a variable maxCount that is the count of elements in the array -1

while maxCount greater than or equal to 1
    for 0 to maxCount step 1
        if the current element is greater than the next one
            reverse the two elements
        end if
    end for

    decrease maxCount by one
end while


<?php

$arr = [7, 9, 11, 13, 16, 10, 14, 5, 15, 6];
function psort(&$arr)
{
    $maxCount = count($arr) - 1;
    while ($maxCount >= 1) {
        for ($n = 0; $n < $maxCount; $n++) {
            if ($arr[$n] > $arr[$n + 1]) {
                $tmp = $arr[$n + 1];
                $arr[$n + 1] = $arr[$n];
                $arr[$n] = $tmp;
            }
        }
        $maxCount--;
    }
    return $arr;
}
array_push($arr, 13);
array_push($arr, 13);
array_push($arr, 13);
array_push($arr, 13);

psort($arr);

var_dump($arr);



