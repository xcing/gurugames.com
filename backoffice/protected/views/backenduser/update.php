<?php
$this->breadcrumbs=array(
	'Backend Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BackendUser', 'url'=>array('index')),
	array('label'=>'Create BackendUser', 'url'=>array('create')),
	array('label'=>'View BackendUser', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BackendUser', 'url'=>array('admin')),
);
?>

<h1>Update BackendUser <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>