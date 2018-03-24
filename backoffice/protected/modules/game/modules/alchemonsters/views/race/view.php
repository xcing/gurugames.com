<?php
$this->breadcrumbs=array(
	'Races'=>array('index'),
	$model->raceId,
);

$this->menu=array(
	array('label'=>'List Race','url'=>array('index')),
	array('label'=>'Create Race','url'=>array('create')),
	array('label'=>'Update Race','url'=>array('update','id'=>$model->raceId)),
	array('label'=>'Delete Race','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->raceId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Race','url'=>array('admin')),
);
?>

<h1>View Race #<?php echo $model->raceId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'raceId',
		'nameEN',
		'nameTH',
		'nameCN',
	),
)); ?>
