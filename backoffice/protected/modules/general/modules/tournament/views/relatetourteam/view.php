<?php
$this->breadcrumbs=array(
	'Relatetourteams'=>array('index'),
	$model->relateTourTeamId,
);

$this->menu=array(
	array('label'=>'List Relatetourteam','url'=>array('index')),
	array('label'=>'Create Relatetourteam','url'=>array('create')),
	array('label'=>'Update Relatetourteam','url'=>array('update','id'=>$model->relateTourTeamId)),
	array('label'=>'Delete Relatetourteam','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->relateTourTeamId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Relatetourteam','url'=>array('admin')),
);
?>

<h1>View Relatetourteam #<?php echo $model->relateTourTeamId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'relateTourTeamId',
		'tournamentId',
		'teamId',
	),
)); ?>
