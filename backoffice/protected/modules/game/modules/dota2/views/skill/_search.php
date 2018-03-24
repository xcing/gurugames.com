<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php echo $form->textFieldRow($model, 'skillId', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'heroId', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'detailTH', array('class' => 'span5', 'maxlength' => 1000)); ?>

<?php echo $form->textFieldRow($model, 'detailEN', array('class' => 'span5', 'maxlength' => 1000)); ?>

<?php echo $form->textFieldRow($model, 'image', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'youtube', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'mana', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'cooldown', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'noteLeft', array('class' => 'span5', 'maxlength' => 300)); ?>

<?php echo $form->textFieldRow($model, 'noteRight', array('class' => 'span5', 'maxlength' => 300)); ?>

    <?php echo $form->textFieldRow($model, 'ordinal', array('class' => 'span5')); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Search',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
