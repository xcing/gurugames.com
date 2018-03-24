<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'statTourId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'team1Id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'team2Id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'win',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'lose',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
