<?php
$this->breadcrumbs=array(
	'Relatetourteams'=>array('index'),
	$model->relateTourTeamId=>array('view','id'=>$model->relateTourTeamId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Relatetourteam','url'=>array('index')),
	array('label'=>'Create Relatetourteam','url'=>array('create')),
	array('label'=>'View Relatetourteam','url'=>array('view','id'=>$model->relateTourTeamId)),
	array('label'=>'Manage Relatetourteam','url'=>array('admin')),
);
?>

<h1>Update Relatetourteam <?php echo $model->relateTourTeamId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>