<?php

require __DIR__.'/printarray.php';

function SnakeToCamel($snake){
    $size = strlen($snake);
    $camel = "";
    $temp = "";
    $flag = false;
    for($index = 0; $index < $size; $index++){
        if ($snake[$index] == '_'){
            if ($flag) $temp = ucfirst($temp);
            $camel .= $temp;
            $temp = "";
            $flag = true;
        }
        else
            $temp .= $snake[$index];
    }
    $temp = ucfirst($temp);
    $camel .= $temp;
    return $camel;
}

function GenerateSnakeToCamel($snakes){
    $camels = [];
    foreach ($snakes as $snake){
        array_push($camels, SnakeToCamel($snake));
    }
    return $camels;
}

$input = ["snake_case", "camel_case"];
$output = GenerateSnakeToCamel($input);

PrintArray($output);