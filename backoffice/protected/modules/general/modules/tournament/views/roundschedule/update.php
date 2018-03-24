<?php
$this->breadcrumbs=array(
	'Roundschedules'=>array('index'),
	$model->roundScheduleId=>array('view','id'=>$model->roundScheduleId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Roundschedule','url'=>array('index')),
	array('label'=>'Create Roundschedule','url'=>array('create')),
	array('label'=>'View Roundschedule','url'=>array('view','id'=>$model->roundScheduleId)),
	array('label'=>'Manage Roundschedule','url'=>array('admin')),
);
?>

<h1>Update Roundschedule <?php echo $model->roundScheduleId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>