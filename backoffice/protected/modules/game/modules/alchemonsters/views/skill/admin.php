<h1>Manage Skills</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'skill-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'nameEN',
        array(
            'name' => 'monsterId',
            'value' => '$data->monster->nameEN',
            'filter' => CHtml::listData(Monster::model()->findAll(array('order' => 'nameEN ASC')), 'monsterId', 'nameEN'),
        ),
        array(
            'name' => 'type',
            'value' => array($model, 'convertType'),
            'filter' => $model->getTypeArray(),
        ),
        'detailTH',
        /*array(
            'name' => 'ordinal',
            'value' => array($model, 'convertOrdinal'),
            'filter' => $model->getOrdinalArray(),
        ),*/
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view} {update}',
        ),
    ),
));
?>
