<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'relatetourteam-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<label><?= $model->getAttributeLabel('tournamentId'); ?></label>
<?php
echo CHtml::dropDownList('Relatetourteam[tournamentId]', $model->tournamentId, CHtml::listData(Tournament::model()->findAll(array('condition' => 'active=0', 'order' => 'tournamentId DESC')), 'tournamentId', 'name'));
?>

<label><?= $model->getAttributeLabel('teamId'); ?></label>
<?php
echo CHtml::dropDownList('Relatetourteam[teamId]', $model->teamId, CHtml::listData(TournamentTeam::model()->findAll(array('order' => 'shortName ASC')), 'teamId', 'shortName'));
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
