<?php
$dif = TournamentCalculateScore::getScoreWinAndLose($team1Model->score, $team2Model->score);

if ($matchModel->teamSide == 1) {
    $land1 = 'Radiant';
    $colorLand1 = '#0FA80F';
    $land2 = 'Dire';
    $colorLand2 = '#CF0606';
} else {
    $land1 = 'Dire';
    $colorLand1 = '#CF0606';
    $land2 = 'Radiant';
    $colorLand2 = '#0FA80F';
}
if ($matchModel->result == 1) {
    $positionWon = 'left:34px;top:118px;';
    $positionLose = 'left:684px;top:126px;';
} else if ($matchModel->result == 2) {
    $positionWon = 'left:684px;top:118px;';
    $positionLose = 'left:34px;top:126px;';
}
?>

<script>
    document.title = '<?= addslashes('Gurugames Tournament round ' . $matchModel->round . ' ' . $team1Model->shortName . ' vs ' . $team2Model->shortName); ?>';
</script>
<div class="content page1">
    <div class="container_24">
        <div class="grid_24">
            <h2>รายละเอียดการแข่งขันระหว่าง <?= $team1Model->name; ?> VS <?= $team2Model->name; ?></h2>
        </div>
        <div class="clear"></div>
        <div class="grid_5">
            <?php $this->renderPartial('leftside'); ?>
        </div>
        <div class="grid_19">

            <div style="margin:0px 0px 0px 15px;">
                <a href="<?= Yii::app()->createUrl('tournament/schedule', array('tournamentId' => $matchModel->tournamentId)); ?>" >
                    <button class="btn" style="padding:10px 20px;font-size: 1.25em;background-color:#222222;color:white;">ย้อนกลับไปตารางแข่ง</button>
                </a>
            </div>
            <div style="font-weight:bold;font-size:1.5em;text-align: center;color:#cf0606;">
                Round : <?= $matchModel->round; ?>
            </div>
            <div style="font-weight:bold;font-size:1.3em;text-align: center;color:#222222;margin:10px 0px;">
                แข่งวันที่ <?= date('d/m/Y', strtotime($roundScheduleModel->date)); ?> เวลา <?= date('H:i', strtotime($roundScheduleModel->date)); ?>
            </div>
            <div class="col-lg-6" style="text-align:center;">
                <div style="font-weight: bold;line-height: 1.2em;font-size:1.2em;letter-spacing: 2px;color: <?= $colorLand1 ?>;"><?= $land1 ?></div>
                <div>
                    <a href="<?= Yii::app()->createUrl('tournament/profileteam', array('teamId' => $team1Model->teamId)); ?>">
                        <img src="<?= Yii::app()->baseUrl . $team1Model->logo; ?>" width="120" />
                    </a>
                </div>
                <div>
                    <a href="<?= Yii::app()->createUrl('tournament/profileteam', array('teamId' => $team1Model->teamId)); ?>">
                        <span style="font-weight: bold;line-height: 1.2em;font-size: 1.2em;letter-spacing: 2px;color: #cf0606;"><?= $team1Model->shortName ?></span>
                    </a>
                </div>
                <div>
                    <b>ชื่อทีม :</b> <?= $team1Model->name; ?>
                </div>
                <div>
                    <b>Score :</b> <?= $team1Model->score; ?>
                </div>
                <div>
                    <b>Rate :</b> +<?= $dif['dif1win'] ?> / -<?= $dif['dif1lose'] ?>
                </div>
            </div>
            <div class="col-lg-6" style="text-align:center;">
                <div style="font-weight: bold;line-height: 1.2em;font-size:1.2em;letter-spacing: 2px;color: <?= $colorLand2 ?>;"><?= $land2 ?></div>
                <div>
                    <a href="<?= Yii::app()->createUrl('tournament/profileteam', array('teamId' => $team2Model->teamId)); ?>">
                        <img src="<?= Yii::app()->baseUrl . $team2Model->logo; ?>" width="120" />
                    </a>
                </div>
                <div>
                    <a href="<?= Yii::app()->createUrl('tournament/profileteam', array('teamId' => $team2Model->teamId)); ?>">
                        <span style="font-weight: bold;line-height: 1.2em;font-size: 1.2em;letter-spacing: 2px;color: #cf0606;"><?= $team2Model->shortName ?></span>
                    </a>
                </div>
                <div>
                    <b>ชื่อทีม :</b> <?= $team2Model->name; ?>
                </div>
                <div>
                    <b>Score :</b> <?= $team2Model->score; ?>
                </div>
                <div>
                    <b>Rate :</b> +<?= $dif['dif2win'] ?> / -<?= $dif['dif2lose'] ?>
                </div>
            </div>
            <div class="clear"></div>
            <br /><br />
            <div class="col-lg-12" style="margin-bottom:20px;">
                <?php if ($matchModel->result != 0) { ?>
                    <?php
                    if ($matchModel->result == 1) {
                        $teamWin = $team1Model->shortName;
                    } else if ($matchModel->result == 2) {
                        $teamWin = $team2Model->shortName;
                    }
                    ?>
                    <div style="font-weight: bold;line-height: 1.2em;font-size: 1.2em;letter-spacing: 2px;color: #cf0606;text-align: center;">Winner : <?= $teamWin; ?></div>
                <?php } ?>
                <?php
                if ($matchModel->round == $tournamentModel->roundAmount) {
                    $gameAmount = $tournamentModel->finalGameAmount;
                    $isFinalRound = true;
                } else {
                    $gameAmount = $tournamentModel->gameAmount;
                    $isFinalRound = false;
                }
                ?>
                <?php for ($i = 1; $i <= $gameAmount; $i++) { ?>
                    <?php if (!isset($matchResultsModel[$i - 1]) && $matchModel->result == 0) { ?>
                        <?php if (!Yii::app()->user->isGuest) { ?>
                            <?php if (Yii::app()->user->id == $team1Model->teamId || Yii::app()->user->id == $team2Model->teamId) { ?>
                                <br /><br />
                                <a href="<?=
                                Yii::app()->createUrl('tournament/matchresult', array(
                                    'matchId' => $matchModel->matchId,
                                    'game' => $i,
                                    'amount' => $gameAmount,
                                    'isFinalRound' => $isFinalRound,
                                ));
                                ?>">
                                    <button class="btn btn-success" style="margin:0px;">แจ้งผลการแข่งขัน <?php if ($gameAmount > 1) { ?>เกมที่&nbsp;<?=
                                            $i;
                                        }
                                        ?></button>
                                </a>
                            <?php } ?>
                        <?php } ?>
                        <?php
                    } else if (isset($matchResultsModel[$i - 1])) {
                        if ($matchResultsModel[$i - 1]->result == 1) {
                            $teamWin = $team1Model->shortName;
                            $teamWinId = $team1Model->teamId;
                        } else if ($matchResultsModel[$i - 1]->result == 2) {
                            $teamWin = $team2Model->shortName;
                            $teamWinId = $team2Model->teamId;
                        } else if ($matchModel->result == 0) {
                            $teamWin = 'แพ้บาย ทั้ง 2 ทีม';
                            $teamWinId = '';
                        }
                        ?>

                        <div style="font-weight: bold;margin-bottom: 5px;text-align: center;">
                            <?php if ($gameAmount > 1) { ?>
                                Game <?= $i; ?> : 
                            <?php } ?>
                            <?= $teamWin; ?>&nbsp;<?php
                            if ($matchResultsModel[$i - 1]->result != 0) {
                                if ($matchResultsModel[$i - 1]->screenshot == '') {
                                    echo 'Free Won';
                                } else {
                                    echo 'Won';
                                }
                            }
                            ?>
                        </div>
                        <?php if ($matchResultsModel[$i - 1]->screenshot != '') { ?>
                            <a href="<?= $matchResultsModel[$i - 1]->screenshot; ?>" target="_blank">
                                <img src="<?= $matchResultsModel[$i - 1]->screenshot; ?>" class="img-responsive" />
                            </a>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
                <!-- <div style="margin:20px 0px;">
                    <div style="padding-top:10px;">
                        <a href="<?= Yii::app()->createUrl('tournament/rule'); ?>" style="margin-right:20px;">
                            <button class="btn" style="font-size:1.5em;padding:10px 20px;background-color:#222222;color:white;">กฏการแข่ง</button>
                        </a>
                        <a href="<?= Yii::app()->createUrl('tournament/tutorpostresult'); ?>">
                            <button class="btn" style="font-size:1.5em;padding:10px 20px;background-color:#222222;color:white;">วิธีการแจ้งผล</button>
                        </a>
                    </div>
                </div> -->

                <div style="border:1px solid #222222;background-color: #CF0606;color:white;width:100%;font-size:1.5em;padding:10px;text-align: center;font: 30px/32px 'thaisans_neuebold';">โพสนัดแนะการแข่ง</div>
                <div style="border:1px solid #222222;">
                    <?php if (count($appointmentModel) > 0) { ?>
                        <?php foreach ($appointmentModel as $entry): ?>
                            <div style="background-color: #222222;padding:5px;color:white;">
                                <span>
                                    <a href="<?= Yii::app()->createUrl('tournament/profileteam', array('teamId' => $entry->teamId)); ?>">
                                        <?= $entry->team->shortName ?>
                                    </a>
                                </span>
                                <span style="padding-left: 5px;"> <?= $entry->date ?></span>
                            </div>
                            <div style="border:0px solid #222222;padding:5px;">
                                <div style="float:left;">
                                    <a href="<?= Yii::app()->createUrl('tournament/profileteam', array('teamId' => $entry->teamId)); ?>">
                                        <img width="40"  height="40" src="<?php echo Yii::app()->baseUrl . $entry->team->logo ?>" />
                                    </a>
                                </div>
                                <div class="postContent" style="float:left;padding-left:10px;width:80%;word-wrap:break-word;">
                                    <?= nl2br($entry->detail); ?>
                                </div>
                                <div style="clear:both;"></div>
                            </div>
                        <?php endforeach ?>
                    <?php } ?>
                    <div style="background-color: #222222;padding:5px;color:white;text-align: center;">
                        โพสข้อความใหม่
                    </div> 
                    <?php if (!Yii::app()->user->isGuest) { ?>
                        <?php if (Yii::app()->user->id == $team1Model->teamId || Yii::app()->user->id == $team2Model->teamId || Yii::app()->user->id == 1) { ?>
                            <div style="padding:5px;">
                                <form method="post" id="commentForm" action="<?= Yii::app()->createUrl('tournament/addcomment'); ?>">
                                    <input type="hidden" id="matchId" name="matchId" value="<?= $matchModel->matchId; ?>"></input>
                                    <div>
                                        <img src="<?= Yii::app()->baseUrl . Yii::app()->user->logo; ?>" alt="<?= Yii::app()->user->shortName; ?>" style="width:40px;"/>
                                        <textarea rows="2" name="comment" style="width: 90%;"></textarea>
                                    </div>
                                    <div align="center" style="margin:10px 0px 10px 0px;">
                                        <input type="submit" class="btn btn-success" value="Post" style="padding:5px 20px;font-size:1.25em"></input>
                                    </div>
                                </form>
                            </div>
                        <?php } else { ?>
                            <div style="text-align:center;padding:10px;">
                                ขออภัย สามารถโพสได้เฉพาะทีม ที่แข่งกันเท่านั้น
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div style="text-align:center;padding:10px;">
                            โปรด login ก่อน
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
