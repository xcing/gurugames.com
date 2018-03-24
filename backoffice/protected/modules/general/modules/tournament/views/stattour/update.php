<?php
$this->breadcrumbs=array(
	'Stattours'=>array('index'),
	$model->statTourId=>array('view','id'=>$model->statTourId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Stattour','url'=>array('index')),
	array('label'=>'Create Stattour','url'=>array('create')),
	array('label'=>'View Stattour','url'=>array('view','id'=>$model->statTourId)),
	array('label'=>'Manage Stattour','url'=>array('admin')),
);
?>

<h1>Update Stattour <?php echo $model->statTourId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>