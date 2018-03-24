<h1>Manage Appointments</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'appointment-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'matchId',
        array(
            'name' => 'teamId',
            'value' => '$data->team->shortName',
            'filter' => CHtml::listData(TournamentTeam::model()->findAll(array('order' => 'shortName ASC')), 'teamId', 'shortName'),
        ),
        'detail',
        'date',
    ),
));
?>
