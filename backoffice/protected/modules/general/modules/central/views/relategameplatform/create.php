<?php
$this->breadcrumbs=array(
	'Relate Game Platforms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RelateGamePlatform','url'=>array('index')),
	array('label'=>'Manage RelateGamePlatform','url'=>array('admin')),
);
?>

<h1>Create RelateGamePlatform</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>