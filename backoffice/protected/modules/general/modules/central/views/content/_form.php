<!-- tag -->
<link
    href="<?php echo Yii::app()->request->baseUrl; ?>/css/tag/jquery.tagit.css"
    rel="stylesheet">
<link
    href="<?php echo Yii::app()->request->baseUrl; ?>/css/tag/tagit.ui-zendesk.css"
    rel="stylesheet">
<!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript" charset="utf-8"></script-->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/tag-it.js" type="text/javascript" charset="utf-8"></script>
<script>
    var contentId = '<?php echo $model->contentId; ?>';

    function insert_category() {
        var categoryId = $("#categoryId").val();
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->createAbsoluteUrl('general/central/content/ajax_insert_category'); ?>",
            data: {
                contentId: contentId,
                categoryId: categoryId,
            },
            success: function() {
                $('#category-grid').yiiGridView('update');
            },
        });
    }

    $(function() {
        var sampleTags = [<?php echo '"' . implode('","', $allTag) . '"' ?>];

        $('#myULTags').tagit({
            availableTags: sampleTags, // this param is of course optional. it's for autocomplete.
            // configure the name of the input field (will be submitted with form), default: item[tags]
            itemName: 'item',
            fieldName: 'tags[]'
        });
    });
</script>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'content-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<label><?= $model->getAttributeLabel('type'); ?></label>
<?php
echo CHtml::dropDownList('Content[type]', $model->type, $model->getTypeArray());
?>

<?php echo $form->textFieldRow($model, 'title', array('class' => 'span5', 'maxlength' => 150)); ?>

<?php echo $form->textFieldRow($model, 'image', array('class' => 'span5', 'maxlength' => 150)); ?>

<?php echo $form->textAreaRow($model, 'detail', array('class' => 'ckeditor')); ?>

<?php echo $form->textAreaRow($model, 'shortDetail', array('rows' => 4, 'cols' => 50, 'class' => 'span8', 'maxlength' => 300)); ?>

<label><?= $model->getAttributeLabel('gameId'); ?></label>
<?php
echo CHtml::dropDownList('Content[gameId]', $model->gameId, CHtml::listData(Game::model()->findAll(array('order' => 'gameId DESC')), 'gameId', 'name'), array('empty' => ' -- None --'));
?>

<label>Tag</label>
<ul id="myULTags">
    <?php
    if ($tags != null) {
        foreach ($tags as $tag) {
            echo '<li>' . $tag->tag->name . '</li>';
        }
    }
    ?>
</ul>

<?php if (isset($categoryDataProvider)) { ?>
    <label>Category</label>
    <?php
    echo CHtml::dropDownList('categoryId', '', CHtml::listData(Category::model()->findAll(array('order' => 'name')), 'categoryId', 'name'));
    ?>
    <button type="button" class="btn btn-primary" onclick="insert_category();">Add</button>

    <div style="width:300px;">
        <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'category-grid',
            'dataProvider' => $categoryDataProvider,
            'columns' => array(
                array(
                    'name' => 'categoryId',
                    'value' => '$data->categoryId != ""? $data->category->name : ""',
                ),
                array(
                    'class' => 'bootstrap.widgets.TbButtonColumn',
                    'template' => '{delete}',
                    'buttons' => array(
                        'delete' => array(
                            'url' => 'Yii::app()->createUrl("general/central/content/delete_category", array("contentId"=>$data->contentId, "categoryId"=>$data->categoryId))',
                        ),
                    ),
                ),
            ),
        ));
        ?>
    </div>
<?php } ?>

<label><?= $model->getAttributeLabel('showType'); ?></label>
<?php
echo CHtml::dropDownList('Content[showType]', $model->showType, $model->getShowTypeArray());
?>

<label><?= $model->getAttributeLabel('commentType'); ?></label>
<?php
echo CHtml::dropDownList('Content[commentType]', $model->commentType, $model->getCommentTypeArray());
?>

<label><?= $model->getAttributeLabel('pin'); ?></label>
<?php
echo CHtml::dropDownList('Content[pin]', $model->pin, $model->getPinArray());
?>

<label><?= $model->getAttributeLabel('active'); ?></label>
<?php
echo CHtml::dropDownList('Content[active]', $model->active, $model->getActiveArray());
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
