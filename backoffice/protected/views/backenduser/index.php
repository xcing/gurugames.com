<?php
$this->breadcrumbs=array(
	'Backend Users',
);

$this->menu=array(
	array('label'=>'Create BackendUser', 'url'=>array('create')),
	array('label'=>'Manage BackendUser', 'url'=>array('admin')),
);
?>

<h1>Backend Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
