<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'accessory-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'nameEN', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'nameTH', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'nameCN', array('class' => 'span5', 'maxlength' => 50)); ?>

<label><?= $model->getAttributeLabel('condition'); ?></label>
<?php
echo CHtml::dropDownList('Accessory[condition]', $model->condition, CHtml::listData(Condition::model()->findAll(array('order' => 'nameEN ASC')), 'conditionId', 'nameEN'), array('empty' => ' -- None -- '));
?> 

<label><?= $model->getAttributeLabel('rare'); ?></label>
<?php
echo CHtml::dropDownList('Accessory[rare]', $model->rare, $model->getRareArray());
?>

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
