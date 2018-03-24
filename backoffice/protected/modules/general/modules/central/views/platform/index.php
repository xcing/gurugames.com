<?php
$this->breadcrumbs=array(
	'Platforms',
);

$this->menu=array(
	array('label'=>'Create Platform','url'=>array('create')),
	array('label'=>'Manage Platform','url'=>array('admin')),
);
?>

<h1>Platforms</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
