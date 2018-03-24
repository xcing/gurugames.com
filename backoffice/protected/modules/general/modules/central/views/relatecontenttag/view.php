<?php
$this->breadcrumbs=array(
	'Relate Content Tags'=>array('index'),
	$model->relate_content_tagId,
);

$this->menu=array(
	array('label'=>'List RelateContentTag','url'=>array('index')),
	array('label'=>'Create RelateContentTag','url'=>array('create')),
	array('label'=>'Update RelateContentTag','url'=>array('update','id'=>$model->relate_content_tagId)),
	array('label'=>'Delete RelateContentTag','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->relate_content_tagId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RelateContentTag','url'=>array('admin')),
);
?>

<h1>View RelateContentTag #<?php echo $model->relate_content_tagId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'relate_content_tagId',
		'contentId',
		'tagId',
	),
)); ?>
