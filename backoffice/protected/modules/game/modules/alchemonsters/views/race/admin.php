<h1>Manage Races</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'race-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'nameEN',
        'nameTH',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view} {update}',
        ),
    ),
));
?>
