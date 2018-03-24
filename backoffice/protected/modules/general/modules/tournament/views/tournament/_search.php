<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'tournamentId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'award',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'picture',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'picture2',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'startDate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'deadlineDate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'champId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'secondId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'thirdId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'gameAmount',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'finalGameAmount',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'type',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'roundAmount',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'thirdPlace',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'active',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
