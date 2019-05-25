<?php

function cetak_gambar($nomor)
{
    $m = ceil($nomor/2);        // nilai tengah
    
    if ($nomor % 2 == 0) {
        die('Bilangan tidak ganjil');
    }else {
        for ($i=0; $i < $nomor; $i++) { 

            $b = '';

            for ($j=1; $j <= $nomor; $j++) {

                if ($i == 0 || $i == $nomor-1) {
                    $b .= 'X ';
                }else {

                    if ( $m == $j) {
                        $b .= 'X ';
                    } else {
                        $b .= '= ';
                    }
                }
                
            }
            $b .= '<br>';
            echo $b;
        }
    }
}

cetak_gambar(11);

?>