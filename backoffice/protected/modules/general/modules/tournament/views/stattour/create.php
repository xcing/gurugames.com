<?php
$this->breadcrumbs=array(
	'Stattours'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Stattour','url'=>array('index')),
	array('label'=>'Manage Stattour','url'=>array('admin')),
);
?>

<h1>Create Stattour</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>