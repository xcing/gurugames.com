<?php
$this->breadcrumbs = array(
    'Guideheroes' => array('index'),
    $model->name => array('view', 'id' => $model->guideHeroId),
    'Update',
);

$this->menu = array(
    array('label' => 'List Guidehero', 'url' => array('index')),
    array('label' => 'Create Guidehero', 'url' => array('create')),
    array('label' => 'View Guidehero', 'url' => array('view', 'id' => $model->guideHeroId)),
    array('label' => 'Manage Guidehero', 'url' => array('admin')),
);
?>

<h1>Update Guidehero <?php echo $model->guideHeroId; ?></h1>

<?php
echo $this->renderPartial('_form', array(
    'model' => $model,
    'allItem' => $allItem,
    'allItemName' => $allItemName,
));
?>