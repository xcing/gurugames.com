<h1>Manage Accessories</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'accessory-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'nameEN',
        'nameTH',
        array(
            'name' => 'condition',
            'value' => '$data->condition->nameEN',
            'filter' => CHtml::listData(Condition::model()->findAll(array('order' => 'nameEN ASC')), 'conditionId', 'nameEN'),
        ),
        array(
            'name' => 'rare',
            'value' => array($model, 'convertRare'),
            'filter' => $model->getRareArray(),
        ),
        'limitLv',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view} {update}',
        ),
    ),
));
?>
