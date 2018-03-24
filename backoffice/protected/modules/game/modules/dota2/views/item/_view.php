<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('itemId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->itemId),array('view','id'=>$data->itemId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detailTH')); ?>:</b>
	<?php echo CHtml::encode($data->detailTH); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detailEN')); ?>:</b>
	<?php echo CHtml::encode($data->detailEN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bonus')); ?>:</b>
	<?php echo CHtml::encode($data->bonus); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('informationTH')); ?>:</b>
	<?php echo CHtml::encode($data->informationTH); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('informationEN')); ?>:</b>
	<?php echo CHtml::encode($data->informationEN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ordinal')); ?>:</b>
	<?php echo CHtml::encode($data->ordinal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($data->location); ?>
	<br />

	*/ ?>

</div>