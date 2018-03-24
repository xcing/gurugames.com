<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'relate-content-tag-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<label><?= $model->getAttributeLabel('contentId'); ?></label>
<?php
echo CHtml::dropDownList('RelateContentTag[contentId]', $model->contentId, CHtml::listData(Content::model()->findAll(array('order' => 'contentId DESC')), 'contentId', 'title'), array('empty' => '-- Select --'));
?>

<label><?=$model->getAttributeLabel('tagId'); ?></label>
<?php
echo CHtml::dropDownList('RelateContentTag[tagId]', $model->tagId, CHtml::listData(Tag::model()->findAll(array('order' => 'name ASC')), 'tagId', 'name'), array('empty' => '-- Select --'));
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
