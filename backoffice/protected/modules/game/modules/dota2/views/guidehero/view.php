<?php
$this->breadcrumbs = array(
    'Guideheroes' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List Guidehero', 'url' => array('index')),
    array('label' => 'Create Guidehero', 'url' => array('create')),
    array('label' => 'Update Guidehero', 'url' => array('update', 'id' => $model->guideHeroId)),
    array('label' => 'Delete Guidehero', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->guideHeroId), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Guidehero', 'url' => array('admin')),
);
?>

<h1>View Guidehero #<?php echo $model->guideHeroId; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'guideHeroId',
        'name',
        'skill',
        'startItem',
        'earlyItem',
        'coreItem',
        'lateItem',
        'dynamicItem',
        'detail',
        'ordinal',
        'heroId',
    ),
));
?>
