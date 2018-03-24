<?php
$this->breadcrumbs=array(
	'Relateitems'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Relateitem','url'=>array('index')),
	array('label'=>'Manage Relateitem','url'=>array('admin')),
);
?>

<h1>Create Relateitem</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>