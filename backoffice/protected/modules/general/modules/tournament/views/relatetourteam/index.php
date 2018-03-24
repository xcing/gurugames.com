<?php
$this->breadcrumbs=array(
	'Relatetourteams',
);

$this->menu=array(
	array('label'=>'Create Relatetourteam','url'=>array('create')),
	array('label'=>'Manage Relatetourteam','url'=>array('admin')),
);
?>

<h1>Relatetourteams</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
