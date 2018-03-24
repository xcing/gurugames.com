<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('relate_game_categoryId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->relate_game_categoryId),array('view','id'=>$data->relate_game_categoryId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gameId')); ?>:</b>
	<?php echo CHtml::encode($data->gameId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categoryId')); ?>:</b>
	<?php echo CHtml::encode($data->categoryId); ?>
	<br />


</div>