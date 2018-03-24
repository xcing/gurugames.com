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
    $(function() {
        var sampleRoles = [<?php echo '"' . implode('","', $allItem) . '"' ?>];

        $('#myULstartItems').tagit({
            availableTags: sampleRoles, // this param is of course optional. it's for autocomplete.
            // configure the name of the input field (will be submitted with form), default: item[tags]
            itemName: 'item',
            fieldName: 'startItem[]'
        });
        
        $('#myULearlyItems').tagit({
            availableTags: sampleRoles, // this param is of course optional. it's for autocomplete.
            // configure the name of the input field (will be submitted with form), default: item[tags]
            itemName: 'item',
            fieldName: 'earlyItem[]'
        });
        
        $('#myULcoreItems').tagit({
            availableTags: sampleRoles, // this param is of course optional. it's for autocomplete.
            // configure the name of the input field (will be submitted with form), default: item[tags]
            itemName: 'item',
            fieldName: 'coreItem[]'
        });
        
        $('#myULlateItems').tagit({
            availableTags: sampleRoles, // this param is of course optional. it's for autocomplete.
            // configure the name of the input field (will be submitted with form), default: item[tags]
            itemName: 'item',
            fieldName: 'lateItem[]'
        });
        
        $('#myULdynamicItems').tagit({
            availableTags: sampleRoles, // this param is of course optional. it's for autocomplete.
            // configure the name of the input field (will be submitted with form), default: item[tags]
            itemName: 'item',
            fieldName: 'dynamicItem[]'
        });
    });
</script>


<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'guidehero-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<label><?= $model->getAttributeLabel('heroId'); ?></label>
<?php
echo CHtml::dropDownList('Guidehero[heroId]', $model->heroId, CHtml::listData(Hero::model()->findAll(array('order' => 'name ASC')), 'heroId', 'name'));
?>

<?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'skill', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'image', array('class' => 'span5', 'maxlength' => 200)); ?>

<label><?= $model->getAttributeLabel('startItem'); ?></label>
<ul id="myULstartItems">
    <?php
    if ($model->startItem != null) {
        $startItem = explode(',', $model->startItem);
        foreach ($startItem as $item) {
            echo '<li>' . $allItemName[$item] . '</li>';
        }
    }
    ?>
</ul>

<label><?= $model->getAttributeLabel('earlyItem'); ?></label>
<ul id="myULearlyItems">
    <?php
    if ($model->earlyItem != null) {
        $earlyItem = explode(',', $model->earlyItem);
        foreach ($earlyItem as $item) {
            echo '<li>' . $allItemName[$item] . '</li>';
        }
    }
    ?>
</ul>

<label><?= $model->getAttributeLabel('coreItem'); ?></label>
<ul id="myULcoreItems">
    <?php
    if ($model->coreItem != null) {
        $coreItem = explode(',', $model->coreItem);
        foreach ($coreItem as $item) {
            echo '<li>' . $allItemName[$item] . '</li>';
        }
    }
    ?>
</ul>

<label><?= $model->getAttributeLabel('lateItem'); ?></label>
<ul id="myULlateItems">
    <?php
    if ($model->lateItem != null) {
        $lateItem = explode(',', $model->lateItem);
        foreach ($lateItem as $item) {
            echo '<li>' . $allItemName[$item] . '</li>';
        }
    }
    ?>
</ul>

<label><?= $model->getAttributeLabel('dynamicItem'); ?></label>
<ul id="myULdynamicItems">
    <?php
    if ($model->dynamicItem != null) {
        $dynamicItem = explode(',', $model->dynamicItem);
        foreach ($dynamicItem as $item) {
            echo '<li>' . $allItemName[$item] . '</li>';
        }
    }
    ?>
</ul>

<?php echo $form->textAreaRow($model, 'detail', array('class' => 'ckeditor')); ?>

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
