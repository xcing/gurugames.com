<?php
$this->breadcrumbs=array(
	'Leaderskills'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Leaderskill','url'=>array('index')),
	array('label'=>'Manage Leaderskill','url'=>array('admin')),
);
?>

<h1>Create Leaderskill</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>