<h1>Manage Tournaments</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'tournament-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'name',
        array(
            'name' => 'picture',
            'type' => 'raw',
            'value' => 'CHtml::image(Yii::app()->baseUrl.$data->picture, $data->name, array("width"=>120))',
            'filter' => false,
        ),
        'startDate',
        array(
            'name' => 'champId',
            'type' => 'raw',
            'value' => 'CHtml::image(Yii::app()->baseUrl.$data->team1->logo, $data->team1->shortName, array("width"=>60))',
            'filter' => false,
        ),
        array(
            'name' => 'secondId',
            'type' => 'raw',
            'value' => 'CHtml::image(Yii::app()->baseUrl.$data->team2->logo, $data->team2->shortName, array("width"=>60))',
            'filter' => false,
        ),
        array(
            'name' => 'status',
            'value' => array($model, 'convertStatus'),
            'filter' => $model->getStatusArray(),
        ),
        array(
            'name' => 'gameId',
            'value' => '$data->game->name',
            'filter' => CHtml::listData(Game::model()->findAll(array('order' => 'name ASC')), 'gameId', 'name'),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view} {update}',
        ),
    ),
));
?>
