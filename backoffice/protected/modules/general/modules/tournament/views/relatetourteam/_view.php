<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('relateTourTeamId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->relateTourTeamId),array('view','id'=>$data->relateTourTeamId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tournamentId')); ?>:</b>
	<?php echo CHtml::encode($data->tournamentId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('teamId')); ?>:</b>
	<?php echo CHtml::encode($data->teamId); ?>
	<br />


</div>