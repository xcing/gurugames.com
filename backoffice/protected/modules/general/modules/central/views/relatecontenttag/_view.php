<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('relate_content_tagId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->relate_content_tagId),array('view','id'=>$data->relate_content_tagId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contentId')); ?>:</b>
	<?php echo CHtml::encode($data->contentId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tagId')); ?>:</b>
	<?php echo CHtml::encode($data->tagId); ?>
	<br />


</div>