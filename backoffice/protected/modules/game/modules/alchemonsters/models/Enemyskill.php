<?php

/**
 * This is the model class for table "enemyskill".
 *
 * The followings are the available columns in table 'enemyskill':
 * @property integer $skillId
 * @property string $nameEN
 * @property string $nameTH
 * @property string $nameCN
 * @property integer $enemyId
 * @property integer $type
 * @property integer $isHeal
 * @property integer $dmg
 * @property integer $dmgAcc
 * @property integer $target
 * @property string $condition
 * @property integer $condAcc
 * @property string $selfCond
 * @property string $reactCond
 * @property integer $reactCondAcc
 * @property integer $cd
 * @property integer $castTime
 * @property integer $ordinal
 */
class Enemyskill extends CActiveRecord {

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
        return 'enemyskill';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('enemyId', 'required'),
            array('enemyId, type, isHeal, dmg, dmgAcc, target, condAcc, reactCondAcc, cd, castTime, ordinal', 'numerical', 'integerOnly' => true),
            array('nameEN, nameTH, nameCN', 'length', 'max' => 50),
            array('condition, selfCond, reactCond', 'length', 'max' => 20),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('skillId, nameEN, nameTH, nameCN, enemyId, type, isHeal, dmg, dmgAcc, target, condition, condAcc, selfCond, reactCond, reactCondAcc, cd, castTime, ordinal', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'enemy' => array(self::BELONGS_TO, 'Enemy', 'enemyId'),
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
            'enemyId' => 'Enemy',
            'type' => 'Type',
            'isHeal' => 'Is Heal',
            'dmg' => 'Dmg',
            'dmgAcc' => 'Dmg Acc',
            'target' => 'Target',
            'condition' => 'Condition',
            'condAcc' => 'Cond Acc',
            'selfCond' => 'Self Cond',
            'reactCond' => 'React Cond',
            'reactCondAcc' => 'React Cond Acc',
            'cd' => 'Cd',
            'castTime' => 'Cast Time',
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
        $criteria->compare('enemyId', $this->enemyId);
        $criteria->compare('type', $this->type);
        $criteria->compare('isHeal', $this->isHeal);
        $criteria->compare('dmg', $this->dmg);
        $criteria->compare('dmgAcc', $this->dmgAcc);
        $criteria->compare('target', $this->target);
        $criteria->compare('condition', $this->condition, true);
        $criteria->compare('condAcc', $this->condAcc);
        $criteria->compare('selfCond', $this->selfCond, true);
        $criteria->compare('reactCond', $this->reactCond, true);
        $criteria->compare('reactCondAcc', $this->reactCondAcc);
        $criteria->compare('cd', $this->cd);
        $criteria->compare('castTime', $this->castTime);
        $criteria->compare('ordinal', $this->ordinal);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}