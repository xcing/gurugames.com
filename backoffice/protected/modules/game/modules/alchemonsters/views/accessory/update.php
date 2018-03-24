<?php
$this->breadcrumbs=array(
	'Accessories'=>array('index'),
	$model->accessoryId=>array('view','id'=>$model->accessoryId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Accessory','url'=>array('index')),
	array('label'=>'Create Accessory','url'=>array('create')),
	array('label'=>'View Accessory','url'=>array('view','id'=>$model->accessoryId)),
	array('label'=>'Manage Accessory','url'=>array('admin')),
);
?>

<h1>Update Accessory <?php echo $model->accessoryId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>