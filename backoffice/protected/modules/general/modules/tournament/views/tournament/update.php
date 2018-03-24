<?php
$this->breadcrumbs=array(
	'Tournaments'=>array('index'),
	$model->name=>array('view','id'=>$model->tournamentId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tournament','url'=>array('index')),
	array('label'=>'Create Tournament','url'=>array('create')),
	array('label'=>'View Tournament','url'=>array('view','id'=>$model->tournamentId)),
	array('label'=>'Manage Tournament','url'=>array('admin')),
);
?>

<h1>Update Tournament <?php echo $model->tournamentId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>