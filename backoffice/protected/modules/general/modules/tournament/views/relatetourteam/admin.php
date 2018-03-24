<h1>Manage Relatetourteams</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'relatetourteam-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'tournamentId',
            'value' => '$data->tournament->name',
            'filter' => CHtml::listData(Tournament::model()->findAll(array('order' => 'tournamentId DESC')), 'tournamentId', 'name'),
        ),
        array(
            'name' => 'teamId',
            'value' => '$data->team->shortName',
            'filter' => CHtml::listData(TournamentTeam::model()->findAll(array('order' => 'shortName ASC')), 'teamId', 'shortName'),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{delete}',
        ),
    ),
));
?>
