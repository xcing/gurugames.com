<h1>Manage Stattours</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'stattour-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
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
        'win',
        'lose',
        array(
            'name' => 'gameId',
            'value' => '$data->game->name',
            'filter' => CHtml::listData(Game::model()->findAll(array('order' => 'name ASC')), 'gameId', 'name'),
        ),
    ),
));
?>
