<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('relateItemId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->relateItemId),array('view','id'=>$data->relateItemId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('itemId')); ?>:</b>
	<?php echo CHtml::encode($data->itemId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('materialId')); ?>:</b>
	<?php echo CHtml::encode($data->materialId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />


</div>