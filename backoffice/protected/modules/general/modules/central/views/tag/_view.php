<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tagId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tagId),array('view','id'=>$data->tagId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

</div>