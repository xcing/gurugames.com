<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'bannerId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'link',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'contentId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'position',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
