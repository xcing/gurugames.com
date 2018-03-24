<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'match-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<label><?= $model->getAttributeLabel('team1Id'); ?></label>
<?php
echo CHtml::dropDownList('Match[team1Id]', $model->team1Id, CHtml::listData(TournamentTeam::model()->findAll(array('order' => 'shortName ASC')), 'teamId', 'shortName'));
?>

<label><?= $model->getAttributeLabel('team2Id'); ?></label>
<?php
echo CHtml::dropDownList('Match[team2Id]', $model->team2Id, CHtml::listData(TournamentTeam::model()->findAll(array('order' => 'shortName ASC')), 'teamId', 'shortName'));
?>

    <?php echo $form->textFieldRow($model, 'result', array('class' => 'span5')); ?>

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
