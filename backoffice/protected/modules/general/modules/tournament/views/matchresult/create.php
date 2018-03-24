<?php
$this->breadcrumbs=array(
	'Matchresults'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Matchresult','url'=>array('index')),
	array('label'=>'Manage Matchresult','url'=>array('admin')),
);
?>

<h1>Create Matchresult</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>