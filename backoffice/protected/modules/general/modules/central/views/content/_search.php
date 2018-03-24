<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'contentId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'image',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textAreaRow($model,'detail',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'shortDetail',array('class'=>'span5','maxlength'=>300)); ?>

	<?php echo $form->textFieldRow($model,'gameId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'userCreate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'userUpdate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'dateCreate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'dateUpdate',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
