<?php

// function fibonacci($nbr){

//     if($nbr <= 1){
//         return $nbr;
//     }

//     $a = 0;
//     $b = 1;

//     for($i = 0 ; $i < $nbr; $i++){

//         $res = $a + $b;
//         $a = $b;
//         $b = $res;
//     }

//     return $b;


// }

// echo fibonacci(1);
// echo fibonacci(2);
// echo fibonacci(3);
// echo fibonacci(4);
// echo fibonacci(5);

// $coins = [5, 7, 1, 1, 2, 3, 22];

// sort($coins);

// function minimumConvert($arr){

//     $minc = 1;

//     foreach($arr as $value){

//         if($value <= $minc){
//             $minc = $value + $minc;
//         }


//     }

//     return $minc;


// }
// echo minimumConvert($coins);
// die();

// function fib($nbr){
//     if($nbr <= 1){
//         return $nbr;
//     }
//     return fib($nbr - 1) + fib($nbr - 2);
// }

// echo fib(1);
// echo fib(2);
// echo fib(3);
// echo fib(4);
// echo fib(5);
// echo fib(6);

$matrix = [
    [1,2,3],
    [4,5,6]
];

function transposed($matrix){

    $rows = count($matrix);
    $cols = count($matrix[0]);
    $res = [];

    for($j = 0; $j < $cols; $j++){
        $res[$j] = [];
        for($i = 0 ; $i < $rows; $i++){
            $res[$j][$i] = $matrix[$i][$j];
        }
    }

    return $res;

}

print_r(transposed($matrix));
die();