<?php

include_once("inc/utils.php");
include_once("inc/settings.php");

$answer = buildAnswer($colors, $cells);
$answer2a = encodeAnswer($answer);
$answer2a = "";
$answer2 = encodeAnswerEx($answer, $colors, $cells);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<title>Mastermind</title>

<meta name="Description" content="Mastermind" />

<link href="s/style.css" type="text/css" media="all" rel="stylesheet" />
<script type="text/javascript" src="j/jquery.js"></script>
<script type="text/javascript" src="j/utils.js"></script>
</head>
<body id="body">

<div class="page-container">

<header><h1>Mastermind</h1><?php echo $answer2a; ?></header>

<div class="page-body-container">
    <div class="game-container">
        <div id="game-panel" class="game-panel">
            <div id="game-color-selection">
                <?php for($i = 1; $i <= $colors; $i++) { ?>
                <div class="game-selection-value game-selection-value-<?php echo $i; ?>" id="game-selection-<?php echo $i; ?>"></div>
                <?php } ?>
            </div>
            <div class="game-answer">
                <div class="game-left-pan">
                    <div class="game-row">
                        <?php for($i = 1; $i <= $cells; $i++) { ?>
                        <div class="game-cell"><div class="game-cell-value"></div></div>
                        <?php } ?>
                    </div>
                </div>
                <div class="game-right-pan">
                    <a class="game-header-reset" href="">Restart game</a>
                </div>
                <div id="game-session" val="<?php echo $answer2; ?>" class="clr"></div>
            </div>
            <div class="game-main">
                <div class="game-left-pan">
                    <?php for($i = 1; $i <= $attempts; $i++) { ?>
                    <div class="game-row game-pan-step-<?php echo $i; ?> game-grey-pan">
                        <?php for($j = 1; $j <= $cells; $j++) { ?>
                        <div id="game-cell-<?php echo $i; ?>-<?php echo $j; ?>" class="game-cell game-cell-<?php echo $i; ?>"><div class="game-cell-value"></div></div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="game-right-pan">
                    <?php for($i = 1; $i <= $attempts; $i++) { ?>
                    <div class="game-row game-pan-step-<?php echo $i; ?> game-grey-pan">
                        <div class="game-step"><div class="game-step-value"></div></div>
                        <div class="game-control">
                            <?php for($j = 1; $j <= $cells; $j++) { ?>
                            <div id="game-control-<?php echo $i; ?>-<?php echo $j; ?>" class="game-control-n game-control-<?php echo $j; ?>"></div>
                            <?php } ?>
                        </div>
                        <div class="clr"></div>
                    </div>
                    <?php } ?>
                </div>
                <div class="clr"></div>
            </div>
            <div id="game-status-msg" class="game-status"></div>
        </div>
        <div class="clr"></div>
    </div>
</div>

<footer></footer>

</div>

<script>
var gameStep = 1;
</script>

</body>
</html>
