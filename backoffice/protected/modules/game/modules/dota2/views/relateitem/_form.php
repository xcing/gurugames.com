<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'relateitem-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<label><?= $model->getAttributeLabel('itemId'); ?></label>
<?php
echo CHtml::dropDownList('Relateitem[itemId]', $model->itemId, CHtml::listData(Item::model()->findAll(array('order' => 'name ASC')), 'itemId', 'name'));
?>

<label><?= $model->getAttributeLabel('materialId'); ?></label>
<?php
echo CHtml::dropDownList('Relateitem[materialId]', $model->materialId, CHtml::listData(Item::model()->findAll(array('order' => 'name ASC')), 'itemId', 'name'));
?>

<?php echo $form->textFieldRow($model, 'amount', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'price', array('class' => 'span5')); ?>

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
