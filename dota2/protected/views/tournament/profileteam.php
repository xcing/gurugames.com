<div class="content page1">
    <div class="container_24">
         <div class="grid_24">
            <h2>Profile Team : <?= $teamModel->name; ?></h2>
        </div>
        <div class="clear"></div>
        <div class="grid_5">
            <?php $this->renderPartial('leftside'); ?>
        </div>
        <div class="grid_19" style="margin-bottom: 20px;">
            
            <div style="margin-left:30px;">
                <div><img src="<?= Yii::app()->baseUrl . $teamModel->logo; ?>"</div>
                <br /><br />
                <div style="font-size:1.25em;"><b>ชื่อทีม</b> : <?= $teamModel->name; ?></div>
                <div style="font-size:1.25em;"><b>ชื่อย่อ</b> : <?= $teamModel->shortName; ?></div>
                <?php if (Yii::app()->user->id == $teamModel->teamId) { ?>
                    <div style="font-size:1.25em;"><b>Email</b> : <?= $teamModel->email; ?></div>
                <?php } ?>
                <div style="font-size:1.25em;"><b>Score</b> : <?= $teamModel->score; ?></div>
                <div style="font-size:1.25em;"><b>Win</b> : <?= $teamModel->win; ?></div>
                <div style="font-size:1.25em;"><b>Lose</b> : <?= $teamModel->lose; ?></div>
                <br />
                <?php if (Yii::app()->user->id == $teamModel->teamId) { ?>
                    <a href="<?= Yii::app()->createUrl('tournament/updateprofileteam'); ?>">
                        <button class="btn" style="background-color: #222222;color:white;">แก้ไขข้อมูลทีม</button>
                    </a>
                    <a href="<?= Yii::app()->createUrl('tournament/updatepasswordteam'); ?>">
                        <button class="btn" style="background-color: #CF0606;color:white;">แก้ไขพาสเวิร์ด</button>
                    </a>
                    <br /><br />
                <?php } ?>

                <div style="border: 1px solid #222222;
background-color: #CF0606;
color: white;
width: 100%;
font-size: 1.5em;
padding: 10px;
text-align: center;
font: 30px/32px 'thaisans_neuebold';">ประวัติการแข่ง</div>
                <div style="border: 1px solid #222222;border-top: 0px solid #222222;padding:10px;" >
                    <div class="col-xs-1" style="text-align: center;">WIN</div>
                    <div class="col-xs-9" style="text-align: center;">
                        ENEMY
                    </div>
                    <div class="col-xs-1" style="text-align: center;">LOSE</div>
                    <div class="clear"></div>
                    <?php foreach ($stattourModel as $stattour) { ?>
                        <div class="col-xs-1" style="text-align: center;"><?= $stattour->win; ?></div>
                        <div class="col-xs-9" style="text-align: center;">
                            <?= $stattour->team2->shortName . ' (' . $stattour->team2->score . ')'; ?>
                        </div>
                        <div class="col-xs-1" style="text-align: center;"><?= $stattour->lose; ?></div>
                        <div class="clear"></div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clear" style="padding-bottom:30px;"></div>
</div>