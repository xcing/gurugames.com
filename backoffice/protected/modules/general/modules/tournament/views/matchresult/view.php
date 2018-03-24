<?php
$this->breadcrumbs=array(
	'Matchresults'=>array('index'),
	$model->matchResultId,
);

$this->menu=array(
	array('label'=>'List Matchresult','url'=>array('index')),
	array('label'=>'Create Matchresult','url'=>array('create')),
	array('label'=>'Update Matchresult','url'=>array('update','id'=>$model->matchResultId)),
	array('label'=>'Delete Matchresult','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->matchResultId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Matchresult','url'=>array('admin')),
);
?>

<h1>View Matchresult #<?php echo $model->matchResultId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'matchResultId',
		'result',
		'matchId',
		'screenshot',
		'game',
	),
)); ?>
