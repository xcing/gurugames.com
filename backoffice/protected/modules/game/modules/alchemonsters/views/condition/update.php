<?php
$this->breadcrumbs=array(
	'Conditions'=>array('index'),
	$model->conditionId=>array('view','id'=>$model->conditionId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Condition','url'=>array('index')),
	array('label'=>'Create Condition','url'=>array('create')),
	array('label'=>'View Condition','url'=>array('view','id'=>$model->conditionId)),
	array('label'=>'Manage Condition','url'=>array('admin')),
);
?>

<h1>Update Condition <?php echo $model->conditionId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>