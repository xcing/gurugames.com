<?php
$this->breadcrumbs=array(
	'Roundschedules'=>array('index'),
	$model->roundScheduleId,
);

$this->menu=array(
	array('label'=>'List Roundschedule','url'=>array('index')),
	array('label'=>'Create Roundschedule','url'=>array('create')),
	array('label'=>'Update Roundschedule','url'=>array('update','id'=>$model->roundScheduleId)),
	array('label'=>'Delete Roundschedule','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->roundScheduleId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Roundschedule','url'=>array('admin')),
);
?>

<h1>View Roundschedule #<?php echo $model->roundScheduleId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'roundScheduleId',
		'tournamentId',
		'round',
		'date',
	),
)); ?>
