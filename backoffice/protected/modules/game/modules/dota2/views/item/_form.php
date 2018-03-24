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
    $(function() {
        var sampleRoles = [<?php echo '"' . implode('","', $allMaterial) . '"' ?>];

        $('#myULMaterials').tagit({
            availableTags: sampleRoles, // this param is of course optional. it's for autocomplete.
            // configure the name of the input field (will be submitted with form), default: item[tags]
            itemName: 'item',
            fieldName: 'materials[]'
        });
    });
</script>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'item-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'image', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textAreaRow($model, 'detailTH', array('rows' => 4, 'cols' => 50, 'class' => 'span8')); ?>

<?php //echo $form->textAreaRow($model, 'detailEN', array('rows' => 4, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textFieldRow($model, 'price', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'bonus', array('class' => 'span5', 'maxlength' => 500)); ?>

<?php echo $form->textAreaRow($model, 'informationTH', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textAreaRow($model, 'informationTH2', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php //echo $form->textAreaRow($model, 'informationEN', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<label>Material</label>
<ul id="myULMaterials">
    <?php
    if ($materials != null) {
        $materials = explode(',', $materials);
        foreach ($materials as $material) {
            echo '<li>' . $allMaterialName[$material] . '</li>';
        }
    }
    ?>
</ul>

<label><?= $model->getAttributeLabel('location'); ?></label>
<?php
echo CHtml::dropDownList('Item[location]', $model->location, $model->getLocationArray());
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
