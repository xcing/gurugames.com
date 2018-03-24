<?php
$this->breadcrumbs=array(
	'Heroes',
);

$this->menu=array(
	array('label'=>'Create Hero','url'=>array('create')),
	array('label'=>'Manage Hero','url'=>array('admin')),
);
?>

<h1>Heroes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
