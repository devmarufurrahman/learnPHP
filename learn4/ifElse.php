<?php

    $a = 100;
    $b = 45;


    if($a < $b){
        echo "a is small <br>";
    } else{
        echo "a is big";
    }


    // PHP formate
    if($a < $b):
        echo "a is small <br>";
    else:
        echo "a is big";
    endif;
    

?>