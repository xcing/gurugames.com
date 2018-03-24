<h1>ดูรายละเอียดข้อมูลผู้ใช้ <?php echo $model->firstname; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'username',
        'firstname',
        'lastname',
        'created',
        array(
            'name' => 'role',
            'value' => $model->getRoleValue($model->role),
        ),
        'salary',
        'outgoing',
        array(
            'name' => 'active',
            'value' => $model->getActiveValue($model->active),
        ),
    ),
));
?>
