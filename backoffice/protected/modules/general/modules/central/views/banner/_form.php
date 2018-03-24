<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'banner-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<label><?= $model->getAttributeLabel('contentId'); ?></label>
<?php
echo CHtml::dropDownList('Banner[contentId]', $model->contentId, CHtml::listData(Content::model()->findAll(array('order' => 'contentId DESC')), 'contentId', 'title'), array('empty' => '-- Select --'));
?>

<?php echo $form->textFieldRow($model, 'link', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'image', array('class' => 'span5', 'maxlength' => 150)); ?>

<label><?= $model->getAttributeLabel('gameId'); ?></label>
<?php
echo CHtml::dropDownList('Banner[gameId]', $model->gameId, CHtml::listData(Game::model()->findAll(array('order' => 'gameId DESC')), 'gameId', 'name'), array('empty' => ' -- None -- '));
?>

<label><?= $model->getAttributeLabel('position'); ?></label>
<?php
echo CHtml::dropDownList('Banner[position]', $model->position, $model->getPositionArray());
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
