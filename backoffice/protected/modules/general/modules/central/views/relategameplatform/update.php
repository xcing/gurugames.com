<?php
$this->breadcrumbs=array(
	'Relate Game Platforms'=>array('index'),
	$model->relate_game_platformId=>array('view','id'=>$model->relate_game_platformId),
	'Update',
);

$this->menu=array(
	array('label'=>'List RelateGamePlatform','url'=>array('index')),
	array('label'=>'Create RelateGamePlatform','url'=>array('create')),
	array('label'=>'View RelateGamePlatform','url'=>array('view','id'=>$model->relate_game_platformId)),
	array('label'=>'Manage RelateGamePlatform','url'=>array('admin')),
);
?>

<h1>Update RelateGamePlatform <?php echo $model->relate_game_platformId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>