<h1>Manage Users</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'user-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'userId',
        'name',
        'email',
        'password',
        'dateRegistered',
        'lastDateLogin',
        /*
          'type',
          'server',
          'active',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view} {update}',
        ),
    ),
));
?>
