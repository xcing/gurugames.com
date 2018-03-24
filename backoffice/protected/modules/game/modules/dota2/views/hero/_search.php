<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'heroId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'image',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'imageFull',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textAreaRow($model,'bioTH',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'bioEN',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'type',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hp',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'mana',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'str',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'agi',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'int',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'atk',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'armor',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'moveSpd',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'sightRange',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'atkRange',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'missileSpd',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'side',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ordinal',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
