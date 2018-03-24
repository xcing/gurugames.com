<?php
$this->breadcrumbs=array(
	'Guideheroes',
);

$this->menu=array(
	array('label'=>'Create Guidehero','url'=>array('create')),
	array('label'=>'Manage Guidehero','url'=>array('admin')),
);
?>

<h1>Guideheroes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
