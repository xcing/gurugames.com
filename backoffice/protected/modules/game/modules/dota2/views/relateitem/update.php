<?php
$this->breadcrumbs=array(
	'Relateitems'=>array('index'),
	$model->relateItemId=>array('view','id'=>$model->relateItemId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Relateitem','url'=>array('index')),
	array('label'=>'Create Relateitem','url'=>array('create')),
	array('label'=>'View Relateitem','url'=>array('view','id'=>$model->relateItemId)),
	array('label'=>'Manage Relateitem','url'=>array('admin')),
);
?>

<h1>Update Relateitem <?php echo $model->relateItemId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>