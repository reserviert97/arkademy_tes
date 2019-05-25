<?php

function count_vowels($words)
{
    $array = str_split($words);     // convert ke array
    $count = 0;                     // counter

    foreach ($array as $i) {
        $huruf = strtolower($i);
        if ($huruf == 'a' || $huruf == 'i' || $huruf == 'u' || $huruf == 'e' || $huruf == 'o') {    // pengecekan huruf hidup
            $count++;     // tambah counter jika memenuhi syarat
        }
    }

    return $count;

}

echo count_vowels('hmm..');

?>