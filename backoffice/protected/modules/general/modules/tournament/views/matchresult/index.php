<?php
$this->breadcrumbs=array(
	'Matchresults',
);

$this->menu=array(
	array('label'=>'Create Matchresult','url'=>array('create')),
	array('label'=>'Manage Matchresult','url'=>array('admin')),
);
?>

<h1>Matchresults</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
