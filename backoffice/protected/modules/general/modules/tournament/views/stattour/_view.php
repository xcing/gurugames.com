<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('statTourId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->statTourId),array('view','id'=>$data->statTourId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team1Id')); ?>:</b>
	<?php echo CHtml::encode($data->team1Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team2Id')); ?>:</b>
	<?php echo CHtml::encode($data->team2Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('win')); ?>:</b>
	<?php echo CHtml::encode($data->win); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lose')); ?>:</b>
	<?php echo CHtml::encode($data->lose); ?>
	<br />


</div>