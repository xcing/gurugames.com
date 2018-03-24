<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->categoryId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Category','url'=>array('index')),
	array('label'=>'Create Category','url'=>array('create')),
	array('label'=>'View Category','url'=>array('view','id'=>$model->categoryId)),
	array('label'=>'Manage Category','url'=>array('admin')),
);
?>

<h1>Update Category <?php echo $model->categoryId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>