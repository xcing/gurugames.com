<?php

/**
 * This is the model class for table "hero".
 *
 * The followings are the available columns in table 'hero':
 * @property integer $heroId
 * @property string $name
 * @property string $image
 * @property string $imageFull
 * @property string $bioTH
 * @property string $bioEN
 * @property integer $type
 * @property integer $hp
 * @property integer $mana
 * @property string $str
 * @property string $agi
 * @property string $int
 * @property string $atk
 * @property double $armor
 * @property integer $moveSpd
 * @property string $sightRange
 * @property integer $atkRange
 * @property integer $missileSpd
 * @property integer $side
 * @property integer $ordinal
 */
class Hero extends CActiveRecord {

    public $maxOrdinal = 0;
    public $typeArray = array(
        '1' => 'str',
        '2' => 'agi',
        '3' => 'int',
    );
    public $sideArray = array(
        '1' => 'Radiant',
        '2' => 'Dire',
    );
    public $atkTypeArray = array(
        '1' => 'Melee',
        '2' => 'Range',
    );

    public function getTypeArray() {
        return $this->typeArray;
    }

    public function getTypeValue($typeId) {
        return $this->typeArray[$typeId];
    }

    public function convertType($data) {
        return $this->typeArray[$data->type];
    }

    public function getSideArray() {
        return $this->sideArray;
    }

    public function getSideValue($side) {
        return $this->sideArray[$side];
    }

    public function convertSide($data) {
        return $this->sideArray[$data->side];
    }
    
    public function getAtkTypeArray() {
        return $this->atkTypeArray;
    }

    public function getAtkTypeValue($side) {
        return $this->atkTypeArray[$side];
    }

    public function convertAtkType($data) {
        return $this->atkTypeArray[$data->atkType];
    }

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
        return 'hero';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, image, imageFull, bioTH, hp, mana, str, agi, int, atk, armor, moveSpd, sightRange, atkRange, atkType', 'required'),
            array('type, hp, mana, moveSpd, atkRange, missileSpd, atkType, side, ordinal', 'numerical', 'integerOnly' => true),
            array('armor', 'numerical'),
            array('image, imageFull', 'length', 'max' => 100),
            array('name, str, agi, int, atk', 'length', 'max' => 50),
            array('sightRange', 'length', 'max' => 20),
            array('bioTH', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('heroId, name, image, imageFull, bioTH, bioEN, type, hp, mana, str, agi, int, atk, armor, moveSpd, sightRange, atkRange, missileSpd, atkType, side, ordinal', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'heroId' => 'Hero',
            'name' => 'Name',
            'image' => 'Image',
            'imageFull' => 'Image Full',
            'bioTH' => 'Bio Th',
            'bioEN' => 'Bio En',
            'type' => 'Type',
            'hp' => 'Hp',
            'mana' => 'Mana',
            'str' => 'Str',
            'agi' => 'Agi',
            'int' => 'Int',
            'atk' => 'Atk',
            'armor' => 'Armor',
            'moveSpd' => 'Move Spd',
            'sightRange' => 'Sight Range',
            'atkRange' => 'Atk Range',
            'missileSpd' => 'Missile Spd',
            'atkType' => 'Atk Type',
            'side' => 'Side',
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

        $criteria->compare('heroId', $this->heroId);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('imageFull', $this->imageFull, true);
        $criteria->compare('bioTH', $this->bioTH, true);
        $criteria->compare('bioEN', $this->bioEN, true);
        $criteria->compare('type', $this->type);
        $criteria->compare('hp', $this->hp);
        $criteria->compare('mana', $this->mana);
        $criteria->compare('str', $this->str, true);
        $criteria->compare('agi', $this->agi, true);
        $criteria->compare('int', $this->int, true);
        $criteria->compare('atk', $this->atk, true);
        $criteria->compare('armor', $this->armor);
        $criteria->compare('moveSpd', $this->moveSpd);
        $criteria->compare('sightRange', $this->sightRange, true);
        $criteria->compare('atkRange', $this->atkRange);
        $criteria->compare('missileSpd', $this->missileSpd);
        $criteria->compare('atkType', $this->atkType);
        $criteria->compare('side', $this->side);
        $criteria->compare('ordinal', $this->ordinal);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getLastOrdinal($type, $side) {
        $criteria = new CDbCriteria;
        $criteria->select = 'max(ordinal) AS maxOrdinal';
        $criteria->condition = 'type = :type AND side = :side';
        $criteria->params = array(
            ':type' => $type,
            ':side' => $side,
        );
        $data = $this->find($criteria);
        return ($data['maxOrdinal'] + 1);
    }

}