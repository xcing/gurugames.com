<?php
$this->breadcrumbs=array(
	'Races'=>array('index'),
	$model->raceId=>array('view','id'=>$model->raceId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Race','url'=>array('index')),
	array('label'=>'Create Race','url'=>array('create')),
	array('label'=>'View Race','url'=>array('view','id'=>$model->raceId)),
	array('label'=>'Manage Race','url'=>array('admin')),
);
?>

<h1>Update Race <?php echo $model->raceId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>