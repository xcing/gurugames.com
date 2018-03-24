<?php
$this->breadcrumbs=array(
	'Relate Game Categories'=>array('index'),
	$model->relate_game_categoryId,
);

$this->menu=array(
	array('label'=>'List RelateGameCategory','url'=>array('index')),
	array('label'=>'Create RelateGameCategory','url'=>array('create')),
	array('label'=>'Update RelateGameCategory','url'=>array('update','id'=>$model->relate_game_categoryId)),
	array('label'=>'Delete RelateGameCategory','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->relate_game_categoryId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RelateGameCategory','url'=>array('admin')),
);
?>

<h1>View RelateGameCategory #<?php echo $model->relate_game_categoryId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'relate_game_categoryId',
		'gameId',
		'categoryId',
	),
)); ?>
