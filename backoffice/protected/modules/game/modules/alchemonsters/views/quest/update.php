<?php
$this->breadcrumbs=array(
	'Quests'=>array('index'),
	$model->questId=>array('view','id'=>$model->questId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Quest','url'=>array('index')),
	array('label'=>'Create Quest','url'=>array('create')),
	array('label'=>'View Quest','url'=>array('view','id'=>$model->questId)),
	array('label'=>'Manage Quest','url'=>array('admin')),
);
?>

<h1>Update Quest <?php echo $model->questId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>