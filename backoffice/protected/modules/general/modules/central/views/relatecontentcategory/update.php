<?php
$this->breadcrumbs=array(
	'Relate Content Categories'=>array('index'),
	$model->relate_content_categoryId=>array('view','id'=>$model->relate_content_categoryId),
	'Update',
);

$this->menu=array(
	array('label'=>'List RelateContentCategory','url'=>array('index')),
	array('label'=>'Create RelateContentCategory','url'=>array('create')),
	array('label'=>'View RelateContentCategory','url'=>array('view','id'=>$model->relate_content_categoryId)),
	array('label'=>'Manage RelateContentCategory','url'=>array('admin')),
);
?>

<h1>Update RelateContentCategory <?php echo $model->relate_content_categoryId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>