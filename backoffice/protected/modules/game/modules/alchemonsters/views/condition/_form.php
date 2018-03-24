<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'condition-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'nameEN', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'nameTH', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'nameCN', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'detailEN', array('class' => 'span5', 'maxlength' => 150)); ?>

<?php echo $form->textFieldRow($model, 'detailTH', array('class' => 'span5', 'maxlength' => 150)); ?>

<?php echo $form->textFieldRow($model, 'detailCN', array('class' => 'span5', 'maxlength' => 150)); ?>

<?php echo $form->textFieldRow($model, 'durationTurn', array('class' => 'span5')); ?>

<label><?= $model->getAttributeLabel('type'); ?></label>
<?php
echo CHtml::dropDownList('Condition[type]', $model->type, $model->getTypeArray());
?>

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
