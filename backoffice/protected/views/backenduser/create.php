<?php
$this->breadcrumbs=array(
	'Backend Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BackendUser', 'url'=>array('index')),
	array('label'=>'Manage BackendUser', 'url'=>array('admin')),
);
?>

<h1>Create BackendUser</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>