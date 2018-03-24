<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'gameId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'subdomainName',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'bgImage',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'themeColorMain',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'themeColor1',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'themeColor2',array('class'=>'span5','maxlength'=>10)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
