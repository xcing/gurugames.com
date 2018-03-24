<?php
$this->breadcrumbs=array(
	'Matchresults'=>array('index'),
	$model->matchResultId=>array('view','id'=>$model->matchResultId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Matchresult','url'=>array('index')),
	array('label'=>'Create Matchresult','url'=>array('create')),
	array('label'=>'View Matchresult','url'=>array('view','id'=>$model->matchResultId)),
	array('label'=>'Manage Matchresult','url'=>array('admin')),
);
?>

<h1>Update Matchresult <?php echo $model->matchResultId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>