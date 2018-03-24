<?php
$this->breadcrumbs=array(
	'Roundschedules'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Roundschedule','url'=>array('index')),
	array('label'=>'Manage Roundschedule','url'=>array('admin')),
);
?>

<h1>Create Roundschedule</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>