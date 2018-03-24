<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('roundScheduleId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->roundScheduleId),array('view','id'=>$data->roundScheduleId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tournamentId')); ?>:</b>
	<?php echo CHtml::encode($data->tournamentId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('round')); ?>:</b>
	<?php echo CHtml::encode($data->round); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />


</div>