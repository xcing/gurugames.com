<?php
$this->breadcrumbs=array(
	'Leaderskills'=>array('index'),
	$model->leaderskillId=>array('view','id'=>$model->leaderskillId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Leaderskill','url'=>array('index')),
	array('label'=>'Create Leaderskill','url'=>array('create')),
	array('label'=>'View Leaderskill','url'=>array('view','id'=>$model->leaderskillId)),
	array('label'=>'Manage Leaderskill','url'=>array('admin')),
);
?>

<h1>Update Leaderskill <?php echo $model->leaderskillId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>