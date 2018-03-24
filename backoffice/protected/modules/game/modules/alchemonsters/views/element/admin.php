<h1>Manage Elements</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'element-grid',
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
