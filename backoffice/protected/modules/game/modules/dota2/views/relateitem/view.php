<?php
$this->breadcrumbs=array(
	'Relateitems'=>array('index'),
	$model->relateItemId,
);

$this->menu=array(
	array('label'=>'List Relateitem','url'=>array('index')),
	array('label'=>'Create Relateitem','url'=>array('create')),
	array('label'=>'Update Relateitem','url'=>array('update','id'=>$model->relateItemId)),
	array('label'=>'Delete Relateitem','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->relateItemId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Relateitem','url'=>array('admin')),
);
?>

<h1>View Relateitem #<?php echo $model->relateItemId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'relateItemId',
		'itemId',
		'materialId',
		'amount',
		'price',
	),
)); ?>
