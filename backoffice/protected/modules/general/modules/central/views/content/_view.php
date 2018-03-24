<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('contentId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->contentId),array('view','id'=>$data->contentId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detail')); ?>:</b>
	<?php echo CHtml::encode($data->detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shortDetail')); ?>:</b>
	<?php echo CHtml::encode($data->shortDetail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gameId')); ?>:</b>
	<?php echo CHtml::encode($data->gameId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userCreate')); ?>:</b>
	<?php echo CHtml::encode($data->userCreate); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('userUpdate')); ?>:</b>
	<?php echo CHtml::encode($data->userUpdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateCreate')); ?>:</b>
	<?php echo CHtml::encode($data->dateCreate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateUpdate')); ?>:</b>
	<?php echo CHtml::encode($data->dateUpdate); ?>
	<br />

	*/ ?>

</div>