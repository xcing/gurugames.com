<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('appointmentId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->appointmentId),array('view','id'=>$data->appointmentId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('matchId')); ?>:</b>
	<?php echo CHtml::encode($data->matchId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('teamId')); ?>:</b>
	<?php echo CHtml::encode($data->teamId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detail')); ?>:</b>
	<?php echo CHtml::encode($data->detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />


</div>