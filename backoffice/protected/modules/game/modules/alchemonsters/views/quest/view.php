<?php
$this->breadcrumbs=array(
	'Quests'=>array('index'),
	$model->questId,
);

$this->menu=array(
	array('label'=>'List Quest','url'=>array('index')),
	array('label'=>'Create Quest','url'=>array('create')),
	array('label'=>'Update Quest','url'=>array('update','id'=>$model->questId)),
	array('label'=>'Delete Quest','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->questId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Quest','url'=>array('admin')),
);
?>

<h1>View Quest #<?php echo $model->questId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'questId',
		'nameEN',
		'nameTH',
		'nameCN',
		'detailEN',
		'detailTH',
		'detailCN',
		'conditionLv',
		'conditionDetail',
		'type',
	),
)); ?>
