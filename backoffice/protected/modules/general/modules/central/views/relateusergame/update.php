<?php
$this->breadcrumbs=array(
	'Relate User Games'=>array('index'),
	$model->relate_user_gameId=>array('view','id'=>$model->relate_user_gameId),
	'Update',
);

$this->menu=array(
	array('label'=>'List RelateUserGame','url'=>array('index')),
	array('label'=>'Create RelateUserGame','url'=>array('create')),
	array('label'=>'View RelateUserGame','url'=>array('view','id'=>$model->relate_user_gameId)),
	array('label'=>'Manage RelateUserGame','url'=>array('admin')),
);
?>

<h1>Update RelateUserGame <?php echo $model->relate_user_gameId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>