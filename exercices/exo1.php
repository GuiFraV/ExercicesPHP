<?php

function fibonacci($nbr){

    if($nbr <= 1){
        return $nbr;
    }

    $a = 0;
    $b = 1;

    for($i = 0 ; $i < $nbr; $i++){

        $res = $a + $b;
        $a = $b;
        $b = $res;
    }

    return $b;


}

echo fibonacci(1);
echo fibonacci(2);
echo fibonacci(3);
echo fibonacci(4);
echo fibonacci(5);