<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('heroId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->heroId),array('view','id'=>$data->heroId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imageFull')); ?>:</b>
	<?php echo CHtml::encode($data->imageFull); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bioTH')); ?>:</b>
	<?php echo CHtml::encode($data->bioTH); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bioEN')); ?>:</b>
	<?php echo CHtml::encode($data->bioEN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('hp')); ?>:</b>
	<?php echo CHtml::encode($data->hp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mana')); ?>:</b>
	<?php echo CHtml::encode($data->mana); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('str')); ?>:</b>
	<?php echo CHtml::encode($data->str); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agi')); ?>:</b>
	<?php echo CHtml::encode($data->agi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('int')); ?>:</b>
	<?php echo CHtml::encode($data->int); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('atk')); ?>:</b>
	<?php echo CHtml::encode($data->atk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('armor')); ?>:</b>
	<?php echo CHtml::encode($data->armor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('moveSpd')); ?>:</b>
	<?php echo CHtml::encode($data->moveSpd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sightRange')); ?>:</b>
	<?php echo CHtml::encode($data->sightRange); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('atkRange')); ?>:</b>
	<?php echo CHtml::encode($data->atkRange); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('missileSpd')); ?>:</b>
	<?php echo CHtml::encode($data->missileSpd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('side')); ?>:</b>
	<?php echo CHtml::encode($data->side); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ordinal')); ?>:</b>
	<?php echo CHtml::encode($data->ordinal); ?>
	<br />

	*/ ?>

</div>