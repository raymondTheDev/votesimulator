<?php
include ('helpers.php');

$votes = $_GET['votes'] ?? 1000000;//default votes to process

/*Initialize Canddidate Data*/
$candidatesArr = ['Marcos', 'Robredo', 'Pacquiao', 'Moreno', 'Lacson', 'Others'];
$resultTypes = ['pseudo', 'simple'];
foreach($candidatesArr as $candidateArr){
    foreach($resultTypes as $resultType){
        $candidateVotes[$resultType][$candidateArr] = [
            'votes' => 0,
            'share' => 0
        ];
    }
}

/*Process PRNG Data*/
for($voteCount=0;$voteCount<=$votes;$voteCount++){
//    $chance = mt_rand(1, 100);
//    $chance = randomGen(1, 100);
    $chance = mt_rand (1*10, 100*10) / 10;
    if($chance <= 28.99){
        $candidate = 'Robredo';
    }elseif($chance >= 29 && $chance <= 33.99){
        $candidate = 'Pacquiao';
    }elseif($chance >= 34 && $chance <= 37.99){
        $candidate = 'Moreno';
    }elseif($chance >= 39 && $chance <= 40.99){
        $candidate = 'Lacson';
    }elseif ($chance >= 41 && $chance <= 41.1) {
        $candidate = 'Others';
    }else{
        $candidate = 'Marcos';
    }

    $candidateVotes['pseudo'][$candidate]['votes'] += 1;
}
$candidateVotes['pseudo'] = processShares($candidateVotes['pseudo'], $votes);

/*Process Simple Shuffle Data*/
$votesLeft = $votes;
shuffle($candidatesArr);
foreach($candidatesArr as $candidateIndex => $candidateName){
    if($candidateIndex == count($candidatesArr) - 1){
        $candidateVotes['simple'][$candidateName]['votes'] = $votesLeft;
    }else{
        $thisVote = mt_rand(1,$votesLeft);
        $votesLeft -= $thisVote;
        $candidateVotes['simple'][$candidateName]['votes'] = $thisVote;
    }
}
$candidateVotes['simple'] = processShares($candidateVotes['simple'], $votes);
