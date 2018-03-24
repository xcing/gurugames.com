<?php
$this->breadcrumbs = array(
    'Heroes' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Hero', 'url' => array('index')),
    array('label' => 'Manage Hero', 'url' => array('admin')),
);
?>

<h1>Create Hero</h1>

<?php
echo $this->renderPartial('_form', array(
    'model' => $model,
    'allRole' => $allRole,
    'roles' => $roles,
    'allRoleName' => $allRoleName,
));
?>