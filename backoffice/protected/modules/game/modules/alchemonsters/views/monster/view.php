<h1>View Monster #<?php echo $model->monsterId; ?></h1>

<div style="margin-bottom: 10px;">
    <a href="<?= Yii::app()->createUrl("/game/alchemonsters/monster/update", array("id" => $model->monsterId)); ?>"><button class="btn btn-primary">Update</button></a>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'monsterId',
		'nameEN',
		'nameTH',
		'nameCN',
		'rare',
		'str',
		'vit',
		'dex',
		'agi',
		'elementId',
		'raceId',
		'amountForm',
		'leaderSkillId1',
		'leaderSkillId2',
		'leaderSkillId3',
		'defaultStatWhenLvUp1',
		'defaultStatWhenLvUp2',
		'defaultStatWhenLvUp3',
		'materialForm1',
		'materialForm2',
		'materialForm3',
		'materialUpgrade1',
		'materialUpgrade2',
		'materialUpgrade3',
		'materialUpgrade4',
		'materialUpgrade5',
		'materialUpgrade6',
		'talent',
	),
)); ?>
