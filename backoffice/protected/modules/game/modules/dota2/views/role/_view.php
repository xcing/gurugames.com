<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('roleId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->roleId),array('view','id'=>$data->roleId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />


</div>