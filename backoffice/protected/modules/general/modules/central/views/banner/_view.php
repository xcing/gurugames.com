<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('bannerId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->bannerId),array('view','id'=>$data->bannerId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link')); ?>:</b>
	<?php echo CHtml::encode($data->link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contentId')); ?>:</b>
	<?php echo CHtml::encode($data->contentId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position')); ?>:</b>
	<?php echo CHtml::encode($data->position); ?>
	<br />


</div>