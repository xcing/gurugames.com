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
        var sampleRoles = [<?php echo '"' . implode('","', $allRole) . '"' ?>];

        $('#myULRoles').tagit({
            availableTags: sampleRoles, // this param is of course optional. it's for autocomplete.
            // configure the name of the input field (will be submitted with form), default: item[tags]
            itemName: 'item',
            fieldName: 'roles[]'
        });
    });
</script>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'hero-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'image', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'imageFull', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textAreaRow($model, 'bioTH', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php //echo $form->textAreaRow($model, 'bioEN', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<label><?= $model->getAttributeLabel('type'); ?></label>
<?php
echo CHtml::dropDownList('Hero[type]', $model->type, $model->getTypeArray());
?>

<?php echo $form->textFieldRow($model, 'hp', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'mana', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'int', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'agi', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'str', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'atk', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'armor', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'moveSpd', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'sightRange', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'atkRange', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'missileSpd', array('class' => 'span5')); ?>

<label><?= $model->getAttributeLabel('atkType'); ?></label>
<?php
echo CHtml::dropDownList('Hero[atkType]', $model->atkType, $model->getAtkTypeArray());
?>

<label><?= $model->getAttributeLabel('side'); ?></label>
<?php
echo CHtml::dropDownList('Hero[side]', $model->side, $model->getSideArray());
?>

<label>Role</label>
<ul id="myULRoles">
    <?php
    if ($roles != null) {
        $roles = explode(',', $roles);
        foreach ($roles as $role) {
            echo '<li>' . $allRoleName[$role] . '</li>';
        }
    }
    ?>
</ul>

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
