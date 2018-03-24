<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('relate_game_platformId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->relate_game_platformId),array('view','id'=>$data->relate_game_platformId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gameId')); ?>:</b>
	<?php echo CHtml::encode($data->gameId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('platformId')); ?>:</b>
	<?php echo CHtml::encode($data->platformId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('webDownload')); ?>:</b>
	<?php echo CHtml::encode($data->webDownload); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('webOfficial')); ?>:</b>
	<?php echo CHtml::encode($data->webOfficial); ?>
	<br />


</div>