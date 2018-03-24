<?php
$this->breadcrumbs=array(
	'Relate Content Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RelateContentCategory','url'=>array('index')),
	array('label'=>'Manage RelateContentCategory','url'=>array('admin')),
);
?>

<h1>Create RelateContentCategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>