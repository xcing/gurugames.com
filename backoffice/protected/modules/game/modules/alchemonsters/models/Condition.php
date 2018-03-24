<?php

/**
 * This is the model class for table "condition".
 *
 * The followings are the available columns in table 'condition':
 * @property integer $conditionId
 * @property string $nameEN
 * @property string $nameTH
 * @property string $nameCN
 * @property string $detailEN
 * @property string $detailTH
 * @property string $detailCN
 * @property integer $durationTurn
 * @property integer $type
 */
class Condition extends CActiveRecord {

    public $typeArray = array(
        '1' => 'ตอนโจมตี',
        '2' => 'ติดตัว',
        '3' => 'ตอนโดนตี',
        '4' => 'เมื่อเริ่มต้นเทิร์น',
    );

    public function getTypeArray() {
        return $this->typeArray;
    }

    public function getTypeValue($id) {
        return $this->typeArray[$id];
    }

    public function convertType($data) {
        return $this->typeArray[$data->type];
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
        return 'condition';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('durationTurn, type', 'numerical', 'integerOnly' => true),
            array('nameEN, nameTH, nameCN', 'length', 'max' => 50),
            array('detailEN, detailTH, detailCN', 'length', 'max' => 150),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('conditionId, nameEN, nameTH, nameCN, detailEN, detailTH, detailCN, durationTurn, type', 'safe', 'on' => 'search'),
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
            'conditionId' => 'Condition',
            'nameEN' => 'Name En',
            'nameTH' => 'Name Th',
            'nameCN' => 'Name Cn',
            'detailEN' => 'Detail En',
            'detailTH' => 'Detail Th',
            'detailCN' => 'Detail Cn',
            'durationTurn' => 'Duration Turn',
            'type' => 'Type',
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

        $criteria->compare('conditionId', $this->conditionId);
        $criteria->compare('nameEN', $this->nameEN, true);
        $criteria->compare('nameTH', $this->nameTH, true);
        $criteria->compare('nameCN', $this->nameCN, true);
        $criteria->compare('detailEN', $this->detailEN, true);
        $criteria->compare('detailTH', $this->detailTH, true);
        $criteria->compare('detailCN', $this->detailCN, true);
        $criteria->compare('durationTurn', $this->durationTurn);
        $criteria->compare('type', $this->type);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}