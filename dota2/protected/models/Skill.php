<?php

/**
 * This is the model class for table "skill".
 *
 * The followings are the available columns in table 'skill':
 * @property integer $skillId
 * @property integer $heroId
 * @property string $name
 * @property string $detailTH
 * @property string $detailEN
 * @property string $image
 * @property string $youtube
 * @property string $mana
 * @property string $cooldown
 * @property integer $abilityType
 * @property integer $abilityResult
 * @property integer $targetType
 * @property integer $damageType
 * @property string $note
 * @property integer $ordinal
 */
class Skill extends CActiveRecord {

    public $maxOrdinal = 0;
    /*public $abilityTypeArray = array(
        '1' => 'active',
        '2' => 'passive',
    );
    public $abilityResultArray = array(
        '0' => 'Myself',
        '1' => 'Enemy Unit', 
        '2' => 'Allie Unit', 
        '3' => 'Enemy Hero', 
        '4' => 'Allie Hero', 
        '5' => 'Hero', 
        '6' => 'Unit',
    );
    public $targetTypeArray = array(
        '0' => 'Non Target',
        '1' => 'Point',
        '2' => 'Group',
        '3' => 'Instant',
    );
    public $piercesImmuneArray = array(
        '0' => 'no',
        '1' => 'yes',
    );

    public function getAbilityTypeArray() {
        return $this->abilityTypeArray;
    }

    public function getAbilityTypeValue($data) {
        return $this->abilityTypeArray[$data];
    }

    public function convertAbilityType($data) {
        return $this->abilityTypeArray[$data->abilityType];
    }

    public function getAbilityResultArray() {
        return $this->abilityResultArray;
    }

    public function getAbilityResultValue($data) {
        return $this->abilityResultArray[$data];
    }

    public function convertAbilityResult($data) {
        return $this->abilityResultArray[$data->abilityResult];
    }

    public function getTargetTypeArray() {
        return $this->targetTypeArray;
    }

    public function getTargetTypeValue($data) {
        return $this->targetTypeArray[$data];
    }

    public function convertTargetType($data) {
        return $this->targetTypeArray[$data->targetType];
    }
    public function getPiercesImmuneArray() {
        return $this->piercesImmuneArray;
    }

    public function getPiercesImmuneValue($data) {
        return $this->piercesImmuneArray[$data];
    }

    public function convertPiercesImmune($data) {
        return $this->piercesImmuneArray[$data->piercesImmune];
    }
    
    public $damageTypeArray = array(
        '0' => 'No Damage',
        '1' => 'Physical Damage',
        '2' => 'Magical Damage',
    );

    public function getDamageTypeArray() {
        return $this->damageTypeArray;
    }

    public function getDamageTypeValue($data) {
        return $this->damageTypeArray[$data];
    }

    public function convertDamageType($data) {
        return $this->damageTypeArray[$data->damageType];
    }*/

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return CDbConnection database connection
     */
    public function getDbConnection() {
        return Yii::app()->db_dota2;
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
            array('heroId, name, detailTH, image, mana, cooldown', 'required'),
            array('heroId, ordinal', 'numerical', 'integerOnly' => true),
            array('name, youtube, mana, cooldown', 'length', 'max' => 50),
            array('image', 'length', 'max' => 200),
            array('detailTH, detailEN, noteLeft, noteRight', 'length', 'max' => 1000),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('skillId, heroId, name, detailTH, detailEN, image, youtube, mana, cooldown, noteLeft, noteRight, ordinal', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'hero' => array(self::BELONGS_TO, 'Hero', 'heroId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'skillId' => 'Skill',
            'heroId' => 'Hero',
            'name' => 'Name',
            'detailTH' => 'Detail Th',
            'detailEN' => 'Detail En',
            'image' => 'Image',
            'youtube' => 'Youtube',
            'mana' => 'Mana',
            'cooldown' => 'Cooldown',
            'noteLeft' => 'Note Left',
            'noteRight' => 'Note Right',
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
        $criteria->compare('heroId', $this->heroId);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('detailTH', $this->detailTH, true);
        $criteria->compare('detailEN', $this->detailEN, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('youtube', $this->youtube, true);
        $criteria->compare('mana', $this->mana, true);
        $criteria->compare('cooldown', $this->cooldown, true);
        $criteria->compare('noteLeft', $this->noteLeft, true);
        $criteria->compare('noteRight', $this->noteRight, true);
        $criteria->compare('ordinal', $this->ordinal);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    public function getLastOrdinal($heroId) {
        $criteria = new CDbCriteria;
        $criteria->select = 'max(ordinal) AS maxOrdinal';
        $criteria->condition = 'heroId = :heroId';
        $criteria->params = array(
            ':heroId' => $heroId,
        );
        $data = $this->find($criteria);
        return ($data['maxOrdinal'] + 1);
    }

}