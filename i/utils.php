<?php

function generateRandSet() {
    return array("A", "S", "T", "h", "E", "D", "l", "e", "u", "[",
                 "i", "c", "\"", "*", "W", "n", "f", "C", "o", "a",
                 "I", "-", "r", "J", "P", "w", "t", "m", "R", "s",
                 "k", "d", ",", "_", "p", "g", "b", "y", "'", "N",
                 ";", "!", ":", "j", ".", "M", "q", "L", "]", "U",
                 "?", "v", "F", "H", "x", "O", "B", "z", "(", "Y",
                 "V", "Q", "K", ")", "G", "X", "1", "/", "8", "2",
                 "7", "9", "3", "4", "5", "6", "0", "@", "\$");
}

function alphanumRandSet($randset) {
    $newset = array();
    foreach($randset as $val) {
        if($val >= 'A' && $val <= 'Z' || $val >= 'a' && $val <= 'z' || $val >= '0' && $val <= '9') {
           $newset[] = $val;
        }
    }

    return $newset;
}

function generateRandColor($randset, $colors) {
    $colorset = array();
    foreach($randset as $val) {
        $color = ord($val) % $colors + 1;
        $colorset[$color][] = $val;
    }

    return $colorset;
}

function buildAnswer($colors, $cells) {
    $answer = array();
    for($i = 1; $i <= $cells; $i++) {
        $answer[$i] = rand(1, $colors);
    }

    return $answer;
}

function encodeAnswer($answer) {
    $answer2 = "";
    foreach($answer as $val) {
        $answer2 .= $val;
    }

    return $answer2;
}

function getRandChar($answer2, $pos, $randcolor) {
    $pos -= 1;
    $chr = substr($answer2, $pos, 1);
    $color = $randcolor[$chr];

    return $color; 
}

function generatePositions($answer, $answer2 = false, $randcolor = false) {
    $pos = array();
    $pos[1] = 11;
    if($answer2) {
        $answer[1] = getRandChar($answer2, $pos[1], $randcolor);
    }
    switch($answer[1]) {
        case 1:
            $pos[2] = 4;
            if($answer2) {
                $answer[2] = getRandChar($answer2, $pos[2], $randcolor);
            }
            switch($answer[2]) {
                case 1:
                   $pos[3] = 25;
                   $pos[4] = 2;
                    break;
                case 2:
                   $pos[3] = 15;
                   $pos[4] = 21;
                    break;
                case 3:
                   $pos[3] = 1;
                   $pos[4] = 30;
                    break;
                case 4:
                   $pos[3] = 19;
                   $pos[4] = 13;
                    break;
                case 5:
                   $pos[3] = 30;
                   $pos[4] = 2;
                    break;
                case 6:
                   $pos[3] = 5;
                   $pos[4] = 20;
                    break;
            }
            break;
        case 2:
            $pos[2] = 19;
            if($answer2) {
                $answer[2] = getRandChar($answer2, $pos[2], $randcolor);
            }
            switch($answer[2]) {
                case 1:
                   $pos[3] = 5;
                   $pos[4] = 22;
                    break;
                case 2:
                   $pos[3] = 17;
                   $pos[4] = 26;
                    break;
                case 3:
                   $pos[3] = 3;
                   $pos[4] = 6;
                    break;
                case 4:
                   $pos[3] = 2;
                   $pos[4] = 27;
                    break;
                case 5:
                   $pos[3] = 28;
                   $pos[4] = 25;
                    break;
                case 6:
                   $pos[3] = 16;
                   $pos[4] = 9;
                    break;
            }
            break;
        case 3:
            $pos[2] = 8;
            if($answer2) {
                $answer[2] = getRandChar($answer2, $pos[2], $randcolor);
            }
            switch($answer[2]) {
                case 1:
                   $pos[3] = 2;
                   $pos[4] = 12;
                    break;
                case 2:
                   $pos[3] = 27;
                   $pos[4] = 9;
                    break;
                case 3:
                   $pos[3] = 19;
                   $pos[4] = 3;
                    break;
                case 4:
                   $pos[3] = 13;
                   $pos[4] = 21;
                    break;
                case 5:
                   $pos[3] = 31;
                   $pos[4] = 30;
                    break;
                case 6:
                   $pos[3] = 9;
                   $pos[4] = 5;
                    break;
            }
            break;
        case 4:
            $pos[2] = 29;
            if($answer2) {
                $answer[2] = getRandChar($answer2, $pos[2], $randcolor);
            }
            switch($answer[2]) {
                case 1:
                   $pos[3] = 32;
                   $pos[4] = 1;
                    break;
                case 2:
                   $pos[3] = 4;
                   $pos[4] = 21;
                    break;
                case 3:
                   $pos[3] = 16;
                   $pos[4] = 15;
                    break;
                case 4:
                   $pos[3] = 24;
                   $pos[4] = 8;
                    break;
                case 5:
                   $pos[3] = 5;
                   $pos[4] = 19;
                    break;
                case 6:
                   $pos[3] = 14;
                   $pos[4] = 7;
                    break;
            }
            break;
        case 5:
            $pos[2] = 23;
            if($answer2) {
                $answer[2] = getRandChar($answer2, $pos[2], $randcolor);
            }
            switch($answer[2]) {
                case 1:
                   $pos[3] = 1;
                   $pos[4] = 19;
                    break;
                case 2:
                   $pos[3] = 30;
                   $pos[4] = 1;
                    break;
                case 3:
                   $pos[3] = 25;
                   $pos[4] = 32;
                    break;
                case 4:
                   $pos[3] = 10;
                   $pos[4] = 13;
                    break;
                case 5:
                   $pos[3] = 20;
                   $pos[4] = 3;
                    break;
                case 6:
                   $pos[3] = 21;
                   $pos[4] = 12;
                    break;
            }
            break;
        case 6:
            $pos[2] = 7;
            if($answer2) {
                $answer[2] = getRandChar($answer2, $pos[2], $randcolor);
            }
            switch($answer[2]) {
                case 1:
                   $pos[3] = 17;
                   $pos[4] = 32;
                    break;
                case 2:
                   $pos[3] = 24;
                   $pos[4] = 5;
                    break;
                case 3:
                   $pos[3] = 5;
                   $pos[4] = 25;
                    break;
                case 4:
                   $pos[3] = 32;
                   $pos[4] = 1;
                    break;
                case 5:
                   $pos[3] = 20;
                   $pos[4] = 9;
                    break;
                case 6:
                   $pos[3] = 13;
                   $pos[4] = 4;
                   break;
            }
            break;
    }

    if($answer2) {
        $answer[3] = getRandChar($answer2, $pos[3], $randcolor);
        $answer[4] = getRandChar($answer2, $pos[4], $randcolor);
        
        return $answer;
    }

    $positionset = array();
    for($i = 1; $i <= 32; $i++) {
        $positionset[$i] = 0;
    }

    foreach($pos as $key => $val) {
        $positionset[$val] = $key;
    }

    return $positionset;
}

function setRandChar($i, $positionset, $answer, $randset, $randcolor) {
    $pos = $positionset[$i];
    if($pos) {
        $color = $answer[$pos];
        $vol = count($randcolor[$color]);
        $c = rand(1, $vol) % $vol;
        $chr = $randcolor[$color][$c];
    } else {
        $vol = count($randset);
        $c = rand(1, $vol) % $vol;
        $chr = $randset[$c];
    }

    return $chr;
}

function encodeAnswerEx($answer, $colors, $cells) {
    $randset = generateRandSet();
    $randset = alphanumRandSet($randset);
    $randcolor = generateRandColor($randset, $colors);
    $positionset = generatePositions($answer);

    $answer2 = "";
    for($i = 1; $i <= 32; $i++) {
        $answer2 .= setRandChar($i, $positionset, $answer, $randset, $randcolor);
    }

    return $answer2;
}

function decodeAnswer($answer2) {
    $answer = array();
    $i = 0;
    while($answer2) {
        $i++;
        $answer[$i] = substr($answer2, 0, 1);
        $answer2 = substr($answer2, 1);
    }

    return $answer;
}

function getRandColor($randcolor) {
    $retval = array();
    foreach($randcolor as $key => $val) {
        foreach($val as $val1) {
            $retval[$val1] = $key;
        }
    }

    return $retval;
}

function decodeAnswerEx($answer2, $colors) {
    $answer = array();

    $randset = generateRandSet();
    $randset = alphanumRandSet($randset);
    $randcolor = generateRandColor($randset, $colors);
    $randcolor = getRandColor($randcolor);

    $answer = generatePositions($answer, $answer2, $randcolor);

    return $answer;
}

?>