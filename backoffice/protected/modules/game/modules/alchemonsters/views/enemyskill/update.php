<?php
$this->breadcrumbs=array(
	'Enemyskills'=>array('index'),
	$model->skillId=>array('view','id'=>$model->skillId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Enemyskill','url'=>array('index')),
	array('label'=>'Create Enemyskill','url'=>array('create')),
	array('label'=>'View Enemyskill','url'=>array('view','id'=>$model->skillId)),
	array('label'=>'Manage Enemyskill','url'=>array('admin')),
);
?>

<h1>Update Enemyskill <?php echo $model->skillId; ?></h1>

<?php
echo $this->renderPartial('_form', array(
    'model' => $model,
    'allCondition' => $allCondition,
    'allConditionName' => $allConditionName,
));
?>