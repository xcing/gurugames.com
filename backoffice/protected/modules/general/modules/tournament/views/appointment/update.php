<?php
$this->breadcrumbs=array(
	'Appointments'=>array('index'),
	$model->appointmentId=>array('view','id'=>$model->appointmentId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Appointment','url'=>array('index')),
	array('label'=>'Create Appointment','url'=>array('create')),
	array('label'=>'View Appointment','url'=>array('view','id'=>$model->appointmentId)),
	array('label'=>'Manage Appointment','url'=>array('admin')),
);
?>

<h1>Update Appointment <?php echo $model->appointmentId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>