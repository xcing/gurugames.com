<?php
$this->breadcrumbs=array(
	'Menus'=>array('index'),
	$model->name=>array('view','id'=>$model->menuId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Menu','url'=>array('index')),
	array('label'=>'Create Menu','url'=>array('create')),
	array('label'=>'View Menu','url'=>array('view','id'=>$model->menuId)),
	array('label'=>'Manage Menu','url'=>array('admin')),
);
?>

<h1>Update Menu <?php echo $model->menuId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>