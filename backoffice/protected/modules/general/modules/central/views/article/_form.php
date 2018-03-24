<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'article-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<label><?= $model->getAttributeLabel('type'); ?></label>
<?php
echo CHtml::dropDownList('Article[type]', $model->type, $model->getTypeArray());
?>

<label><?=$model->getAttributeLabel('contentId'); ?></label>
<?php
echo CHtml::dropDownList('Article[contentId]', $model->contentId, CHtml::listData(Content::model()->findAll(array('order' => 'contentId DESC')), 'contentId', 'title'), array('empty' => '-- Select --'));
?>

<label><?= $model->getAttributeLabel('gameId'); ?></label>
<?php
echo CHtml::dropDownList('Article[gameId]', $model->gameId, CHtml::listData(Game::model()->findAll(array('order' => 'gameId DESC')), 'gameId', 'name'), array('empty' => ' -- None -- '));
?>

<label><?= $model->getAttributeLabel('showType'); ?></label>
<?php
echo CHtml::dropDownList('Article[showType]', $model->showType, $model->getShowTypeArray());
?>

<label><?= $model->getAttributeLabel('commentType'); ?></label>
<?php
echo CHtml::dropDownList('Article[commentType]', $model->commentType, $model->getCommentTypeArray());
?>

<label><?= $model->getAttributeLabel('active'); ?></label>
<?php
echo CHtml::dropDownList('Article[active]', $model->active, $model->getActiveArray());
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
