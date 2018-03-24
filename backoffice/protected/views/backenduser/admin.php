<?php
$this->breadcrumbs=array(
	'Backend Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List BackendUser', 'url'=>array('index')),
	array('label'=>'Create BackendUser', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('backend-user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Backend Users</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'backend-user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'buser',
		'bpass',
		'usergroup',
		'typeid',
		'merchantid',
		/*
		'is_admin',
		'is_moladmin',
		'es_report',
		'es_admin',
		'pm_report',
		'pm_admin',
		'pm_support',
		'es_support',
		'moltank_support',
		'fb_admin',
		'game_admin',
		'inv_admin',
		'mp_admin',
		'ws_report',
		'ws_report_role',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
