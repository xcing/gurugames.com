<h1>Manage Conditions</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'condition-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'nameEN',
        'nameTH',
        'detailEN',
        'detailTH',
        'durationTurn',
        array(
            'name' => 'type',
            'value' => array($model, 'convertType'),
            'filter' => $model->getTypeArray(),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view} {update}',
        ),
    ),
));
?>
