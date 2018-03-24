<?php
$this->breadcrumbs=array(
	'Relateitems',
);

$this->menu=array(
	array('label'=>'Create Relateitem','url'=>array('create')),
	array('label'=>'Manage Relateitem','url'=>array('admin')),
);
?>

<h1>Relateitems</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
