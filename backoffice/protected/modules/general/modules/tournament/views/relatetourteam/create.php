<?php
$this->breadcrumbs=array(
	'Relatetourteams'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Relatetourteam','url'=>array('index')),
	array('label'=>'Manage Relatetourteam','url'=>array('admin')),
);
?>

<h1>Create Relatetourteam</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>