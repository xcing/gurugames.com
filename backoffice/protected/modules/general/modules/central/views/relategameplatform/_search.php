<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'relate_game_platformId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'gameId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'platformId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'webDownload',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'webOfficial',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
