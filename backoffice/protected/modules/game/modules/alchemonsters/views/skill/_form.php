<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'skill-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'nameEN', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'nameTH', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'nameCN', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'detailEN', array('class' => 'span5', 'maxlength' => 150)); ?>

<?php echo $form->textFieldRow($model, 'detailTH', array('class' => 'span5', 'maxlength' => 150)); ?>

<?php echo $form->textFieldRow($model, 'detailCN', array('class' => 'span5', 'maxlength' => 150)); ?>

<label><?= $model->getAttributeLabel('monsterId'); ?></label>
<?php
echo CHtml::dropDownList('Skill[monsterId]', $model->monsterId, CHtml::listData(Monster::model()->findAll(array('order' => 'nameEN ASC')), 'monsterId', 'nameEN'));
?>

<label><?= $model->getAttributeLabel('type'); ?></label>
<?php
echo CHtml::dropDownList('Skill[type]', $model->type, $model->getTypeArray());
?>

<?php echo $form->textFieldRow($model, 'amountMonster', array('class' => 'span5')); ?> ถ้าเป็นสกิลเดี่ยวใส่ 1 สกิลร่วมใส่เป็นตัวเลขว่าสกิลร่วมกี่ตัว 2-4

<label><?= $model->getAttributeLabel('comboType'); ?></label>
<?php
echo CHtml::dropDownList('Skill[comboType]', $model->comboType, $model->getComboTypeArray()); 
?> สำหรับสกิลร่วม, ใช้กำหนดว่าจะเป็นเอาอะไรมาเป็นเงื่อนไขของสกิลร่วม

<label><?= $model->getAttributeLabel('comboMonsterId'); ?></label>
<?php
echo CHtml::dropDownList('Skill[comboMonsterId]', $model->comboMonsterId, CHtml::listData(Monster::model()->findAll(array('order' => 'nameEN ASC')), 'monsterId', 'nameEN'), array('empty' => ' -- None -- ')); 
?> สำหรับสกิลร่วม, ไว้กำหนดมอนสเตอร์ที่ใช้ร่วมกัน

<label><?= $model->getAttributeLabel('comboRace'); ?></label>
<?php
echo CHtml::dropDownList('Skill[comboRace]', $model->comboRace, CHtml::listData(Race::model()->findAll(array('order' => 'nameEN ASC')), 'raceId', 'nameEN'), array('empty' => ' -- None -- ')); 
?> สำหรับสกิลร่วม, ไว้กำหนดเผ่าที่ใช้ร่วมกัน

<label><?= $model->getAttributeLabel('comboElement'); ?></label>
<?php
echo CHtml::dropDownList('Skill[comboElement]', $model->comboElement, CHtml::listData(Element::model()->findAll(array('order' => 'elementId ASC')), 'elementId', 'nameEN'), array('empty' => ' -- None -- '));
?> สำหรับสกิลร่วม, ไว้กำหนดธาตุที่ใช้ร่วมกัน

<label><?= $model->getAttributeLabel('isHeal'); ?></label>
<?php
echo CHtml::dropDownList('Skill[isHeal]', $model->isHeal, $model->getIsHealArray());
?>

<?php echo $form->textFieldRow($model, 'dmg', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'dmgUpPerLv', array('class' => 'span5')); ?>

<label><?= $model->getAttributeLabel('dmgUpMaterialId'); ?></label>
<?php
echo CHtml::dropDownList('Skill[dmgUpMaterialId]', $model->dmgUpMaterialId, CHtml::listData(Material::model()->findAll(array('order' => 'nameEN ASC')), 'materialId', 'nameEN'), array('empty' => ' -- None -- ')); 
?> 

<?php echo $form->textFieldRow($model, 'dmgMaxLv1', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'dmgMaxLv2', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'dmgMaxLv3', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'dmgAcc', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'dmgAccUpPerLv', array('class' => 'span5')); ?>

<label><?= $model->getAttributeLabel('dmgAccUpMaterialId'); ?></label>
<?php
echo CHtml::dropDownList('Skill[dmgAccUpMaterialId]', $model->dmgAccUpMaterialId, CHtml::listData(Material::model()->findAll(array('order' => 'nameEN ASC')), 'materialId', 'nameEN'), array('empty' => ' -- None -- ')); 
?> 

<?php echo $form->textFieldRow($model, 'dmgAccMaxLv1', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'dmgAccMaxLv2', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'dmgAccMaxLv3', array('class' => 'span5')); ?>

<label><?= $model->getAttributeLabel('target'); ?></label>
<?php
echo CHtml::dropDownList('Skill[target]', $model->target, $model->getTargetArray()); 
?> 

<label><?= $model->getAttributeLabel('targetUp'); ?></label>
<?php
echo CHtml::dropDownList('Skill[targetUp]', $model->targetUp, $model->getTargetArray()); 
?> 

<label><?= $model->getAttributeLabel('targetUpMaterialId'); ?></label>
<?php
echo CHtml::dropDownList('Skill[targetUpMaterialId]', $model->targetUpMaterialId, CHtml::listData(Material::model()->findAll(array('order' => 'nameEN ASC')), 'materialId', 'nameEN'), array('empty' => ' -- None -- ')); 
?> 

<?php echo $form->textFieldRow($model, 'targetMaxLv1', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'targetMaxLv2', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'targetMaxLv3', array('class' => 'span5')); ?>

<label><?= $model->getAttributeLabel('conditionId'); ?></label>
<?php
echo CHtml::dropDownList('Skill[conditionId]', $model->conditionId, CHtml::listData(Condition::model()->findAll(array('order' => 'nameEN ASC')), 'conditionId', 'nameEN'), array('empty' => ' -- None -- ')); 
?> 

<label><?= $model->getAttributeLabel('conditionIdUp'); ?></label>
<?php
echo CHtml::dropDownList('Skill[conditionIdUp]', $model->conditionIdUp, CHtml::listData(Condition::model()->findAll(array('order' => 'nameEN ASC')), 'conditionId', 'nameEN'), array('empty' => ' -- None -- ')); 
?> 

<label><?= $model->getAttributeLabel('conditionUpMaterialId'); ?></label>
<?php
echo CHtml::dropDownList('Skill[conditionUpMaterialId]', $model->conditionUpMaterialId, CHtml::listData(Material::model()->findAll(array('order' => 'nameEN ASC')), 'materialId', 'nameEN'), array('empty' => ' -- None -- ')); 
?> 

<?php echo $form->textFieldRow($model, 'conditionMaxLv1', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'conditionMaxLv2', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'conditionMaxLv3', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'condAcc', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'condAccUpPerLv', array('class' => 'span5')); ?>

<label><?= $model->getAttributeLabel('condAccUpMaterialId'); ?></label>
<?php
echo CHtml::dropDownList('Skill[condAccUpMaterialId]', $model->condAccUpMaterialId, CHtml::listData(Material::model()->findAll(array('order' => 'nameEN ASC')), 'materialId', 'nameEN'), array('empty' => ' -- None -- ')); 
?> 

<?php echo $form->textFieldRow($model, 'condAccMaxLv1', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'condAccMaxLv2', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'condAccMaxLv3', array('class' => 'span5')); ?>

<label><?= $model->getAttributeLabel('selfCondId'); ?></label>
<?php
echo CHtml::dropDownList('Skill[selfCondId]', $model->selfCondId, CHtml::listData(Condition::model()->findAll(array('order' => 'nameEN ASC')), 'conditionId', 'nameEN'), array('empty' => ' -- None -- ')); 
?> 

<label><?= $model->getAttributeLabel('selfCondIdUp'); ?></label>
<?php
echo CHtml::dropDownList('Skill[selfCondIdUp]', $model->selfCondIdUp, CHtml::listData(Condition::model()->findAll(array('order' => 'nameEN ASC')), 'conditionId', 'nameEN'), array('empty' => ' -- None -- ')); 
?> 

<label><?= $model->getAttributeLabel('selfCondUpMaterialId'); ?></label>
<?php
echo CHtml::dropDownList('Skill[selfCondUpMaterialId]', $model->selfCondUpMaterialId, CHtml::listData(Material::model()->findAll(array('order' => 'nameEN ASC')), 'materialId', 'nameEN'), array('empty' => ' -- None -- ')); 
?> 

<?php echo $form->textFieldRow($model, 'selfCondMaxLv1', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'selfCondMaxLv2', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'selfCondMaxLv3', array('class' => 'span5')); ?>

<label><?= $model->getAttributeLabel('reactCondId'); ?></label>
<?php
echo CHtml::dropDownList('Skill[reactCondId]', $model->reactCondId, CHtml::listData(Condition::model()->findAll(array('order' => 'nameEN ASC')), 'conditionId', 'nameEN'), array('empty' => ' -- None -- ')); 
?> 

<label><?= $model->getAttributeLabel('reactCondIdUp'); ?></label>
<?php
echo CHtml::dropDownList('Skill[reactCondIdUp]', $model->reactCondIdUp, CHtml::listData(Condition::model()->findAll(array('order' => 'nameEN ASC')), 'conditionId', 'nameEN'), array('empty' => ' -- None -- ')); 
?> 

<label><?= $model->getAttributeLabel('reactCondUpMaterialId'); ?></label>
<?php
echo CHtml::dropDownList('Skill[reactCondUpMaterialId]', $model->reactCondUpMaterialId, CHtml::listData(Material::model()->findAll(array('order' => 'nameEN ASC')), 'materialId', 'nameEN'), array('empty' => ' -- None -- ')); 
?> 

<?php echo $form->textFieldRow($model, 'reactCondMaxLv1', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'reactCondMaxLv2', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'reactCondMaxLv3', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'reactCondAcc', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'reactCondAccUpPerLv', array('class' => 'span5')); ?>

<label><?= $model->getAttributeLabel('reactCondAccUpMaterialId'); ?></label>
<?php
echo CHtml::dropDownList('Skill[reactCondAccUpMaterialId]', $model->reactCondAccUpMaterialId, CHtml::listData(Material::model()->findAll(array('order' => 'nameEN ASC')), 'materialId', 'nameEN'), array('empty' => ' -- None -- ')); 
?> 

<?php echo $form->textFieldRow($model, 'reactCondAccMaxLv1', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'reactCondAccMaxLv2', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'reactCondAccMaxLv3', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'cd', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'cdUpPerLv', array('class' => 'span5')); ?>

<label><?= $model->getAttributeLabel('cdUpMaterialId'); ?></label>
<?php
echo CHtml::dropDownList('Skill[cdUpMaterialId]', $model->cdUpMaterialId, CHtml::listData(Material::model()->findAll(array('order' => 'nameEN ASC')), 'materialId', 'nameEN'), array('empty' => ' -- None -- ')); 
?> 

<?php echo $form->textFieldRow($model, 'cdMaxLv1', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'cdMaxLv2', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'cdMaxLv3', array('class' => 'span5')); ?>

<label><?= $model->getAttributeLabel('castTime'); ?></label>
<?php
echo CHtml::dropDownList('Skill[castTime]', $model->castTime, $model->getCastTimeArray());
?>

<label><?= $model->getAttributeLabel('castTimeUpMaterialId'); ?></label>
<?php
echo CHtml::dropDownList('Skill[castTimeUpMaterialId]', $model->castTimeUpMaterialId, CHtml::listData(Material::model()->findAll(array('order' => 'nameEN ASC')), 'materialId', 'nameEN'), array('empty' => ' -- None -- ')); 
?> 

<?php echo $form->textFieldRow($model, 'castTimeMaxLv1', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'castTimeMaxLv2', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'castTimeMaxLv3', array('class' => 'span5')); ?>

<label><?= $model->getAttributeLabel('ordinal'); ?></label>
<?php
echo CHtml::dropDownList('Skill[ordinal]', $model->ordinal, $model->getOrdinalArray()); 
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
