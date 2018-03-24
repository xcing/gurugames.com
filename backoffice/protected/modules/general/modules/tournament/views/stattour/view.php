<?php
$this->breadcrumbs=array(
	'Stattours'=>array('index'),
	$model->statTourId,
);

$this->menu=array(
	array('label'=>'List Stattour','url'=>array('index')),
	array('label'=>'Create Stattour','url'=>array('create')),
	array('label'=>'Update Stattour','url'=>array('update','id'=>$model->statTourId)),
	array('label'=>'Delete Stattour','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->statTourId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Stattour','url'=>array('admin')),
);
?>

<h1>View Stattour #<?php echo $model->statTourId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'statTourId',
		'team1Id',
		'team2Id',
		'win',
		'lose',
	),
)); ?>
