<?php
$this->breadcrumbs=array(
	'Relate User Games'=>array('index'),
	$model->relate_user_gameId,
);

$this->menu=array(
	array('label'=>'List RelateUserGame','url'=>array('index')),
	array('label'=>'Create RelateUserGame','url'=>array('create')),
	array('label'=>'Update RelateUserGame','url'=>array('update','id'=>$model->relate_user_gameId)),
	array('label'=>'Delete RelateUserGame','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->relate_user_gameId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RelateUserGame','url'=>array('admin')),
);
?>

<h1>View RelateUserGame #<?php echo $model->relate_user_gameId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'relate_user_gameId',
		'userId',
		'gameId',
		'updatedDate',
	),
)); ?>
