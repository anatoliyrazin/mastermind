<?php

// var_dump($_POST);
chdir("../");
include_once("inc/utils.php");
include_once("inc/settings.php");

if($_POST['action'] == "submitSolution") {
    $answer2 = $_POST['gameSession'];
    // $answer = decodeAnswer($answer2);
    $answer = decodeAnswerEx($answer2, $colors);

    $solution = array();
    $solution2 = "";
    for($i = 1; $i <= $cells; $i++) {
        $solution[$i] = $_POST['colors'][$i];
        $solution2 .= $_POST['colors'][$i];
    }

    $answerColors = array();
    $solutionColors = array();

    for($i = 1; $i <= $colors; $i++) {
        $answerColors[$i] = 0;
        $solutionColors[$i] = 0;
    }

    for($i = 1; $i <= $cells; $i++) {
        $answerColors[$answer[$i]]++;
        $solutionColors[$solution[$i]]++;
    }

    $rightColors = 0;
    for($i = 1; $i <= $colors; $i++) {
        if($solutionColors[$i] > $answerColors[$i]) {
            $solutionColors[$i] = $answerColors[$i];
        }
        $rightColors += $solutionColors[$i];
    }

    $rightPositions = 0;
    for($i = 1; $i <= $cells; $i++) {
        if($solution[$i] == $answer[$i]) {
            $rightPositions++;
        }
    }

    $rightColors -= $rightPositions;

    $logtest = $rightPositions . $rightColors;

    $retval = array('black' => $rightPositions, 'white' => $rightColors);
    $retval['answer'] = 'answer';
    if($rightPositions == $cells || $_POST['gameStep'] == $attempts) {
        $retval['answer'] = $answer;
    }
    echo json_encode($retval);

    exit();
}

?>