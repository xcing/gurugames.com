<h1>Manage Roundschedules</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'roundschedule-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'tournamentId',
            'value' => '$data->tournament->name',
            'filter' => CHtml::listData(Tournament::model()->findAll(array('order' => 'tournamentId DESC')), 'tournamentId', 'name'),
        ),
        'round',
        'date',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update}',
        ),
    ),
));
?>
