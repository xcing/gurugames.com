<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'buser'); ?>
		<?php echo $form->textField($model,'buser',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bpass'); ?>
		<?php echo $form->textField($model,'bpass',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usergroup'); ?>
		<?php echo $form->textField($model,'usergroup',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'typeid'); ?>
		<?php echo $form->textField($model,'typeid',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'merchantid'); ?>
		<?php echo $form->textField($model,'merchantid',array('size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_admin'); ?>
		<?php echo $form->textField($model,'is_admin',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_moladmin'); ?>
		<?php echo $form->textField($model,'is_moladmin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'es_report'); ?>
		<?php echo $form->textField($model,'es_report',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'es_admin'); ?>
		<?php echo $form->textField($model,'es_admin',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pm_report'); ?>
		<?php echo $form->textField($model,'pm_report',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pm_admin'); ?>
		<?php echo $form->textField($model,'pm_admin',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pm_support'); ?>
		<?php echo $form->textField($model,'pm_support',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'es_support'); ?>
		<?php echo $form->textField($model,'es_support',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'moltank_support'); ?>
		<?php echo $form->textField($model,'moltank_support',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fb_admin'); ?>
		<?php echo $form->textField($model,'fb_admin',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'game_admin'); ?>
		<?php echo $form->textField($model,'game_admin',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inv_admin'); ?>
		<?php echo $form->textField($model,'inv_admin',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mp_admin'); ?>
		<?php echo $form->textField($model,'mp_admin',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ws_report'); ?>
		<?php echo $form->textField($model,'ws_report',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ws_report_role'); ?>
		<?php echo $form->textField($model,'ws_report_role',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->