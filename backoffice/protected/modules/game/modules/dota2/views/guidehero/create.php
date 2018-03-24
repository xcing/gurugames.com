<?php
$this->breadcrumbs = array(
    'Guideheroes' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Guidehero', 'url' => array('index')),
    array('label' => 'Manage Guidehero', 'url' => array('admin')),
);
?>

<h1>Create Guidehero</h1>

<?php
echo $this->renderPartial('_form', array(
    'model' => $model,
    'allItem' => $allItem,
    'allItemName' => $allItemName,
));
?>