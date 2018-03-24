<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'relate-content-category-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<label><?= $model->getAttributeLabel('contentId'); ?></label>
<?php
echo CHtml::dropDownList('RelateContentCategory[contentId]', $model->contentId, CHtml::listData(Content::model()->findAll(array('order' => 'contentId DESC')), 'contentId', 'title'), array('empty' => '-- Select --'));
?>

<label><?= $model->getAttributeLabel('categoryId'); ?></label>
<?php
echo CHtml::dropDownList('RelateContentCategory[categoryId]', $model->categoryId, CHtml::listData(Category::model()->findAll(array('order' => 'categoryId')), 'categoryId', 'name'));
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
