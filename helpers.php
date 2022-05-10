<?php
//process shares
function processShares($candidateVotes, $votes){
    foreach($candidateVotes as $candidate => $candidateData){
        $candidateVotes[$candidate]['share'] = number_format(($candidateData['votes'] / $votes) * 100, 2);
    }
    return $candidateVotes;
}

function trueRand(){
    for($x=0;$x<=rand(1,5);$x++){
        $chance = mt_rand (1*10, 100*10) / 10;
    }

    return $chance;
}

function randomGen($min, $max) {
    $numbers = range($min, $max);
    shuffle($numbers);
    $arr = array_slice($numbers, 0, 1);
    return $arr[0];
}

function random_float($min, $max) {
    return random_int($min, $max - 1) + (random_int(0, PHP_INT_MAX - 1) / PHP_INT_MAX );
}

function p($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}
