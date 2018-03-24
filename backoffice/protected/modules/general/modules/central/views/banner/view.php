<?php
$this->breadcrumbs = array(
    'Banners' => array('index'),
    $model->bannerId,
);

$this->menu = array(
    array('label' => 'List Banner', 'url' => array('index')),
    array('label' => 'Create Banner', 'url' => array('create')),
    array('label' => 'Update Banner', 'url' => array('update', 'id' => $model->bannerId)),
    array('label' => 'Delete Banner', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->bannerId), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Banner', 'url' => array('admin')),
);
?>

<h1>View Banner #<?php echo $model->bannerId; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'bannerId',
        'link',
        'contentId',
        'position',
        'ordinal',
        'image',
        'gameId',
    ),
));
?>
