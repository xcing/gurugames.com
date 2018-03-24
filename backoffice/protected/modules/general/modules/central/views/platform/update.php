<?php
$this->breadcrumbs=array(
	'Platforms'=>array('index'),
	$model->name=>array('view','id'=>$model->platformId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Platform','url'=>array('index')),
	array('label'=>'Create Platform','url'=>array('create')),
	array('label'=>'View Platform','url'=>array('view','id'=>$model->platformId)),
	array('label'=>'Manage Platform','url'=>array('admin')),
);
?>

<h1>Update Platform <?php echo $model->platformId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>