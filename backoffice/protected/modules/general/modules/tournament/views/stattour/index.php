<?php
$this->breadcrumbs=array(
	'Stattours',
);

$this->menu=array(
	array('label'=>'Create Stattour','url'=>array('create')),
	array('label'=>'Manage Stattour','url'=>array('admin')),
);
?>

<h1>Stattours</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
