<?php
$this->breadcrumbs=array(
	'Skills'=>array('index'),
	$model->name=>array('view','id'=>$model->skillId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Skill','url'=>array('index')),
	array('label'=>'Create Skill','url'=>array('create')),
	array('label'=>'View Skill','url'=>array('view','id'=>$model->skillId)),
	array('label'=>'Manage Skill','url'=>array('admin')),
);
?>

<h1>Update Skill <?php echo $model->skillId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>