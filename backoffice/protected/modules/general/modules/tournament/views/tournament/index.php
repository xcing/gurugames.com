<?php
$this->breadcrumbs=array(
	'Tournaments',
);

$this->menu=array(
	array('label'=>'Create Tournament','url'=>array('create')),
	array('label'=>'Manage Tournament','url'=>array('admin')),
);
?>

<h1>Tournaments</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
