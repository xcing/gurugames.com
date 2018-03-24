<?php
$this->breadcrumbs=array(
	'Relate Content Tags',
);

$this->menu=array(
	array('label'=>'Create RelateContentTag','url'=>array('create')),
	array('label'=>'Manage RelateContentTag','url'=>array('admin')),
);
?>

<h1>Relate Content Tags</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
