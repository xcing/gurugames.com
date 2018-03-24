<?php
$this->breadcrumbs=array(
	'Conditions'=>array('index'),
	$model->conditionId,
);

$this->menu=array(
	array('label'=>'List Condition','url'=>array('index')),
	array('label'=>'Create Condition','url'=>array('create')),
	array('label'=>'Update Condition','url'=>array('update','id'=>$model->conditionId)),
	array('label'=>'Delete Condition','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->conditionId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Condition','url'=>array('admin')),
);
?>

<h1>View Condition #<?php echo $model->conditionId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'conditionId',
		'nameEN',
		'nameTH',
		'nameCN',
		'detailEN',
		'detailTH',
		'detailCN',
		'durationTurn',
		'type',
	),
)); ?>
