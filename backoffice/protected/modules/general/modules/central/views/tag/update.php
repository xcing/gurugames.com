<?php
$this->breadcrumbs=array(
	'Tags'=>array('index'),
	$model->name=>array('view','id'=>$model->tagId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tag','url'=>array('index')),
	array('label'=>'Create Tag','url'=>array('create')),
	array('label'=>'View Tag','url'=>array('view','id'=>$model->tagId)),
	array('label'=>'Manage Tag','url'=>array('admin')),
);
?>

<h1>Update Tag <?php echo $model->tagId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>