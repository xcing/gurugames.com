<?php
$this->breadcrumbs=array(
	'Relate User Games',
);

$this->menu=array(
	array('label'=>'Create RelateUserGame','url'=>array('create')),
	array('label'=>'Manage RelateUserGame','url'=>array('admin')),
);
?>

<h1>Relate User Games</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
