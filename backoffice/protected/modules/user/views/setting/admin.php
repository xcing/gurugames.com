<h1>จัดการข้อมูลผู้ใช้</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'user-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'username',
        'firstname',
        'lastname',
        'created',
        array(
            'name' => 'role',
            'value' => array($model, 'convertRole'),
            'filter' => $model->getRoleArray(),
        ),
        'salary',
        'outgoing',
        array(
            'name' => 'active',
            'value' => array($model, 'convertActive'),
            'filter' => $model->getActiveArray(),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view} {update}',
        ),
    ),
));
?>
