<?php
$this->breadcrumbs=array(
	'Relate Content Tags'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RelateContentTag','url'=>array('index')),
	array('label'=>'Manage RelateContentTag','url'=>array('admin')),
);
?>

<h1>Create RelateContentTag</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>