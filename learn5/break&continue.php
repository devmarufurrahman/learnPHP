<?php

        for($a=1;$a <= 10; $a++){

            if($a == 3){
                continue;
            }

            echo $a;
        }


        // break
        for($a=1;$a <= 10; $a++){

            if($a == 5){
                break;
            }

            echo $a ;
        }


?>