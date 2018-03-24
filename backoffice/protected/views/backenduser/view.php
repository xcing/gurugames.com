<?php
$this->breadcrumbs=array(
	'Backend Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BackendUser', 'url'=>array('index')),
	array('label'=>'Create BackendUser', 'url'=>array('create')),
	array('label'=>'Update BackendUser', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BackendUser', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BackendUser', 'url'=>array('admin')),
);
?>

<h1>View BackendUser #<?php echo $model->id; ?></h1>
<div class="buttons">
  <button class="action blue" onclick="window.location='<?php echo $this->createUrl('update',array('id'=>$model->id)); ?>'"><span class="label">Update</span></button>
  <button class="action" onclick="window.location='<?php echo $this->createUrl('index'); ?>'"><span class="label">Cancel</span></button>
</div> <!-- /.buttons -->
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'buser',
		'bpass',
		'usergroup',
		'typeid',
		'merchantid',
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
	),
)); ?>