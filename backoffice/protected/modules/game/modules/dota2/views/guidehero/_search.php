<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'guideHeroId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'skill',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'startItem',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'coreItem',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'dynamicItem',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textAreaRow($model,'detail',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'ordinal',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'heroId',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
