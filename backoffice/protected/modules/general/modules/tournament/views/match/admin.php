<h1>Manage Matches</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'match-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'matchId',
        array(
            'name' => 'team1Id',
            'value' => '$data->team1->shortName',
            'filter' => CHtml::listData(TournamentTeam::model()->findAll(array('order' => 'shortName ASC')), 'teamId', 'shortName'),
        ),
        array(
            'name' => 'team2Id',
            'value' => '$data->team2->shortName',
            'filter' => CHtml::listData(TournamentTeam::model()->findAll(array('order' => 'shortName ASC')), 'teamId', 'shortName'),
        ),
        'teamSide',
        'round',
        'result',
        array(
            'name' => 'tournamentId',
            'value' => '$data->tournament->name',
            'filter' => CHtml::listData(Tournament::model()->findAll(array('order' => 'tournamentId DESC')), 'tournamentId', 'name'),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view} {update}',
        ),
    ),
));
?>
