<h1>Manage Quests</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'quest-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nameEN',
		'nameTH',
		'detailEN',
		'detailTH',
		/*
		'detailCN',
		'conditionLv',
		'conditionDetail',
		'type',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                    'template' => '{view} {update}',
		),
	),
)); ?>
