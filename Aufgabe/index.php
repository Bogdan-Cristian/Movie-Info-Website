<?php

function removeDoubleValue(array $arr) {

    $counter_int = 0;

    $arr_length = count($arr);

    for($i = 0; $i < $arr_length; $i++) {

        $next_index = $i + 1;

        // Break if the $i index is the last
        if($next_index === $arr_length){
            break;
        }

        // continue if $i index isn't found
        if(!isset($arr[$i])) {
            continue;
        }

        for($j = $next_index; $j < $arr_length; $j++) {

            // Continue the for-loop if the index is already unset
            if(!isset($arr[$j])) {
                continue;
            }

            // Add to found double counter and removing the value
            if($arr[$j] === $arr[$i]) {
                $counter_int++;
                unset($arr[$j]);
            }

        }

    }

    $arr = array_values($arr);

    for($i = 0; $i < $counter_int; $i++) {
        $arr[] = 0;
    }

    return $arr;
}

$test_arr = [12,3,44,3,52,12,12,34];

var_dump(removeDoubleValue($test_arr) === [12,3,44,52,34,0,0,0]);