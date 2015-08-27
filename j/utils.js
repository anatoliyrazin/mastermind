var currentCell = '';

function hideAnswer() {
    jQuery('.game-answer .game-cell-value').each(function() {
        jQuery(this).addClass('game-question');
        jQuery(this).html('?');
    });
}

function getCellColor(cid) {
    var ci = 0;
    for(ci = 1; ci <= 6; ci++) {
        if(jQuery('#'+cid).find('.game-cell-value').hasClass('game-selection-'+ci)) {
            return ci;
        }
    }

    return 0;
}

function congratulations(answer) {
    showAnswer(answer);
    alert('Congratulations!');
}

function stopGame(answer) {
    showAnswer(answer);
    alert('Unfortunately, you did not find the right answer. Please try again.');
}

function enterNextStep(black, white, answer) {
    var i = 1;
    while(i <= black) {
        jQuery('#game-control-'+gameStep+'-'+i).addClass('game-answer-black');
        i++;
    }
    var j = 1;
    while(j <= white) {
        i = 5 - j;
        jQuery('#game-control-'+gameStep+'-'+i).addClass('game-answer-white');
        j++;
    }

    commitStep();
    if(black < 4) {
        gameStep++;
        if(gameStep <= 12) {
            activateStep();
        } else {
            stopGame(answer);
        }
    } else {
        congratulations(answer);
    }
}

function submitSolution(colors) {
    jQuery('#game-color-selection').hide();

    var params = new Object();
    params.action = 'submitSolution';
    params.colors = colors;
    params.gameStep = gameStep;
    params.gameSession = jQuery('#game-session').attr('val');
    jQuery.ajax({
        type: "POST",
        url: "a/ajax.php",
        data: params,
        dataType: 'json',
        success: function(resp) {
            // alert(resp); alert(resp.black); alert(resp.white);
            enterNextStep(resp.black, resp.white, resp.answer);
        }
    });
}

function showMissingColor(ci, step) {
    if(step) {
        var opacity = step % 2 ? '0.1' : '1';
        jQuery('#game-cell-'+gameStep+'-'+ci).find('.game-cell-value').animate({'opacity':opacity}, 200, showMissingColor(ci, --step));
    }
}

function commitStep() {
    jQuery('.game-step-active').off('click');
    jQuery('.game-active-pan').off('click');

    jQuery('.game-cell-'+gameStep).each(function() {
        jQuery(this).removeClass('game-active-pan');
    });
    
    jQuery('.game-pan-step-'+gameStep+' .game-step').each(function() {
        // jQuery(this).find('.game-step-value').html('&#9658;');
        jQuery(this).removeClass('game-step-active');
    });
}

function activateStep() {
    
    jQuery('#game-status-msg').html('Step '+gameStep);
    
    jQuery('.game-pan-step-'+gameStep).each(function() {
        jQuery(this).removeClass('game-grey-pan');
    });

    jQuery('.game-cell-'+gameStep).each(function() {
        jQuery(this).addClass('game-active-pan');
    });

    jQuery('.game-pan-step-'+gameStep+' .game-step').each(function() {
        jQuery(this).find('.game-step-value').html('&#9658;');
        jQuery(this).addClass('game-step-active');
    });

    jQuery('.game-step-active').on('click', function() {
        var colors = new Array();
        var submitNow = true;
        var i = 0;
        colors[i] = 0;
        jQuery('.game-cell-'+gameStep).each(function() {
            i++;
            cid = jQuery(this).attr('id');
            colors[i] = getCellColor(cid);
            if(colors[i] == 0) {
                submitNow = false;
                showMissingColor(i, 10);
            }
        });

        if(submitNow) {
            submitSolution(colors);
        }
    });

    jQuery('.game-active-pan').on('click', function() {
        currentCell = jQuery(this).attr('id');

        var pos1 = jQuery(this).offset();
        var pos2 = jQuery('#game-panel').offset();
        // alert(pos1.left); alert(pos1.top); alert(pos2.left); alert(pos2.top); alert(pos1.left - pos2.left); alert(pos1.top - pos2.top);
        var csTop = pos1.top - pos2.top + 30;
        var csLeft = pos1.left - pos2.left;
        jQuery('#game-color-selection').css({'top':csTop+'px','left':csLeft+'px'}).show();
    });
}

function showAnswer(answer) {
    var i = 0;
    jQuery('.game-answer .game-cell-value').each(function() {
        i++;
        jQuery(this).html('');
        jQuery(this).removeClass('game-question');
        jQuery(this).addClass('game-selection-'+answer[i]);
    });
}

function removeCurrectColors() {
    jQuery('#'+currentCell+' .game-cell-value').removeClass('game-selection-1');
    jQuery('#'+currentCell+' .game-cell-value').removeClass('game-selection-2');
    jQuery('#'+currentCell+' .game-cell-value').removeClass('game-selection-3');
    jQuery('#'+currentCell+' .game-cell-value').removeClass('game-selection-4');
    jQuery('#'+currentCell+' .game-cell-value').removeClass('game-selection-5');
    jQuery('#'+currentCell+' .game-cell-value').removeClass('game-selection-6');
}

function loadGame() {
    // alert("on load game");
    hideAnswer();
    activateStep();
    
    jQuery('.game-selection-value').click(function() {
        var cid = jQuery(this).attr('id');
        removeCurrectColors();
        jQuery('#'+currentCell+' .game-cell-value').addClass(cid);
        jQuery('#game-color-selection').hide();
    });
}

jQuery(document).ready(function() {
    loadGame();
});
