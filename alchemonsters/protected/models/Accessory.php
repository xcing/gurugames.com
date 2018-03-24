<?php

/**
 * This is the model class for table "accessory".
 *
 * The followings are the available columns in table 'accessory':
 * @property integer $accessoryId
 * @property string $nameEN
 * @property string $nameTH
 * @property string $nameCN
 * @property string $condition
 * @property integer $rare
 * @property integer $limitLv
 */
class Accessory extends CActiveRecord {

    public $rareArray = array(
        '1' => 'common',
        '2' => 'rare',
        '3' => 'legendary',
    );

    public function getRareArray() {
        return $this->rareArray;
    }

    public function getRareValue($id) {
        return $this->rareArray[$id];
    }

    public function convertRare($data) {
        return $this->rareArray[$data->rare];
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
        return 'accessory';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('rare, limitLv', 'numerical', 'integerOnly' => true),
            array('nameEN, nameTH, nameCN', 'length', 'max' => 50),
            array('condition', 'length', 'max' => 10),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('accessoryId, nameEN, nameTH, nameCN, condition, rare, limitLv', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'condition' => array(self::BELONGS_TO, 'Condition', 'condition'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'accessoryId' => 'Accessory',
            'nameEN' => 'Name En',
            'nameTH' => 'Name Th',
            'nameCN' => 'Name Cn',
            'condition' => 'Condition',
            'rare' => 'Rare',
            'limitLv' => 'Limit Lv',
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

        $criteria->compare('accessoryId', $this->accessoryId);
        $criteria->compare('nameEN', $this->nameEN, true);
        $criteria->compare('nameTH', $this->nameTH, true);
        $criteria->compare('nameCN', $this->nameCN, true);
        $criteria->compare('condition', $this->condition, true);
        $criteria->compare('rare', $this->rare);
        $criteria->compare('limitLv', $this->limitLv);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}