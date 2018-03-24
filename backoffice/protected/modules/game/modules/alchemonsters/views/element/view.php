<?php
$this->breadcrumbs=array(
	'Elements'=>array('index'),
	$model->elementId,
);

$this->menu=array(
	array('label'=>'List Element','url'=>array('index')),
	array('label'=>'Create Element','url'=>array('create')),
	array('label'=>'Update Element','url'=>array('update','id'=>$model->elementId)),
	array('label'=>'Delete Element','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->elementId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Element','url'=>array('admin')),
);
?>

<h1>View Element #<?php echo $model->elementId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'elementId',
		'nameEN',
		'nameTH',
		'nameCN',
	),
)); ?>
