<?php
$this->breadcrumbs=array(
	'Elements'=>array('index'),
	$model->elementId=>array('view','id'=>$model->elementId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Element','url'=>array('index')),
	array('label'=>'Create Element','url'=>array('create')),
	array('label'=>'View Element','url'=>array('view','id'=>$model->elementId)),
	array('label'=>'Manage Element','url'=>array('admin')),
);
?>

<h1>Update Element <?php echo $model->elementId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>