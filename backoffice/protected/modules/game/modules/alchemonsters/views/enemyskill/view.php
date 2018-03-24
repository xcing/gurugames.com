<?php
$this->breadcrumbs=array(
	'Enemyskills'=>array('index'),
	$model->skillId,
);

$this->menu=array(
	array('label'=>'List Enemyskill','url'=>array('index')),
	array('label'=>'Create Enemyskill','url'=>array('create')),
	array('label'=>'Update Enemyskill','url'=>array('update','id'=>$model->skillId)),
	array('label'=>'Delete Enemyskill','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->skillId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Enemyskill','url'=>array('admin')),
);
?>

<h1>View Enemyskill #<?php echo $model->skillId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'skillId',
		'nameEN',
		'nameTH',
		'nameCN',
		'enemyId',
		'type',
		'isHeal',
		'dmg',
		'dmgAcc',
		'target',
		'condition',
		'condAcc',
		'selfCond',
		'reactCond',
		'reactCondAcc',
		'cd',
		'castTime',
		'ordinal',
	),
)); ?>
