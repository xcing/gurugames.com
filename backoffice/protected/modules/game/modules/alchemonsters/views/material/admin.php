<h1>Manage Materials</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'material-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'nameEN',
        'nameTH',
        array(
            'name' => 'rare',
            'value' => array($model, 'convertRare'),
            'filter' => $model->getRareArray(),
        ),
        'hp',
        'atk',
        'def',
        'acc',
        'spd',
        'eva',
        'cond',
        'dcond',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view} {update}',
        ),
    ),
));
?>
