<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'relate-game-category-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<label><?= $model->getAttributeLabel('gameId'); ?></label>
<?php
echo CHtml::dropDownList('RelateGameCategory[gameId]', $model->gameId, CHtml::listData(Game::model()->findAll(array('order' => 'gameId DESC')), 'gameId', 'name'));
?>

<label><?= $model->getAttributeLabel('categoryId'); ?></label>
<?php
echo CHtml::dropDownList('RelateGameCategory[categoryId]', $model->categoryId, CHtml::listData(Category::model()->findAll(array('order' => 'categoryId')), 'categoryId', 'name'));
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
