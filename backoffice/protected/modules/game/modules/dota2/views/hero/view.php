<?php
$this->breadcrumbs = array(
    'Heroes' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List Hero', 'url' => array('index')),
    array('label' => 'Create Hero', 'url' => array('create')),
    array('label' => 'Update Hero', 'url' => array('update', 'id' => $model->heroId)),
    array('label' => 'Delete Hero', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->heroId), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Hero', 'url' => array('admin')),
);
?>

<h1>View Hero #<?php echo $model->heroId; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'heroId',
        'name',
        array(
            'name' => 'image',
            'type' => 'raw',
            'value' => CHtml::image(Yii::app()->request->BaseUrl.$model->image, $model->name),
        ),
        array(
            'name' => 'imageFull',
            'type' => 'raw',
            'value' => CHtml::image(Yii::app()->request->BaseUrl.$model->imageFull, $model->name),
        ),
        'bioTH',
        'bioEN',
        array(
            'name' => 'type',
            'value' => $model->getTypeValue($model->type),
        ),
        'hp',
        'mana',
        'str',
        'agi',
        'int',
        'atk',
        'armor',
        'moveSpd',
        'sightRange',
        'atkRange',
        array(
            'name' => 'missileSpd',
            'value' => $model->missileSpd == 0 ? 'N/A' : $model->missileSpd,
        ),
        array(
            'name' => 'side',
            'value' => $model->getSideValue($model->side),
        ),
        'ordinal',
    ),
));
?>
