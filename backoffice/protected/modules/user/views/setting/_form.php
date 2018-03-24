<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'user-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">ช่องที่มี <span class="required">*</span> จำเป็นต้องป้อนข้อมูล</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'username', array('class' => 'span5', 'maxlength' => 80)); ?>

<?php echo $form->textFieldRow($model, 'firstname', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'lastname', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'md5_password', array('class' => 'span5', 'maxlength' => 32)); ?>

<label><?=$model->getAttributeLabel('role'); ?></label>
<?php
echo CHtml::dropDownList('User[role]', $model->role, $model->getRoleArray());
?>

<?php echo $form->textFieldRow($model, 'salary', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'outgoing', array('class' => 'span5')); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'สร้าง' : 'บันทึก',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
