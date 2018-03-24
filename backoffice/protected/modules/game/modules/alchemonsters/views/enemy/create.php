<?php
$this->breadcrumbs=array(
	'Enemies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Enemy','url'=>array('index')),
	array('label'=>'Manage Enemy','url'=>array('admin')),
);
?>

<h1>Create Enemy</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>