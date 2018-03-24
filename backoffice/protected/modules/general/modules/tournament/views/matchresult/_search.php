<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'matchResultId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'result',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'matchId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'screenshot',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'replay',array('class'=>'span5','maxlength'=>300)); ?>

	<?php echo $form->textFieldRow($model,'game',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
