<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'backend-user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'buser'); ?>
		<?php echo $form->textField($model,'buser',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'buser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bpass'); ?>
		<?php echo $form->textField($model,'bpass',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'bpass'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usergroup'); ?>
		<?php echo $form->textField($model,'usergroup',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'usergroup'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'typeid'); ?>
		<?php echo $form->textField($model,'typeid',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'typeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'merchantid'); ?>
		<?php echo $form->textField($model,'merchantid',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'merchantid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_admin'); ?>
		<?php echo $form->textField($model,'is_admin',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'is_admin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_moladmin'); ?>
		<?php echo $form->textField($model,'is_moladmin'); ?>
		<?php echo $form->error($model,'is_moladmin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'es_report'); ?>
		<?php echo $form->textField($model,'es_report',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'es_report'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'es_admin'); ?>
		<?php echo $form->textField($model,'es_admin',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'es_admin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pm_report'); ?>
		<?php echo $form->textField($model,'pm_report',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'pm_report'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pm_admin'); ?>
		<?php echo $form->textField($model,'pm_admin',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'pm_admin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pm_support'); ?>
		<?php echo $form->textField($model,'pm_support',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'pm_support'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'es_support'); ?>
		<?php echo $form->textField($model,'es_support',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'es_support'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'moltank_support'); ?>
		<?php echo $form->textField($model,'moltank_support',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'moltank_support'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fb_admin'); ?>
		<?php echo $form->textField($model,'fb_admin',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'fb_admin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'game_admin'); ?>
		<?php echo $form->textField($model,'game_admin',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'game_admin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inv_admin'); ?>
		<?php echo $form->textField($model,'inv_admin',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'inv_admin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mp_admin'); ?>
		<?php echo $form->textField($model,'mp_admin',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'mp_admin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ws_report'); ?>
		<?php echo $form->textField($model,'ws_report',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'ws_report'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ws_report_role'); ?>
		<?php echo $form->textField($model,'ws_report_role',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'ws_report_role'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->