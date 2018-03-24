<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tournamentId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tournamentId),array('view','id'=>$data->tournamentId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('award')); ?>:</b>
	<?php echo CHtml::encode($data->award); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('picture')); ?>:</b>
	<?php echo CHtml::encode($data->picture); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('picture2')); ?>:</b>
	<?php echo CHtml::encode($data->picture2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('startDate')); ?>:</b>
	<?php echo CHtml::encode($data->startDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deadlineDate')); ?>:</b>
	<?php echo CHtml::encode($data->deadlineDate); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('champId')); ?>:</b>
	<?php echo CHtml::encode($data->champId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('secondId')); ?>:</b>
	<?php echo CHtml::encode($data->secondId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('thirdId')); ?>:</b>
	<?php echo CHtml::encode($data->thirdId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gameAmount')); ?>:</b>
	<?php echo CHtml::encode($data->gameAmount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('finalGameAmount')); ?>:</b>
	<?php echo CHtml::encode($data->finalGameAmount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('roundAmount')); ?>:</b>
	<?php echo CHtml::encode($data->roundAmount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('thirdPlace')); ?>:</b>
	<?php echo CHtml::encode($data->thirdPlace); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	*/ ?>

</div>