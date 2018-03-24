<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('guideHeroId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->guideHeroId),array('view','id'=>$data->guideHeroId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skill')); ?>:</b>
	<?php echo CHtml::encode($data->skill); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('startItem')); ?>:</b>
	<?php echo CHtml::encode($data->startItem); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coreItem')); ?>:</b>
	<?php echo CHtml::encode($data->coreItem); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dynamicItem')); ?>:</b>
	<?php echo CHtml::encode($data->dynamicItem); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detail')); ?>:</b>
	<?php echo CHtml::encode($data->detail); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ordinal')); ?>:</b>
	<?php echo CHtml::encode($data->ordinal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('heroId')); ?>:</b>
	<?php echo CHtml::encode($data->heroId); ?>
	<br />

	*/ ?>

</div>