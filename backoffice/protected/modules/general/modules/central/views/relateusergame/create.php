<?php
$this->breadcrumbs=array(
	'Relate User Games'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RelateUserGame','url'=>array('index')),
	array('label'=>'Manage RelateUserGame','url'=>array('admin')),
);
?>

<h1>Create RelateUserGame</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>