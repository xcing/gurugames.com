<h1>Manage Talents</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'talent-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'nameEN',
        'nameTH',
        'hp',
        'atk',
        'def',
        'acc',
        'eva',
        'spd',
        'cond',
        'dcond',
        array(
            'name' => 'condition',
            'value' => '$data->condition->nameEN',
            'filter' => CHtml::listData(Condition::model()->findAll(array('order' => 'nameEN ASC')), 'conditionId', 'nameEN'),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view} {update}',
        ),
    ),
));
?>
