<?php
$this->breadcrumbs=array(
	'Relate Game Platforms'=>array('index'),
	$model->relate_game_platformId,
);

$this->menu=array(
	array('label'=>'List RelateGamePlatform','url'=>array('index')),
	array('label'=>'Create RelateGamePlatform','url'=>array('create')),
	array('label'=>'Update RelateGamePlatform','url'=>array('update','id'=>$model->relate_game_platformId)),
	array('label'=>'Delete RelateGamePlatform','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->relate_game_platformId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RelateGamePlatform','url'=>array('admin')),
);
?>

<h1>View RelateGamePlatform #<?php echo $model->relate_game_platformId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'relate_game_platformId',
		'gameId',
		'platformId',
		'webDownload',
		'webOfficial',
	),
)); ?>
