<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/tag/jquery.tagit.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/tag/tagit.ui-zendesk.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/tag-it.js" type="text/javascript" charset="utf-8"></script>
<script>
    $(function() {
        var sampleRoles = [<?php echo '"' . implode('","', $allTalent) . '"' ?>];

        $('#myULTalent').tagit({
            availableTags: sampleRoles, // this param is of course optional. it's for autocomplete.
            // configure the name of the input field (will be submitted with form), default: item[tags]
            itemName: 'talent',
            fieldName: 'Talent[]'
        });
    });
</script>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'monster-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'nameEN', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'nameTH', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'nameCN', array('class' => 'span5', 'maxlength' => 50)); ?>

<label><?= $model->getAttributeLabel('rare'); ?></label>
<?php
echo CHtml::dropDownList('Monster[rare]', $model->rare, $model->getRareArray());
?>

<?php echo $form->textFieldRow($model, 'str', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'vit', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'dex', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'agi', array('class' => 'span5')); ?>

<label><?= $model->getAttributeLabel('elementId'); ?></label>
<?php
echo CHtml::dropDownList('Monster[elementId]', $model->elementId, CHtml::listData(Element::model()->findAll(array('order' => 'elementId ASC')), 'elementId', 'nameEN'));
?>

<label><?= $model->getAttributeLabel('raceId'); ?></label>
<?php
echo CHtml::dropDownList('Monster[raceId]', $model->raceId, CHtml::listData(Race::model()->findAll(array('order' => 'raceId ASC')), 'raceId', 'nameEN'));
?>

<?php echo $form->textFieldRow($model, 'amountForm', array('class' => 'span5')); ?>

<label><?= $model->getAttributeLabel('leaderSkillId1'); ?></label>
<?php
echo CHtml::dropDownList('Monster[leaderSkillId1]', $model->leaderSkillId1, CHtml::listData(Leaderskill::model()->findAll(array('order' => 'leaderSkillId ASC')), 'leaderskillId', 'detailEN'), array('empty' => ' -- None -- '));
?>

<label><?= $model->getAttributeLabel('leaderSkillId2'); ?></label>
<?php
echo CHtml::dropDownList('Monster[leaderSkillId2]', $model->leaderSkillId2, CHtml::listData(Leaderskill::model()->findAll(array('order' => 'leaderSkillId ASC')), 'leaderskillId', 'detailEN'), array('empty' => ' -- None -- '));
?>

<label><?= $model->getAttributeLabel('leaderSkillId3'); ?></label>
<?php
echo CHtml::dropDownList('Monster[leaderSkillId3]', $model->leaderSkillId3, CHtml::listData(Leaderskill::model()->findAll(array('order' => 'leaderSkillId ASC')), 'leaderskillId', 'detailEN'), array('empty' => ' -- None -- '));
?>

<?php echo $form->textFieldRow($model, 'defaultStatWhenLvUp1', array('class' => 'span5', 'maxlength' => 15)); ?> str, vit, dex, agi ex : 1,0,0,1 = str = 1, agi = 1

<?php echo $form->textFieldRow($model, 'defaultStatWhenLvUp2', array('class' => 'span5', 'maxlength' => 15)); ?> str, vit, dex, agi ex : 2,0,0,1 = str = 2, agi = 1

<?php echo $form->textFieldRow($model, 'defaultStatWhenLvUp3', array('class' => 'span5', 'maxlength' => 15)); ?> 

<?php echo $form->textFieldRow($model, 'materialForm1', array('class' => 'span5', 'maxlength' => 100)); ?> 1,3|4,1|10,1 : material id 1 จำนวน 3 ชิ้น, id 4 จำนวน 1 ชิ้น

<?php echo $form->textFieldRow($model, 'materialForm2', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'materialForm3', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'materialUpgrade1', array('class' => 'span5', 'maxlength' => 100)); ?> 1,3,6,7,8,9 ช่องใส่ 6 ช่องใช้ materialId 1,3,6,7,8,9

<?php echo $form->textFieldRow($model, 'materialUpgrade2', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'materialUpgrade3', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'materialUpgrade4', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'materialUpgrade5', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'materialUpgrade6', array('class' => 'span5', 'maxlength' => 100)); ?>

<label><?= $model->getAttributeLabel('talent'); ?></label>
<ul id="myULTalent">
    <?php
    if ($model->talent != null) {
        $talents = explode(',', $model->talent);
        foreach ($talents as $talent) {
            echo '<li>' . $allTalentName[$talent] . '</li>';
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
