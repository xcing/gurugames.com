<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'matchId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'team1Id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'team2Id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'teamSide',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'round',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'result',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'parentId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'tournamentId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ordinal',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
