<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('gameId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->gameId),array('view','id'=>$data->gameId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subdomainName')); ?>:</b>
	<?php echo CHtml::encode($data->subdomainName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bgImage')); ?>:</b>
	<?php echo CHtml::encode($data->bgImage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('themeColorMain')); ?>:</b>
	<?php echo CHtml::encode($data->themeColorMain); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('themeColor1')); ?>:</b>
	<?php echo CHtml::encode($data->themeColor1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('themeColor2')); ?>:</b>
	<?php echo CHtml::encode($data->themeColor2); ?>
	<br />


</div>