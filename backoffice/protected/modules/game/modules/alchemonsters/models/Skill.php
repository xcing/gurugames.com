<?php

/**
 * This is the model class for table "skill".
 *
 * The followings are the available columns in table 'skill':
 * @property integer $skillId
 * @property string $nameEN
 * @property string $nameTH
 * @property string $nameCN
 * @property string $detailEN
 * @property string $detailTH
 * @property string $detailCN
 * @property integer $monsterId
 * @property integer $type
 * @property integer $amountMonster
 * @property string $listMonsterId
 * @property integer $comboRace
 * @property integer $comboElement
 * @property integer $comboType
 * @property integer $isHeal
 * @property integer $dmg
 * @property integer $dmgUpPerLv
 * @property integer $dmgUpMaterialId
 * @property integer $dmgMaxLv1
 * @property integer $dmgMaxLv2
 * @property integer $dmgMaxLv3
 * @property integer $dmgAcc
 * @property integer $dmgAccUpPerLv
 * @property integer $dmgAccUpMaterialId
 * @property integer $dmgAccMaxLv1
 * @property integer $dmgAccMaxLv2
 * @property integer $dmgAccMaxLv3
 * @property integer $target
 * @property integer $targetUp
 * @property integer $targetUpMaterialId
 * @property integer $targetMaxLv1
 * @property integer $targetMaxLv2
 * @property integer $targetMaxLv3
 * @property integer $conditionId
 * @property integer $conditionIdUp
 * @property integer $conditionUpMaterialId
 * @property integer $conditionMaxLv1
 * @property integer $conditionMaxLv2
 * @property integer $conditionMaxLv3
 * @property integer $condAcc
 * @property integer $condAccUpPerLv
 * @property integer $condAccUpMaterialId
 * @property integer $condAccMaxLv1
 * @property integer $condAccMaxLv2
 * @property integer $condAccMaxLv3
 * @property integer $selfCondId
 * @property integer $selfCondIdUp
 * @property integer $selfCondUpMaterialId
 * @property integer $selfCondMaxLv1
 * @property integer $selfCondMaxLv2
 * @property integer $selfCondMaxLv3
 * @property integer $reactCondId
 * @property integer $reactCondIdUp
 * @property integer $reactCondUpMaterialId
 * @property integer $reactCondMaxLv1
 * @property integer $reactCondMaxLv2
 * @property integer $reactCondMaxLv3
 * @property integer $reactCondAcc
 * @property integer $reactCondAccUpPerLv
 * @property integer $reactCondAccUpMaterialId
 * @property integer $reactCondAccMaxLv1
 * @property integer $reactCondAccMaxLv2
 * @property integer $reactCondAccMaxLv3
 * @property integer $cd
 * @property integer $cdUpPerLv
 * @property integer $cdUpMaterialId
 * @property integer $cdMaxLv1
 * @property integer $cdMaxLv2
 * @property integer $cdMaxLv3
 * @property integer $castTime
 * @property integer $castTimeUpMaterialId
 * @property integer $castTimeMaxLv1
 * @property integer $castTimeMaxLv2
 * @property integer $castTimeMaxLv3
 * @property integer $ordinal
 */
class Skill extends CActiveRecord {

    public $ordinalArray = array(
        1 => 1,
        2 => 2,
        3 => 3,
        4 => 4,
        5 => 5,
        6 => 6,
    );
    public $targetArray = array(
        1 => 'enemy 1 unit',
        2 => 'enemy 1 unit (can atk backline)',
        3 => 'horizontal enemy',
        4 => 'vertical enemy',
        5 => 'all enemy',
        6 => 'myself',
        7 => 'allie 1 unit',
        8 => 'all allie',
        9 => 'all charactor',
        10 => 'myself and allie 1 unit',
    );
    
    public $typeArray = array(
        '1' => 'Active',
        '2' => 'Passive',
    );
    
    public $comboTypeArray = array(
        '1' => 'Monster',
        '2' => 'Race',
        '3' => 'Element',
    );
    
    public $isHealArray = array(
        '0' => 'Damage',
        '1' => 'Heal',
        
    );
    
    public $castTimeArray = array(
        '1' => 'Very slow',
        '2' => 'Slow',
        '3' => 'Medium',
        '4' => 'Fast',
        '5' => 'Very fast',
    );

    public function getOrdinalArray() {
        return $this->ordinalArray;
    }

    public function getOrdinalValue($id) {
        return $this->ordinalArray[$id];
    }

    public function convertOrdinal($data) {
        return $this->ordinalArray[$data->ordinal];
    }

    public function getTargetArray() {
        return $this->targetArray;
    }

    public function getTargetValue($id) {
        return $this->targetArray[$id];
    }

    public function convertTarget($data) {
        return $this->targetArray[$data->target];
    }
    public function getTypeArray() {
        return $this->typeArray;
    }

    public function getTypeValue($id) {
        return $this->typeArray[$id];
    }

    public function convertType($data) {
        return $this->typeArray[$data->type];
    }
    
    public function getComboTypeArray() {
        return $this->comboTypeArray;
    }

    public function getComboTypeValue($id) {
        return $this->comboTypeArray[$id];
    }

    public function convertComboType($data) {
        return $this->comboTypeArray[$data->comboType];
    }
    
    public function getIsHealArray() {
        return $this->isHealArray;
    }

    public function getIsHealValue($id) {
        return $this->isHealArray[$id];
    }

    public function convertIsHeal($data) {
        return $this->isHealArray[$data->isHeal];
    }
    
    public function getCastTimeArray() {
        return $this->castTimeArray;
    }

    public function getCastTimeValue($id) {
        return $this->castTimeArray[$id];
    }

    public function convertCastTime($data) {
        return $this->castTimeArray[$data->castTime];
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return CDbConnection database connection
     */
    public function getDbConnection() {
        return Yii::app()->db_alchemonsters;
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'skill';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('monsterId', 'required'),
            array('monsterId, type, amountMonster, comboMonsterId, comboRace, comboElement, comboType, isHeal, dmg, dmgUpPerLv, dmgUpMaterialId, dmgMaxLv1, dmgMaxLv2, dmgMaxLv3, dmgAcc, dmgAccUpPerLv, dmgAccUpMaterialId, dmgAccMaxLv1, dmgAccMaxLv2, dmgAccMaxLv3, target, targetUp, targetUpMaterialId, targetMaxLv1, targetMaxLv2, targetMaxLv3, conditionId, conditionIdUp, conditionUpMaterialId, conditionMaxLv1, conditionMaxLv2, conditionMaxLv3, condAcc, condAccUpPerLv, condAccUpMaterialId, condAccMaxLv1, condAccMaxLv2, condAccMaxLv3, selfCondId, selfCondIdUp, selfCondUpMaterialId, selfCondMaxLv1, selfCondMaxLv2, selfCondMaxLv3, reactCondId, reactCondIdUp, reactCondUpMaterialId, reactCondMaxLv1, reactCondMaxLv2, reactCondMaxLv3, reactCondAcc, reactCondAccUpPerLv, reactCondAccUpMaterialId, reactCondAccMaxLv1, reactCondAccMaxLv2, reactCondAccMaxLv3, cd, cdUpPerLv, cdUpMaterialId, cdMaxLv1, cdMaxLv2, cdMaxLv3, castTime, castTimeUpMaterialId, castTimeMaxLv1, castTimeMaxLv2, castTimeMaxLv3, ordinal', 'numerical', 'integerOnly' => true),
            array('nameEN, nameTH, nameCN', 'length', 'max' => 50),
            array('detailEN, detailTH, detailCN', 'length', 'max' => 150),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('skillId, nameEN, nameTH, nameCN, detailEN, detailTH, detailCN, monsterId, type, amountMonster, comboMonsterId, comboRace, comboElement, comboType, isHeal, dmg, dmgUpPerLv, dmgUpMaterialId, dmgMaxLv1, dmgMaxLv2, dmgMaxLv3, dmgAcc, dmgAccUpPerLv, dmgAccUpMaterialId, dmgAccMaxLv1, dmgAccMaxLv2, dmgAccMaxLv3, target, targetUp, targetUpMaterialId, targetMaxLv1, targetMaxLv2, targetMaxLv3, conditionId, conditionIdUp, conditionUpMaterialId, conditionMaxLv1, conditionMaxLv2, conditionMaxLv3, condAcc, condAccUpPerLv, condAccUpMaterialId, condAccMaxLv1, condAccMaxLv2, condAccMaxLv3, selfCondId, selfCondIdUp, selfCondUpMaterialId, selfCondMaxLv1, selfCondMaxLv2, selfCondMaxLv3, reactCondId, reactCondIdUp, reactCondUpMaterialId, reactCondMaxLv1, reactCondMaxLv2, reactCondMaxLv3, reactCondAcc, reactCondAccUpPerLv, reactCondAccUpMaterialId, reactCondAccMaxLv1, reactCondAccMaxLv2, reactCondAccMaxLv3, cd, cdUpPerLv, cdUpMaterialId, cdMaxLv1, cdMaxLv2, cdMaxLv3, castTime, castTimeUpMaterialId, castTimeMaxLv1, castTimeMaxLv2, castTimeMaxLv3, ordinal', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'monster' => array(self::BELONGS_TO, 'Monster', 'monsterId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'skillId' => 'Skill',
            'nameEN' => 'Name En',
            'nameTH' => 'Name Th',
            'nameCN' => 'Name Cn',
            'detailEN' => 'Detail En',
            'detailTH' => 'Detail Th',
            'detailCN' => 'Detail Cn',
            'monsterId' => 'Monster',
            'type' => 'Type',
            'amountMonster' => 'Amount Monster',
            'comboMonsterId' => 'Combo Monster Id',
            'comboRace' => 'Combo Race',
            'comboElement' => 'Combo Element',
            'comboType' => 'Combo Type',
            'isHeal' => 'Is Heal',
            'dmg' => 'Dmg',
            'dmgUpPerLv' => 'Dmg Up Per Lv',
            'dmgUpMaterialId' => 'Dmg Up Material',
            'dmgMaxLv1' => 'Dmg Max Lv1',
            'dmgMaxLv2' => 'Dmg Max Lv2',
            'dmgMaxLv3' => 'Dmg Max Lv3',
            'dmgAcc' => 'Dmg Acc',
            'dmgAccUpPerLv' => 'Dmg Acc Up Per Lv',
            'dmgAccUpMaterialId' => 'Dmg Acc Up Material',
            'dmgAccMaxLv1' => 'Dmg Acc Max Lv1',
            'dmgAccMaxLv2' => 'Dmg Acc Max Lv2',
            'dmgAccMaxLv3' => 'Dmg Acc Max Lv3',
            'target' => 'Target',
            'targetUp' => 'Target Up',
            'targetUpMaterialId' => 'Target Up Material',
            'targetMaxLv1' => 'Target Max Lv1',
            'targetMaxLv2' => 'Target Max Lv2',
            'targetMaxLv3' => 'Target Max Lv3',
            'conditionId' => 'Condition',
            'conditionIdUp' => 'Condition Id Up',
            'conditionUpMaterialId' => 'Condition Up Material',
            'conditionMaxLv1' => 'Condition Max Lv1',
            'conditionMaxLv2' => 'Condition Max Lv2',
            'conditionMaxLv3' => 'Condition Max Lv3',
            'condAcc' => 'Cond Acc',
            'condAccUpPerLv' => 'Cond Acc Up Per Lv',
            'condAccUpMaterialId' => 'Cond Acc Up Material',
            'condAccMaxLv1' => 'Cond Acc Max Lv1',
            'condAccMaxLv2' => 'Cond Acc Max Lv2',
            'condAccMaxLv3' => 'Cond Acc Max Lv3',
            'selfCondId' => 'Self Cond',
            'selfCondIdUp' => 'Self Cond Id Up',
            'selfCondUpMaterialId' => 'Self Cond Up Material',
            'selfCondMaxLv1' => 'Self Cond Max Lv1',
            'selfCondMaxLv2' => 'Self Cond Max Lv2',
            'selfCondMaxLv3' => 'Self Cond Max Lv3',
            'reactCondId' => 'React Cond',
            'reactCondIdUp' => 'React Cond Id Up',
            'reactCondUpMaterialId' => 'React Cond Up Material',
            'reactCondMaxLv1' => 'React Cond Max Lv1',
            'reactCondMaxLv2' => 'React Cond Max Lv2',
            'reactCondMaxLv3' => 'React Cond Max Lv3',
            'reactCondAcc' => 'React Cond Acc',
            'reactCondAccUpPerLv' => 'React Cond Acc Up Per Lv',
            'reactCondAccUpMaterialId' => 'React Cond Acc Up Material',
            'reactCondAccMaxLv1' => 'React Cond Acc Max Lv1',
            'reactCondAccMaxLv2' => 'React Cond Acc Max Lv2',
            'reactCondAccMaxLv3' => 'React Cond Acc Max Lv3',
            'cd' => 'Cd',
            'cdUpPerLv' => 'Cd Up Per Lv',
            'cdUpMaterialId' => 'Cd Up Material',
            'cdMaxLv1' => 'Cd Max Lv1',
            'cdMaxLv2' => 'Cd Max Lv2',
            'cdMaxLv3' => 'Cd Max Lv3',
            'castTime' => 'Cast Time',
            'castTimeUpMaterialId' => 'Cast Time Up Material',
            'castTimeMaxLv1' => 'Cast Time Max Lv1',
            'castTimeMaxLv2' => 'Cast Time Max Lv2',
            'castTimeMaxLv3' => 'Cast Time Max Lv3',
            'ordinal' => 'Ordinal',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('skillId', $this->skillId);
        $criteria->compare('nameEN', $this->nameEN, true);
        $criteria->compare('nameTH', $this->nameTH, true);
        $criteria->compare('nameCN', $this->nameCN, true);
        $criteria->compare('detailEN', $this->detailEN, true);
        $criteria->compare('detailTH', $this->detailTH, true);
        $criteria->compare('detailCN', $this->detailCN, true);
        $criteria->compare('monsterId', $this->monsterId);
        $criteria->compare('type', $this->type);
        $criteria->compare('amountMonster', $this->amountMonster);
        $criteria->compare('comboMonsterId', $this->comboMonsterId);
        $criteria->compare('comboRace', $this->comboRace);
        $criteria->compare('comboElement', $this->comboElement);
        $criteria->compare('comboType', $this->comboType);
        $criteria->compare('isHeal', $this->isHeal);
        $criteria->compare('dmg', $this->dmg);
        $criteria->compare('dmgUpPerLv', $this->dmgUpPerLv);
        $criteria->compare('dmgUpMaterialId', $this->dmgUpMaterialId);
        $criteria->compare('dmgMaxLv1', $this->dmgMaxLv1);
        $criteria->compare('dmgMaxLv2', $this->dmgMaxLv2);
        $criteria->compare('dmgMaxLv3', $this->dmgMaxLv3);
        $criteria->compare('dmgAcc', $this->dmgAcc);
        $criteria->compare('dmgAccUpPerLv', $this->dmgAccUpPerLv);
        $criteria->compare('dmgAccUpMaterialId', $this->dmgAccUpMaterialId);
        $criteria->compare('dmgAccMaxLv1', $this->dmgAccMaxLv1);
        $criteria->compare('dmgAccMaxLv2', $this->dmgAccMaxLv2);
        $criteria->compare('dmgAccMaxLv3', $this->dmgAccMaxLv3);
        $criteria->compare('target', $this->target);
        $criteria->compare('targetUp', $this->targetUp);
        $criteria->compare('targetUpMaterialId', $this->targetUpMaterialId);
        $criteria->compare('targetMaxLv1', $this->targetMaxLv1);
        $criteria->compare('targetMaxLv2', $this->targetMaxLv2);
        $criteria->compare('targetMaxLv3', $this->targetMaxLv3);
        $criteria->compare('conditionId', $this->conditionId);
        $criteria->compare('conditionIdUp', $this->conditionIdUp);
        $criteria->compare('conditionUpMaterialId', $this->conditionUpMaterialId);
        $criteria->compare('conditionMaxLv1', $this->conditionMaxLv1);
        $criteria->compare('conditionMaxLv2', $this->conditionMaxLv2);
        $criteria->compare('conditionMaxLv3', $this->conditionMaxLv3);
        $criteria->compare('condAcc', $this->condAcc);
        $criteria->compare('condAccUpPerLv', $this->condAccUpPerLv);
        $criteria->compare('condAccUpMaterialId', $this->condAccUpMaterialId);
        $criteria->compare('condAccMaxLv1', $this->condAccMaxLv1);
        $criteria->compare('condAccMaxLv2', $this->condAccMaxLv2);
        $criteria->compare('condAccMaxLv3', $this->condAccMaxLv3);
        $criteria->compare('selfCondId', $this->selfCondId);
        $criteria->compare('selfCondIdUp', $this->selfCondIdUp);
        $criteria->compare('selfCondUpMaterialId', $this->selfCondUpMaterialId);
        $criteria->compare('selfCondMaxLv1', $this->selfCondMaxLv1);
        $criteria->compare('selfCondMaxLv2', $this->selfCondMaxLv2);
        $criteria->compare('selfCondMaxLv3', $this->selfCondMaxLv3);
        $criteria->compare('reactCondId', $this->reactCondId);
        $criteria->compare('reactCondIdUp', $this->reactCondIdUp);
        $criteria->compare('reactCondUpMaterialId', $this->reactCondUpMaterialId);
        $criteria->compare('reactCondMaxLv1', $this->reactCondMaxLv1);
        $criteria->compare('reactCondMaxLv2', $this->reactCondMaxLv2);
        $criteria->compare('reactCondMaxLv3', $this->reactCondMaxLv3);
        $criteria->compare('reactCondAcc', $this->reactCondAcc);
        $criteria->compare('reactCondAccUpPerLv', $this->reactCondAccUpPerLv);
        $criteria->compare('reactCondAccUpMaterialId', $this->reactCondAccUpMaterialId);
        $criteria->compare('reactCondAccMaxLv1', $this->reactCondAccMaxLv1);
        $criteria->compare('reactCondAccMaxLv2', $this->reactCondAccMaxLv2);
        $criteria->compare('reactCondAccMaxLv3', $this->reactCondAccMaxLv3);
        $criteria->compare('cd', $this->cd);
        $criteria->compare('cdUpPerLv', $this->cdUpPerLv);
        $criteria->compare('cdUpMaterialId', $this->cdUpMaterialId);
        $criteria->compare('cdMaxLv1', $this->cdMaxLv1);
        $criteria->compare('cdMaxLv2', $this->cdMaxLv2);
        $criteria->compare('cdMaxLv3', $this->cdMaxLv3);
        $criteria->compare('castTime', $this->castTime);
        $criteria->compare('castTimeUpMaterialId', $this->castTimeUpMaterialId);
        $criteria->compare('castTimeMaxLv1', $this->castTimeMaxLv1);
        $criteria->compare('castTimeMaxLv2', $this->castTimeMaxLv2);
        $criteria->compare('castTimeMaxLv3', $this->castTimeMaxLv3);
        $criteria->compare('ordinal', $this->ordinal);
        $criteria->order = 'ordinal ASC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}