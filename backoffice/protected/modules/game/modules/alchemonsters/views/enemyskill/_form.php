<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/tag/jquery.tagit.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/tag/tagit.ui-zendesk.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/tag-it.js" type="text/javascript" charset="utf-8"></script>
<script>
    $(function() {
        var sampleRoles = [<?php echo '"' . implode('","', $allCondition) . '"' ?>];

        $('#myULCondition').tagit({
            availableTags: sampleRoles, // this param is of course optional. it's for autocomplete.
            // configure the name of the input field (will be submitted with form), default: item[tags]
            itemName: 'condition',
            fieldName: 'Condition[]'
        });
        
        $('#myULSelfCond').tagit({
            availableTags: sampleRoles, // this param is of course optional. it's for autocomplete.
            // configure the name of the input field (will be submitted with form), default: item[tags]
            itemName: 'selfCond',
            fieldName: 'SelfCond[]'
        });
        
        $('#myULReactCond').tagit({
            availableTags: sampleRoles, // this param is of course optional. it's for autocomplete.
            // configure the name of the input field (will be submitted with form), default: item[tags]
            itemName: 'reactCond',
            fieldName: 'ReactCond[]'
        });
    });
</script>


<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'enemyskill-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'nameEN', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'nameTH', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'nameCN', array('class' => 'span5', 'maxlength' => 50)); ?>

<label><?= $model->getAttributeLabel('enemyId'); ?></label>
<?php
echo CHtml::dropDownList('Enemyskill[enemyId]', $model->enemyId, CHtml::listData(Enemy::model()->findAll(array('order' => 'nameEN ASC')), 'monsterId', 'nameEN'));
?>

<label><?= $model->getAttributeLabel('type'); ?></label>
<?php
echo CHtml::dropDownList('Enemyskill[type]', $model->type, $model->getTypeArray());
?>

<label><?= $model->getAttributeLabel('isHeal'); ?></label>
<?php
echo CHtml::dropDownList('Enemyskill[isHeal]', $model->isHeal, $model->getIsHealArray());
?>

<?php echo $form->textFieldRow($model, 'dmg', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'dmgAcc', array('class' => 'span5')); ?>

<label><?= $model->getAttributeLabel('target'); ?></label>
<?php
echo CHtml::dropDownList('Enemyskill[target]', $model->target, $model->getTargetArray()); 
?> 

<label><?= $model->getAttributeLabel('condition'); ?></label>
<ul id="myULCondition">
    <?php
    if ($model->condition != null) {
        $conditions = explode(',', $model->condition);
        foreach ($conditions as $condition) {
            echo '<li>' . $allConditionName[$condition] . '</li>';
        }
    }
    ?>
</ul>

<?php echo $form->textFieldRow($model, 'condAcc', array('class' => 'span5')); ?>

<label><?= $model->getAttributeLabel('selfCond'); ?></label>
<ul id="myULSelfCond">
    <?php
    if ($model->selfCond != null) {
        $conditions = explode(',', $model->selfCond);
        foreach ($conditions as $condition) {
            echo '<li>' . $allConditionName[$condition] . '</li>';
        }
    }
    ?>
</ul>

<label><?= $model->getAttributeLabel('reactCond'); ?></label>
<ul id="myULReactCond">
    <?php
    if ($model->reactCond != null) {
        $conditions = explode(',', $model->reactCond);
        foreach ($conditions as $condition) {
            echo '<li>' . $allConditionName[$condition] . '</li>';
        }
    }
    ?>
</ul>

<?php echo $form->textFieldRow($model, 'reactCondAcc', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'cd', array('class' => 'span5')); ?>

<label><?= $model->getAttributeLabel('castTime'); ?></label>
<?php
echo CHtml::dropDownList('Enemyskill[castTime]', $model->castTime, $model->getCastTimeArray());
?>

<label><?= $model->getAttributeLabel('ordinal'); ?></label>
<?php
echo CHtml::dropDownList('Enemyskill[ordinal]', $model->ordinal, $model->getOrdinalArray()); 
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
