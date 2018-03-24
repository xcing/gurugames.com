<div class="content page1">
    <div class="container_24">
        <div class="grid_24">
            <h2>รายชื่อผู้สมัคร</h2>
        </div>
        <div class="clear"></div>

        <div class="grid_5">
            <?php $this->renderPartial('leftside'); ?>
        </div>
        <div class="grid_19">
            
            <?php foreach ($tourteamModel as $team) { ?>
                <div class="col-lg-3">
                    <div><a href="<?= Yii::app()->createUrl('tournament/profileteam', array('teamId' => $team->teamId)); ?>"><img src="<?= $team->team->logo; ?>" width="120" /></a></div>
                    <div>
                        <a href="<?= Yii::app()->createUrl('tournament/profileteam', array('teamId' => $team->teamId)); ?>" style="text-decoration: none;">
                            <span style="font-weight: bold;color: #cf0606;">
                                <?= $team->team->shortName ?> (<?= $team->team->score; ?>)
                            </span>
                        </a>
                    </div>
                </div>
            <?php } ?>
            <div class="clear"></div>
        </div>
    </div>
</div>