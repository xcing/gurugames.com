<link
    href="<?php echo Yii::app()->request->baseUrl; ?>/css/bracket/jquery.bracket-3.css"
    rel="stylesheet">
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bracket/jquery.bracket-3.js" type="text/javascript" charset="utf-8"></script>

<div style="position:relative;">
   
           
                <div id="tournamentContainer" style="margin: 0 auto;">
                     <div >
                <h2>ตารางการแข่ง <?= $tournament->name; ?></h2>
            </div>

                <div style="margin:10px 0px 10px 15px;">
                    <a href="<?= Yii::app()->createUrl('tournament'); ?>" >
                        <button class="btn backtotour" >ย้อนกลับไปรายการแข่ง</button>
                    </a>
                </div>
                <div class="bottomMenu" style="position:fixed;top:0;z-index:3;display:none;">
     <?php if ($roundSchedules): ?>
                        <div id="tournamentRoundHeader" style="
background-color: #141414;
color: white;
bottom:0;
height:70px;
padding-top:10px;">
                            
                                <?php foreach ($roundSchedules as $round): ?>
                                    <div style="display: block;
float: left;width: 100px;text-align:center;margin-right:40px;"
                                    <?php
                                    if ($round->round > 1) {
                                        echo 'class="nextRound" ';
                                    }
                                    ?>>
                                            <?php if ($round->date && $round->date != '0000-00-00 00:00:00'): ?>
                                            <span class="scheduleRound" style="color:#cf0606;">Round <?= $round->round; ?></span>
                                            <span class="scheduleDate"><?= date('d/m/Y', strtotime($round->date)); ?></span>
                                            <br />
                                            <span class="scheduleDate"><?= date('H:i', strtotime($round->date)); ?></span>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                           
                        </div>
                    <?php endif; ?>
    </div>
 <?php if ($roundSchedules): ?>
                        <div id="tournamentRoundHeader" style="
background-color: #141414;
color: white;
bottom:0;
height:70px;
padding-top:10px;">
                            
                                <?php foreach ($roundSchedules as $round): ?>
                                    <div style="display: block;
float: left;width: 100px;text-align:center;margin-right:40px;"
                                    <?php
                                    if ($round->round > 1) {
                                        echo 'class="nextRound" ';
                                    }
                                    ?>>
                                            <?php if ($round->date && $round->date != '0000-00-00 00:00:00'): ?>
                                            <span class="scheduleRound" style="color:#cf0606;">Round <?= $round->round; ?></span>
                                            <span class="scheduleDate"><?= date('d/m/Y', strtotime($round->date)); ?></span>
                                            <br />
                                            <span class="scheduleDate"><?= date('H:i', strtotime($round->date)); ?></span>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                           
                        </div>
                    <?php endif; ?>
                    <div id="tournamentBracket"></div>
                    
                </div>
      

  
</div>

<script>
    var tourData = {
        teams: <?= json_encode($tourData->getTeams()); ?>,
        results: <?= json_encode($tourData->getResults()); ?>
    }
    $('#tournamentBracket').bracket({
        init: tourData,
        gameAmount: <?= $tourData->getGameAmount(); ?>,
        finalGameAmount: <?= $tourData->getFinalGameAmount(); ?>,
        showThirdPlace: <?= $tourData->hasThirdPlace(); ?>
    });

    $(document).scroll(function () {
    var y = $(this).scrollTop();
    if (y > 200) {
        $('.bottomMenu').fadeIn();
    } else {
        $('.bottomMenu').fadeOut();
    }

});
</script>


