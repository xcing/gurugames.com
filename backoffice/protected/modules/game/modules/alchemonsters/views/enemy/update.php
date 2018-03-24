<?php
$this->breadcrumbs=array(
	'Enemies'=>array('index'),
	$model->monsterId=>array('view','id'=>$model->monsterId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Enemy','url'=>array('index')),
	array('label'=>'Create Enemy','url'=>array('create')),
	array('label'=>'View Enemy','url'=>array('view','id'=>$model->monsterId)),
	array('label'=>'Manage Enemy','url'=>array('admin')),
);
?>

<h1>Update Enemy <?php echo $model->monsterId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>