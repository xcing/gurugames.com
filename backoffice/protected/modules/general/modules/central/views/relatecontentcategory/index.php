<?php
$this->breadcrumbs=array(
	'Relate Content Categories',
);

$this->menu=array(
	array('label'=>'Create RelateContentCategory','url'=>array('create')),
	array('label'=>'Manage RelateContentCategory','url'=>array('admin')),
);
?>

<h1>Relate Content Categories</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
