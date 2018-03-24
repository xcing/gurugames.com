<?php
$this->breadcrumbs = array(
    'Heroes' => array('index'),
    $model->name => array('view', 'id' => $model->heroId),
    'Update',
);

$this->menu = array(
    array('label' => 'List Hero', 'url' => array('index')),
    array('label' => 'Create Hero', 'url' => array('create')),
    array('label' => 'View Hero', 'url' => array('view', 'id' => $model->heroId)),
    array('label' => 'Manage Hero', 'url' => array('admin')),
);
?>

<h1>Update Hero <?php echo $model->heroId; ?></h1>

<?php
echo $this->renderPartial('_form', array(
    'model' => $model,
    'allRole' => $allRole,
    'roles' => $roles,
    'allRoleName' => $allRoleName,
));
?>