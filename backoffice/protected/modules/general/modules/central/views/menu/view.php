<?php
$this->breadcrumbs = array(
    'Menus' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List Menu', 'url' => array('index')),
    array('label' => 'Create Menu', 'url' => array('create')),
    array('label' => 'Update Menu', 'url' => array('update', 'id' => $model->menuId)),
    array('label' => 'Delete Menu', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->menuId), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Menu', 'url' => array('admin')),
);
?>

<h1>View Menu #<?php echo $model->menuId; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'menuId',
        'name',
        'image',
        'link',
        array(
            'name' => 'position',
            'value' => $model->getPositionValue($model->position),
        ),
        'ordinal',
        array(
            'name' => 'gameId',
            'value' => $model->game->name,
        ),
        array(
            'name' => 'parentMenuId',
            'value' => $model->parentMenu->name,
        ),
    ),
));
?>
