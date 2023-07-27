<?php

    $a = 100;
    $b = 45;


    if($a < $b){
        echo "a is small <br>";
    }elseif($a == $b){
        echo "a and b is equal";       
    }
    else{
        echo "a is big";
    }



    //PHP Formate

    if($a < $b):
        echo "a is small <br>";
    elseif($a == $b):
            echo "a and b is equal";
    
    else:
        echo "a is big";
    endif;
    

?>