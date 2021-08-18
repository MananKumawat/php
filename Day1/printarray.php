<?php

function PrintArray($array){
    $size = sizeof($array);
    print "[";
    for ($index = 0; $index < $size; $index++){
        print $array[$index];
        if ($index != $size-1)
            print ",";
    }
    print "]\n";
}