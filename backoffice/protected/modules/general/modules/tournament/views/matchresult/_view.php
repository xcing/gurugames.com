<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('matchResultId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->matchResultId),array('view','id'=>$data->matchResultId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('result')); ?>:</b>
	<?php echo CHtml::encode($data->result); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('matchId')); ?>:</b>
	<?php echo CHtml::encode($data->matchId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('screenshot')); ?>:</b>
	<?php echo CHtml::encode($data->screenshot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('replay')); ?>:</b>
	<?php echo CHtml::encode($data->replay); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('game')); ?>:</b>
	<?php echo CHtml::encode($data->game); ?>
	<br />


</div>