<?php

        for($a=1;$a <= 10; $a++){

            if($a == 3){
                goto abc;
            }

            echo $a;
        }
        echo "Hello";

        abc :
            echo "This is new code";

?>