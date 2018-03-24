<script>
    var teamId = '<?= $model->teamId; ?>';

    $(document).ready(function() {
        $('#resetpassword').click(function() {
            if (confirm('แน่ใจว่าคุณต้องการ Reset Password')) {
                window.location = '<?php echo Yii::app()->createUrl("general/tournament/team/resetpassword"); ?>/teamId/' + teamId;
            }
        });
    });
</script>
<?php
foreach (Yii::app()->user->getFlashes() as $key => $message) {
    echo '<div class="alert alert-' . $key . '" role="alert">' . $message . "</div>\n";
}
?>

<h1>View Team #<?php echo $model->teamId; ?></h1>

<button class="btn btn-danger" id="resetpassword">Reset Password</button>

<br /><br />
<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'teamId',
        'name',
        'shortName',
        'email',
        array(
            'name' => 'logo',
            'type' => 'raw',
            'value' => CHtml::image('http://dota2.gurugames.in.th' . $model->logo, $model->shortName, array("width" => 100)),
        ),
        'score',
        'win',
        'lose',
    ),
));
?>
