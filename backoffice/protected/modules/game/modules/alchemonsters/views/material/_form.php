<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'material-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'nameEN', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'nameTH', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'nameCN', array('class' => 'span5', 'maxlength' => 50)); ?>

<label><?= $model->getAttributeLabel('rare'); ?></label>
<?php
echo CHtml::dropDownList('Material[rare]', $model->rare, $model->getRareArray());
?>

<?php echo $form->textFieldRow($model, 'hp', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'atk', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'def', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'acc', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'spd', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'eva', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'cond', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'dcond', array('class' => 'span5')); ?>

    <?php echo $form->textFieldRow($model, 'limitLv', array('class' => 'span5')); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
