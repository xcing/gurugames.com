<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'tournament-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'reward', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'url_reward', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'picture', array('class' => 'span5', 'maxlength' => 500)); ?>

<?php echo $form->textFieldRow($model, 'picture2', array('class' => 'span5', 'maxlength' => 500)); ?>

<label><?= $model->getAttributeLabel('startDate'); ?></label>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name' => 'Tournament[startDate]',
    'value' => $model->startDate,
    'options' => array(
        'showAnim' => 'fold',
        'dateFormat' => 'yy-mm-dd'
    ),
    'htmlOptions' => array(
        'style' => 'height:20px;',
    ),
));
?>

<label><?= $model->getAttributeLabel('deadlineDate'); ?></label>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name' => 'Tournament[deadlineDate]',
    'value' => $model->deadlineDate,
    'options' => array(
        'showAnim' => 'fold',
        'dateFormat' => 'yy-mm-dd'
    ),
    'htmlOptions' => array(
        'style' => 'height:20px;',
    ),
));
?>

<?php echo $form->textFieldRow($model, 'gameAmount', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'finalGameAmount', array('class' => 'span5')); ?>

<label><?= $model->getAttributeLabel('type'); ?></label>
<?php
echo CHtml::dropDownList('Tournament[type]', $model->type, $model->getTypeArray());
?>

<label><?= $model->getAttributeLabel('thirdPlace'); ?></label>
<?php
echo CHtml::dropDownList('Tournament[thirdPlace]', $model->thirdPlace, $model->getThirdPlaceArray());
?>

<label><?= $model->getAttributeLabel('gameId'); ?></label>
<?php
echo CHtml::dropDownList('Tournament[gameId]', $model->gameId, CHtml::listData(Game::model()->findAll(array('order' => 'gameId DESC')), 'gameId', 'name'), array('empty' => ' -- None -- '));
?>

<label><?= $model->getAttributeLabel('status'); ?></label>
<?php
echo CHtml::dropDownList('Tournament[status]', $model->status, $model->getStatusArray());
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
