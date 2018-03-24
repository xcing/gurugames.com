<?php
$this->breadcrumbs=array(
	'Appointments',
);

$this->menu=array(
	array('label'=>'Create Appointment','url'=>array('create')),
	array('label'=>'Manage Appointment','url'=>array('admin')),
);
?>

<h1>Appointments</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
