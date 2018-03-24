<?php
$this->breadcrumbs=array(
	'Roundschedules',
);

$this->menu=array(
	array('label'=>'Create Roundschedule','url'=>array('create')),
	array('label'=>'Manage Roundschedule','url'=>array('admin')),
);
?>

<h1>Roundschedules</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
