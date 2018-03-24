<?php

/**
 * This is the model class for table "guidehero".
 *
 * The followings are the available columns in table 'guidehero':
 * @property integer $guideHeroId
 * @property string $name
 * @property string $skill
 * @property string $startItem
 * @property string $coreItem
 * @property string $dynamicItem
 * @property string $detail
 * @property integer $ordinal
 * @property integer $heroId
 */
class Guidehero extends CActiveRecord {

    public $maxOrdinal = 0;
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
        return 'guidehero';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, skill, ordinal, heroId', 'required'),
            array('ordinal, heroId', 'numerical', 'integerOnly' => true),
            array('name, skill, startItem, earlyItem', 'length', 'max' => 100),
            array('image, coreItem, lateItem, dynamicItem', 'length', 'max' => 200),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('guideHeroId, name, skill, image, startItem, earlyItem, coreItem, lateItem, dynamicItem, detail, ordinal, heroId, dateUpdated', 'safe', 'on' => 'search'),
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
            'guideHeroId' => 'Guide Hero',
            'name' => 'Name',
            'skill' => 'Skill',
            'image' => 'Image',
            'startItem' => 'Start Item',
            'earlyItem' => 'Early Item',
            'coreItem' => 'Core Item',
            'lateItem' => 'Last Item',
            'dynamicItem' => 'Dynamic Item',
            'detail' => 'Detail',
            'ordinal' => 'Ordinal',
            'heroId' => 'Hero',
            'dateUpdated' => 'Date Updated',
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

        $criteria->compare('guideHeroId', $this->guideHeroId);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('skill', $this->skill, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('startItem', $this->startItem, true);
        $criteria->compare('earlyItem', $this->earlyItem, true);
        $criteria->compare('coreItem', $this->coreItem, true);
        $criteria->compare('lateItem', $this->lateItem, true);
        $criteria->compare('dynamicItem', $this->dynamicItem, true);
        $criteria->compare('detail', $this->detail, true);
        $criteria->compare('ordinal', $this->ordinal);
        $criteria->compare('heroId', $this->heroId);
        $criteria->compare('dateUpdated', $this->dateUpdated, true);

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