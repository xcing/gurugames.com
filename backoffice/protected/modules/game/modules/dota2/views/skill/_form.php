<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'skill-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<label><?= $model->getAttributeLabel('heroId'); ?></label>
<?php
echo CHtml::dropDownList('Skill[heroId]', $model->heroId, CHtml::listData(Hero::model()->findAll(array('order' => 'name ASC')), 'heroId', 'name'));
?>

<?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textAreaRow($model, 'detailTH', array('rows' => 4, 'cols' => 50, 'class' => 'span8')); ?>

<?php //echo $form->textAreaRow($model, 'detailEN', array('rows' => 4, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textFieldRow($model, 'image', array('class' => 'span5', 'maxlength' => 200)); ?>

<?php echo $form->textFieldRow($model, 'youtube', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'mana', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'cooldown', array('class' => 'span5', 'maxlength' => 50)); ?>

<?/*
<label><?= $model->getAttributeLabel('abilityType'); ?></label>
<?php
echo CHtml::dropDownList('Skill[abilityType]', $model->abilityType, $model->getAbilityTypeArray());
?>

<label><?= $model->getAttributeLabel('abilityResult'); ?></label>
<?php
echo CHtml::dropDownList('Skill[abilityResult]', $model->abilityResult, $model->getAbilityResultArray());
?>

<label><?= $model->getAttributeLabel('targetType'); ?></label>
<?php
echo CHtml::dropDownList('Skill[targetType]', $model->targetType, $model->getTargetTypeArray());
?>

<label><?= $model->getAttributeLabel('damageType'); ?></label>
<?php
echo CHtml::dropDownList('Skill[damageType]', $model->damageType, $model->getDamageTypeArray());
?>

<label><?= $model->getAttributeLabel('piercesImmune'); ?></label>
<?php
echo CHtml::dropDownList('Skill[piercesImmune]', $model->piercesImmune, $model->getPiercesImmuneArray());
?>
*/?>
<?php echo $form->textAreaRow($model, 'noteLeft', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textAreaRow($model, 'noteRight', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

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
