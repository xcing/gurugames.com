<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('relate_user_gameId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->relate_user_gameId),array('view','id'=>$data->relate_user_gameId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userId')); ?>:</b>
	<?php echo CHtml::encode($data->userId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gameId')); ?>:</b>
	<?php echo CHtml::encode($data->gameId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updatedDate')); ?>:</b>
	<?php echo CHtml::encode($data->updatedDate); ?>
	<br />


</div>