<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	$model->articleId=>array('view','id'=>$model->articleId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Article','url'=>array('index')),
	array('label'=>'Create Article','url'=>array('create')),
	array('label'=>'View Article','url'=>array('view','id'=>$model->articleId)),
	array('label'=>'Manage Article','url'=>array('admin')),
);
?>

<h1>Update Article <?php echo $model->articleId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>