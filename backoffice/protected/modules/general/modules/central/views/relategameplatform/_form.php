<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'relate-game-platform-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<label><?= $model->getAttributeLabel('gameId'); ?></label>
<?php
echo CHtml::dropDownList('RelateGamePlatform[gameId]', $model->gameId, CHtml::listData(Game::model()->findAll(array('order' => 'gameId DESC')), 'gameId', 'name'));
?>

<label><?= $model->getAttributeLabel('platformId'); ?></label>
<?php
echo CHtml::dropDownList('RelateGamePlatform[platformId]', $model->platformId, CHtml::listData(Platform::model()->findAll(array('order' => 'platformId')), 'platformId', 'name'));
?>

<?php echo $form->textFieldRow($model, 'webDownload', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'webOfficial', array('class' => 'span5')); ?>

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
