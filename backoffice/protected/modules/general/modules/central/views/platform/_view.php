<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('platformId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->platformId),array('view','id'=>$data->platformId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('icon')); ?>:</b>
	<?php echo CHtml::encode($data->icon); ?>
	<br />


</div>