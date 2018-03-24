<?php
$this->breadcrumbs = array(
    'Talents' => array('index'),
    $model->talentId,
);

$this->menu = array(
    array('label' => 'List Talent', 'url' => array('index')),
    array('label' => 'Create Talent', 'url' => array('create')),
    array('label' => 'Update Talent', 'url' => array('update', 'id' => $model->talentId)),
    array('label' => 'Delete Talent', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->talentId), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Talent', 'url' => array('admin')),
);
?>

<h1>View Talent #<?php echo $model->talentId; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'talentId',
        'nameEN',
        'nameTH',
        'nameCN',
        'hp',
        'atk',
        'def',
        'acc',
        'eva',
        'spd',
        'cond',
        'dcond',
        'condition',
        'limitLv',
        'materialId1',
        'materialAmount1',
        'materialId2',
        'materialAmount2',
    ),
));
?>
