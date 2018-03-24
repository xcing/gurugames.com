<?php
$this->breadcrumbs=array(
	'Tags'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Tag','url'=>array('index')),
	array('label'=>'Create Tag','url'=>array('create')),
	array('label'=>'Update Tag','url'=>array('update','id'=>$model->tagId)),
	array('label'=>'Delete Tag','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->tagId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tag','url'=>array('admin')),
);
?>

<h1>View Tag #<?php echo $model->tagId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'tagId',
		'name',
	),
)); ?>
