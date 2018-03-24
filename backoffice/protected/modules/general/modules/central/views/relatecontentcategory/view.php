<?php
$this->breadcrumbs=array(
	'Relate Content Categories'=>array('index'),
	$model->relate_content_categoryId,
);

$this->menu=array(
	array('label'=>'List RelateContentCategory','url'=>array('index')),
	array('label'=>'Create RelateContentCategory','url'=>array('create')),
	array('label'=>'Update RelateContentCategory','url'=>array('update','id'=>$model->relate_content_categoryId)),
	array('label'=>'Delete RelateContentCategory','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->relate_content_categoryId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RelateContentCategory','url'=>array('admin')),
);
?>

<h1>View RelateContentCategory #<?php echo $model->relate_content_categoryId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'relate_content_categoryId',
		'contentId',
		'categoryId',
	),
)); ?>
