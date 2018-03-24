<?php
$this->breadcrumbs=array(
	'Relate Game Categories',
);

$this->menu=array(
	array('label'=>'Create RelateGameCategory','url'=>array('create')),
	array('label'=>'Manage RelateGameCategory','url'=>array('admin')),
);
?>

<h1>Relate Game Categories</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
