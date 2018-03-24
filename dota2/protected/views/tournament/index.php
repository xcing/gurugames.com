<script>
    $(document).ready(function () {
        $('.registertournament').click(function () {
            var isGuest = $(this).attr('isLogin');
            var tournamentId = $(this).attr('tournamentId');
            if (isGuest) {
                alert('กรุณา Login ก่อนครับ');
            }
            else if (confirm('แน่ใจว่าคุณต้องการสมัครแข่งขัน')) {
                window.location = '<?php echo Yii::app()->createUrl("tournament/registertournament"); ?>/tournamentId/' + tournamentId;
            }
        });
        $('.cancelregistertournament').click(function () {
            var tournamentId = $(this).attr('tournamentId');
            if (confirm('แน่ใจว่าคุณต้องการยกเลิกการสมัครแข่งขัน')) {
                window.location = '<?php echo Yii::app()->createUrl("tournament/cancelregistertournament"); ?>/tournamentId/' + tournamentId;
            }
        });
    });
</script>

<div class="content page1" >
    <div class="container_24">
        <div class="grid_24">
            <h2>Tournaments ทัวร์นาเม้นต์</h2>
        </div>
        <div class="clear"></div>
        <div class="grid_5">
            <?php $this->renderPartial('leftside'); ?>
        </div>
        <div class="grid_19">
            <?php foreach ($tournamentModel as $tournament) { ?>
                <div style="margin-bottom:20px;text-align: center;">
                    <div style="padding:10px;font-weight: bold;font-size: 1.25em;background-color: #CF0606;color: white;width:100%;text-align: left;"><?= $tournament->name; ?></div>
                    <div style="border:1px solid #CF0606;text-align: left;padding:10px;color:white;background-color:#222222;">
                        <div class="col-lg-5" style="max-width: 355px;text-align: right;">
                            <img src="<?= $tournament->picture; ?>" />
                            <br />
                            <?php if ($tournament->picture2 != null) { ?>
                                <img src="<?= $tournament->picture2; ?>" width="190" height="60"/>
                            <?php } ?>
                        </div>
                        <div class="col-lg-5">
                            <div>เริ่มแข่งขันวันที่ : <?= date('d/m/Y', strtotime($tournament->startDate)); ?></div>
                            <div>ปิดรับสมัครวันที่ : <?= date('d/m/Y', strtotime($tournament->deadlineDate)); ?></div>

                            <div>
                                <?php if ($tournament->type == 1) { ?>
                                    รูปแบบ: Single Elimination 1 วัน/1 รอบ
                                <?php } else if ($tournament->type == 2) { ?>
                                    รูปแบบ: Double Elimination 1 วัน/1 รอบ
                                <?php } ?>
                            </div>
                            <?php if ($tournament->reward != null) { ?>
                                <div>รางวัล : 
                                    <a href='<?= $tournament->url_reward; ?>'>
                                        <?= $tournament->reward; ?>
                                    </a>
                                </div>
                            <?php } ?>
                            <div>ผู้สมัคร <?= $relatetourteamArray[$tournament->tournamentId]['count']; ?> ทีม</div>

                            <div>
                                <?php if ($tournament->status == 0 && $relatetourteamArray[$tournament->tournamentId]['isRegister'] == false) { ?>
                                    <button class="btn registertournament" style="background-color:#CF0606;color:white;" isLogin="<?= Yii::app()->user->isGuest; ?>" tournamentId="<?= $tournament->tournamentId; ?>">สมัครแข่งขัน</button>
                                <?php } else if ($tournament->status == 0 && $relatetourteamArray[$tournament->tournamentId]['isRegister'] == true) {
                                    ?>
                                    <button class="btn cancelregistertournament" style="background-color:#CF0606;color:white;" tournamentId="<?= $tournament->tournamentId; ?>">ยกเลิกการสมัคร</button>
                                <?php } ?>
                                <a href="<?= Yii::app()->createUrl('tournament/viewlistteam', array('tournamentId' => $tournament->tournamentId)); ?>"><button class="btn" style="background-color:#CF0606;color:white;">ดูรายชื่อผู้สมัคร</button></a>
                                <?php if ($tournament->status == 2 || $tournament->status == 3) { ?>
                                    <a href="<?= Yii::app()->createUrl('tournament/schedule', array('tournamentId' => $tournament->tournamentId)); ?>"><button class="btn" style="background-color:#CF0606;color:white;">ดูตารางแข่ง</button></a>
                                <?php } ?>

                            </div>
                        </div>
                        <div class="col-lg-2">
                            <?php if ($tournament->status == 3) { ?>
                                <div style="text-align:center;">
                                    <div style="color:#FF6347;font-size:1.25em;">Champion</div>
                                    <a href="<?= Yii::app()->createUrl('tournament/profileteam', array('teamId' => $tournament->team1->teamId)); ?>">
                                        <div><img src="<?= $tournament->team1->logo; ?>" height="80" width="80"/></div>
                                        <div style="color:#FFC300;font-size:1.25em;"><?= $tournament->team1->shortName; ?></div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="clear"></div>
    </div>
</div>