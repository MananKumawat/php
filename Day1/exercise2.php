<?php

function MaskPhoneNumber($number){
    return substr($number,0,2).str_repeat("*",strlen($number)-4).substr($number,-2);
}

$number = "9876543210";
$masked_number = MaskPhoneNumber($number);
print $masked_number . "\n";