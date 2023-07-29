<?php

    // Function with arguments reference
    function helloSir(&$name){
        $name = "Noman";
    }
    $person = "Maruf";
    helloSir($person);

    echo $person

?>