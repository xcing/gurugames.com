<?php
$this->breadcrumbs=array(
	'Accessories'=>array('index'),
	$model->accessoryId,
);

$this->menu=array(
	array('label'=>'List Accessory','url'=>array('index')),
	array('label'=>'Create Accessory','url'=>array('create')),
	array('label'=>'Update Accessory','url'=>array('update','id'=>$model->accessoryId)),
	array('label'=>'Delete Accessory','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->accessoryId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Accessory','url'=>array('admin')),
);
?>

<h1>View Accessory #<?php echo $model->accessoryId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'accessoryId',
		'nameEN',
		'nameTH',
		'nameCN',
		'condition',
		'rare',
		'limitLv',
	),
)); ?>
