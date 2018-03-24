<?php
$this->breadcrumbs = array(
    'Skills' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List Skill', 'url' => array('index')),
    array('label' => 'Create Skill', 'url' => array('create')),
    array('label' => 'Update Skill', 'url' => array('update', 'id' => $model->skillId)),
    array('label' => 'Delete Skill', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->skillId), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Skill', 'url' => array('admin')),
);
?>

<h1>View Skill #<?php echo $model->skillId; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'skillId',
        array(
            'name' => 'heroId',
            'type' => 'raw',
            'value' => CHtml::image(Yii::app()->request->BaseUrl . $model->hero->image, $model->hero->name, array('width' => '150px')),
        ),
        'name',
        'detailTH',
        array(
            'name' => 'image',
            'type' => 'raw',
            'value' => CHtml::image(Yii::app()->request->BaseUrl . $model->image, $model->name),
        ),
        'youtube',
        'mana',
        'cooldown',
        'noteLeft',
        'noteRight',
        'ordinal',
    ),
));
?>
