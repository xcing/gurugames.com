<?php
$this->breadcrumbs = array(
    'Items' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List Item', 'url' => array('index')),
    array('label' => 'Create Item', 'url' => array('create')),
    array('label' => 'Update Item', 'url' => array('update', 'id' => $model->itemId)),
    array('label' => 'Delete Item', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->itemId), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Item', 'url' => array('admin')),
);
?>

<h1>View Item #<?php echo $model->itemId; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'itemId',
        'name',
        array(
            'name' => 'image',
            'type' => 'raw',
            'value' => CHtml::image(Yii::app()->request->BaseUrl . $model->image, $model->name),
        ),
        'detailTH',
        'detailEN',
        'price',
        'bonus',
        'informationTH',
        'informationEN',
        'informationTH2',
        'ordinal',
        array(
            'name' => 'location',
            'value' => $model->getLocationValue($model->location),
        ),
    ),
));
?>
