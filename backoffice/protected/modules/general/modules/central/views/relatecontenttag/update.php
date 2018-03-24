<?php
$this->breadcrumbs=array(
	'Relate Content Tags'=>array('index'),
	$model->relate_content_tagId=>array('view','id'=>$model->relate_content_tagId),
	'Update',
);

$this->menu=array(
	array('label'=>'List RelateContentTag','url'=>array('index')),
	array('label'=>'Create RelateContentTag','url'=>array('create')),
	array('label'=>'View RelateContentTag','url'=>array('view','id'=>$model->relate_content_tagId)),
	array('label'=>'Manage RelateContentTag','url'=>array('admin')),
);
?>

<h1>Update RelateContentTag <?php echo $model->relate_content_tagId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>