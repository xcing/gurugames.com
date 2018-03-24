<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('matchId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->matchId),array('view','id'=>$data->matchId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team1Id')); ?>:</b>
	<?php echo CHtml::encode($data->team1Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team2Id')); ?>:</b>
	<?php echo CHtml::encode($data->team2Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('teamSide')); ?>:</b>
	<?php echo CHtml::encode($data->teamSide); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('round')); ?>:</b>
	<?php echo CHtml::encode($data->round); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('result')); ?>:</b>
	<?php echo CHtml::encode($data->result); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parentId')); ?>:</b>
	<?php echo CHtml::encode($data->parentId); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('tournamentId')); ?>:</b>
	<?php echo CHtml::encode($data->tournamentId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ordinal')); ?>:</b>
	<?php echo CHtml::encode($data->ordinal); ?>
	<br />

	*/ ?>

</div>