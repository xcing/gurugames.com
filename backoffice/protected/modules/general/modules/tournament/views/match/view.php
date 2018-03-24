<script>
    var matchId = '<?= $model->matchId; ?>';
    var tournamentId = '<?= $model->tournamentId; ?>';

    $(document).ready(function() {
        $('#team1wonbye').click(function() {
            if (confirm('แน่ใจว่าคุณต้องการให้ทีม 1 ชนะบาย')) {
                window.location = '<?php echo Yii::app()->createUrl("general/tournament/match/wonbye"); ?>/matchId/' + matchId + '/teamWin/1';
            }
        });
        $('#team2wonbye').click(function() {
            if (confirm('แน่ใจว่าคุณต้องการให้ทีม 2 ชนะบาย')) {
                window.location = '<?php echo Yii::app()->createUrl("general/tournament/match/wonbye"); ?>/matchId/' + matchId + '/teamWin/2';
            }
        });
        $('#bothlosebye').click(function() {
            if (confirm('แน่ใจว่าคุณต้องการให้แพ้บายทั้งคู่')) {
                window.location = '<?php echo Yii::app()->createUrl("general/tournament/match/bothlosebye"); ?>/matchId/' + matchId;
            }
        });
        $('#cancelresult').click(function() {
            if (confirm('แน่ใจว่าคุณต้องการยกเลิกผลการแข่งขัน')) {
                window.location = '<?php echo Yii::app()->createUrl("general/tournament/match/cancelresult"); ?>/matchId/' + matchId;
            }
        });
        $('#viewschedule').click(function() {
            window.open('http://localhost/work/gurugames/dota2/index.php?r=tournament/schedule&tournamentId=' + tournamentId, '_blank');
            //window.open('http://www.dota2.gurugames.in.th/index.php?r=tournament/schedule&tournamentId=' + tournamentId, '_blank');
        });
    });
</script>
<?php
foreach (Yii::app()->user->getFlashes() as $key => $message) {
    echo '<div class="alert alert-' . $key . '" role="alert">' . $message . "</div>\n";
}
?>

<h1>View Match #<?php echo $model->matchId; ?></h1>

<?php if ($model->result == null) { ?>
    <button class="btn btn-primary" id="team1wonbye">ให้ทีม 1 ชนะบาย</button>
    <button class="btn btn-success" id="team2wonbye">ให้ทีม 2 ชนะบาย</button>
    <button class="btn btn-danger" id="bothlosebye">แพ้บายทั้งคู่</button>
<?php } else { ?>
    <button class="btn btn-warning" id="cancelresult">ยกเลิกผลการแข่งขัน</button>
<?php } ?>
<button class="btn btn-info" id="viewschedule">ดูตารางแข่ง</button>

<br /><br />
<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'matchId',
        array(
            'name' => 'team1Id',
            'value' => $model->team1->shortName,
        ),
        array(
            'name' => 'team2Id',
            'value' => $model->team2->shortName,
        ),
        'teamSide',
        'round',
        'result',
        'winnerMatchId',
        'tournamentId',
        'ordinal',
    ),
));
?>
