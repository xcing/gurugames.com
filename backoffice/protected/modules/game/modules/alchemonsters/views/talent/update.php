<?php
$this->breadcrumbs=array(
	'Talents'=>array('index'),
	$model->talentId=>array('view','id'=>$model->talentId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Talent','url'=>array('index')),
	array('label'=>'Create Talent','url'=>array('create')),
	array('label'=>'View Talent','url'=>array('view','id'=>$model->talentId)),
	array('label'=>'Manage Talent','url'=>array('admin')),
);
?>

<h1>Update Talent <?php echo $model->talentId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>