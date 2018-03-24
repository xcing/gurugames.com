<?php
$this->breadcrumbs=array(
	'Relate Game Categories'=>array('index'),
	$model->relate_game_categoryId=>array('view','id'=>$model->relate_game_categoryId),
	'Update',
);

$this->menu=array(
	array('label'=>'List RelateGameCategory','url'=>array('index')),
	array('label'=>'Create RelateGameCategory','url'=>array('create')),
	array('label'=>'View RelateGameCategory','url'=>array('view','id'=>$model->relate_game_categoryId)),
	array('label'=>'Manage RelateGameCategory','url'=>array('admin')),
);
?>

<h1>Update RelateGameCategory <?php echo $model->relate_game_categoryId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>