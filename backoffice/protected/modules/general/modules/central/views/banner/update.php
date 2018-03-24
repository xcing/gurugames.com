<?php
$this->breadcrumbs=array(
	'Banners'=>array('index'),
	$model->bannerId=>array('view','id'=>$model->bannerId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Banner','url'=>array('index')),
	array('label'=>'Create Banner','url'=>array('create')),
	array('label'=>'View Banner','url'=>array('view','id'=>$model->bannerId)),
	array('label'=>'Manage Banner','url'=>array('admin')),
);
?>

<h1>Update Banner <?php echo $model->bannerId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>