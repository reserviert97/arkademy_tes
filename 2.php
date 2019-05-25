<?php

function betweenDays($from, $to)
{
    // Konvert ke UNIX Time
    $date_from = strtotime($from);
    $date_to = strtotime($to); 

    // Iterasi perhari
    for ($i=$date_from; $i<=$date_to; $i+=86400) {
        echo date("Y-m-d", $i).'<br>';
    }
}

betweenDays('2019-10-3', '2019-11-18');


?>