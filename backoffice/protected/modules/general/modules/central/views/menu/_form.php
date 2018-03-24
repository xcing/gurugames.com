<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'menu-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'image', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'link', array('class' => 'span5', 'maxlength' => 100)); ?>

<label><?= $model->getAttributeLabel('position'); ?></label>
<?php
echo CHtml::dropDownList('Menu[position]', $model->position, $model->getPositionArray());
?>

<label><?=$model->getAttributeLabel('gameId'); ?></label>
<?php
echo CHtml::dropDownList('Menu[gameId]', $model->gameId, CHtml::listData(Game::model()->findAll(array('order' => 'gameId DESC')), 'gameId', 'name'), array(
    'ajax' => array(
        'type' => 'POST',
        'url' => CController::createUrl('ajaxGetParentMenuList'),
        'data' => array('gameId' => 'js:this.value'),
        'update' => '#Menu_parentMenuId'
    ),
    'empty' => '-- None --',
));
?>

<label><?=$model->getAttributeLabel('parentMenuId'); ?></label>
<?php
echo CHtml::dropDownList('Menu[parentMenuId]', $model->parentMenuId, CHtml::listData(Menu::model()->findAll(), 'menuId', 'name'), array('empty' => '-- None --'));
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
