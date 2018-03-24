<?php
$this->breadcrumbs=array(
	'Relate Game Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RelateGameCategory','url'=>array('index')),
	array('label'=>'Manage RelateGameCategory','url'=>array('admin')),
);
?>

<h1>Create RelateGameCategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>