<?php
$this->breadcrumbs=array(
	'Enemies'=>array('index'),
	$model->monsterId,
);

$this->menu=array(
	array('label'=>'List Enemy','url'=>array('index')),
	array('label'=>'Create Enemy','url'=>array('create')),
	array('label'=>'Update Enemy','url'=>array('update','id'=>$model->monsterId)),
	array('label'=>'Delete Enemy','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->monsterId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Enemy','url'=>array('admin')),
);
?>

<h1>View Enemy #<?php echo $model->monsterId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'monsterId',
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
		'elementId',
		'raceId',
	),
)); ?>
