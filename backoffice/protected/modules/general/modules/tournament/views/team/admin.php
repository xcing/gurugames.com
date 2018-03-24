<h1>Manage Teams</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'team-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'name',
        'shortName',
        'email',
        array(
            'name' => 'logo',
            'type' => 'raw',
            'value' => 'CHtml::image("http://dota2.gurugames.in.th".$data->logo, $data->shortName, array("width"=>100))',
            'filter' => false,
        ),
        array(
            'name' => 'gameId',
            'value' => '$data->game->name',
            'filter' => CHtml::listData(Game::model()->findAll(array('order' => 'name ASC')), 'gameId', 'name'),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}',
        ),
    ),
));
?>