<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('skillId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->skillId),array('view','id'=>$data->skillId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('heroId')); ?>:</b>
	<?php echo CHtml::encode($data->heroId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detailTH')); ?>:</b>
	<?php echo CHtml::encode($data->detailTH); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detailEN')); ?>:</b>
	<?php echo CHtml::encode($data->detailEN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('youtube')); ?>:</b>
	<?php echo CHtml::encode($data->youtube); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('mana')); ?>:</b>
	<?php echo CHtml::encode($data->mana); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cooldown')); ?>:</b>
	<?php echo CHtml::encode($data->cooldown); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('abilityType')); ?>:</b>
	<?php echo CHtml::encode($data->abilityType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('abilityResult')); ?>:</b>
	<?php echo CHtml::encode($data->abilityResult); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('targetType')); ?>:</b>
	<?php echo CHtml::encode($data->targetType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('damageType')); ?>:</b>
	<?php echo CHtml::encode($data->damageType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('note')); ?>:</b>
	<?php echo CHtml::encode($data->note); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ordinal')); ?>:</b>
	<?php echo CHtml::encode($data->ordinal); ?>
	<br />

	*/ ?>

</div>