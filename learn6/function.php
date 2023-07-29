<?php

    // Function
    function hello(){
        echo "Hello Everyone ";
    };

    hello();
    hello();
    hello();


    // Function with return
    function helloSir($name){
        echo "hello $name. ";
    }

    helloSir("Maruf ");



    // Function with return
    function sum($math, $bangla, $english){
        $cal = $math + $bangla + $english;
        return $cal;
    }

    function percentage($st) {
        $per = $st / 3;
        echo "Percentage is $per";
    }

    $total = sum(87,95,80);

    percentage($total);

    echo " Total is: $total";

?>