<?php
$this->breadcrumbs=array(
	'Relate Game Platforms',
);

$this->menu=array(
	array('label'=>'Create RelateGamePlatform','url'=>array('create')),
	array('label'=>'Manage RelateGamePlatform','url'=>array('admin')),
);
?>

<h1>Relate Game Platforms</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
