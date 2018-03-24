<script>
    var tournamentId = '<?= $model->tournamentId; ?>';

    $(document).ready(function() {
        $('#genaratetournament').click(function() {
            if (confirm('แน่ใจว่าคุณต้องการ Genarate ตารางแข่ง')) {
                window.location = '<?php echo Yii::app()->createUrl("general/tournament/tournament/genaratetournament"); ?>/tournamentId/' + tournamentId;
            }
        });
        $('#viewlistteam').click(function() {
            //window.open('http://localhost/work/gurugames/dota2/index.php?r=tournament/viewlistteam&tournamentId=' + tournamentId, '_blank');
            window.open('http://www.dota2.gurugames.in.th/index.php?r=tournament/viewlistteam&tournamentId=' + tournamentId, '_blank');
        });
        $('#viewschedule').click(function() {
            //window.open('http://localhost/work/gurugames/dota2/index.php?r=tournament/schedule&tournamentId=' + tournamentId, '_blank');
            window.open('http://www.dota2.gurugames.in.th/index.php?r=tournament/schedule&tournamentId=' + tournamentId, '_blank');
        });
    });
</script>
<?php
foreach (Yii::app()->user->getFlashes() as $key => $message) {
    echo '<div class="alert alert-' . $key . '" role="alert">' . $message . "</div>\n";
}
?>

<h1>View Tournament #<?php echo $model->tournamentId; ?></h1>

<?php if ($model->status == 0 || $model->status == 1) { ?>
    <button class="btn btn-success" id="genaratetournament">Genarate ตารางแข่ง</button>
<?php } 
else{ ?>
    <button class="btn btn-info" id="viewschedule">ดูตารางแข่ง</button>
<?php } ?>
<button class="btn btn-primary" id="viewlistteam">ดูรายชื่อผู้สมัคร</button>
<br /><br />

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'tournamentId',
        'name',
        'reward',
        'url_reward',
        'picture',
        'picture2',
        'startDate',
        'deadlineDate',
        'champId',
        'secondId',
        'thirdId',
        'gameAmount',
        'finalGameAmount',
        'type',
        'roundAmount',
        'thirdPlace',
        'status',
    ),
));
?>
