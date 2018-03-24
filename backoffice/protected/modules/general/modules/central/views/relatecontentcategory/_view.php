<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('relate_content_categoryId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->relate_content_categoryId),array('view','id'=>$data->relate_content_categoryId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contentId')); ?>:</b>
	<?php echo CHtml::encode($data->contentId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categoryId')); ?>:</b>
	<?php echo CHtml::encode($data->categoryId); ?>
	<br />


</div>