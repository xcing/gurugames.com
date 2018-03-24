<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'leaderskill-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'detailEN', array('class' => 'span5', 'maxlength' => 350)); ?>

<?php echo $form->textFieldRow($model, 'detailTH', array('class' => 'span5', 'maxlength' => 350)); ?>

<?php echo $form->textFieldRow($model, 'detailCN', array('class' => 'span5', 'maxlength' => 350)); ?>

<label><?= $model->getAttributeLabel('typeIncrese'); ?></label>
<?php
echo CHtml::dropDownList('Leaderskill[typeIncrese]', $model->typeIncrese, $model->getTypeIncreseArray());
?>

<label><?= $model->getAttributeLabel('elementIdCondition'); ?></label>
<?php
echo CHtml::dropDownList('Leaderskill[elementIdCondition]', $model->elementIdCondition, CHtml::listData(Element::model()->findAll(array('order' => 'elementId ASC')), 'elementId', 'nameEN'), array('empty' => ' -- None -- '));
?>

<label><?= $model->getAttributeLabel('raceIdCondition'); ?></label>
<?php
echo CHtml::dropDownList('Leaderskill[raceIdCondition]', $model->raceIdCondition, CHtml::listData(Race::model()->findAll(array('order' => 'raceId ASC')), 'raceId', 'nameEN'), array('empty' => ' -- None -- '));
?>

<?php echo $form->textFieldRow($model, 'hp', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'atk', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'def', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'acc', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'eva', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'spd', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'cond', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'dcond', array('class' => 'span5')); ?>

<label><?= $model->getAttributeLabel('conditionId'); ?></label>
<?php
echo CHtml::dropDownList('Leaderskill[conditionId]', $model->conditionId, CHtml::listData(Condition::model()->findAll(array('order' => 'nameEN ASC')), 'conditionId', 'nameEN'), array('empty' => ' -- None -- '));
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
