<?php
$this->breadcrumbs=array(
	'Quests'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Quest','url'=>array('index')),
	array('label'=>'Manage Quest','url'=>array('admin')),
);
?>

<h1>Create Quest</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>