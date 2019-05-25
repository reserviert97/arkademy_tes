<?php

function ganti_kata($words, $letter, $replace)
{
    $array = str_split($words);     // convert ke array

    foreach ($array as $huruf) {
        
        if ($huruf == $letter) {
            $huruf = $replace;
        }
        echo $huruf;
    }
}
ganti_kata('purwakerta','a','o');

?>