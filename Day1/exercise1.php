<?php

require __DIR__.'/printarray.php';

function Array_flatten($multi_numbers) {
    $single_numbers= [];
        foreach ($multi_numbers as $numbers){
            if (gettype($numbers) == "array") {
                $number = Array_flatten($numbers);
                $single_numbers = array_merge($single_numbers, $number);
            }
            else
                array_push($single_numbers, $numbers);
        }
        return $single_numbers;
}

$multi_numbers = [2, 3, [4,5], [6,7], 8, [9, [10, 11]]];
$single_numbers = Array_flatten($multi_numbers);

PrintArray($single_numbers);
