<h1>View Leaderskill #<?php echo $model->leaderskillId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'leaderskillId',
		'detailEN',
		'detailTH',
		'detailCN',
		'typeIncrese',
		'elementIdCondition',
		'raceIdCondition',
		'hp',
		'atk',
		'def',
		'acc',
		'eva',
		'spd',
		'cond',
		'dcond',
		'conditionId',
	),
)); ?>
