<?php

/**
 * This is the model class for table "item".
 *
 * The followings are the available columns in table 'item':
 * @property integer $itemId
 * @property string $name
 * @property string $image
 * @property string $detailTH
 * @property string $detailEN
 * @property integer $price
 * @property string $bonus
 * @property string $informationTH
 * @property string $informationEN
 * @property integer $ordinal
 * @property integer $location
 */
class Item extends CActiveRecord {

    public $maxOrdinal = 0;
    public $locationArray = array(
        '1' => 'column1',
        '2' => 'column2',
        '3' => 'column3',
        '4' => 'column4',
        '5' => 'column5',
        '6' => 'column6',
        '7' => 'column7',
        '8' => 'column8',
        '9' => 'column9',
        '10' => 'column10',
        '11' => 'column11',
    );

    public function getLocationArray() {
        return $this->locationArray;
    }

    public function getLocationValue($data) {
        return $this->locationArray[$data];
    }

    public function convertLocation($data) {
        return $this->locationArray[$data->location];
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
        return 'item';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, image, detailTH, price, location', 'required'),
            array('price, ordinal, location', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 50),
            array('image, material', 'length', 'max' => 100),
            array('detailTH, detailEN, bonus', 'length', 'max' => 500),
            array('informationTH, informationEN, informationTH2', 'length', 'max' => 1000),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('itemId, name, image, detailTH, detailEN, price, bonus, informationTH, informationEN, informationTH2, material, ordinal, location', 'safe', 'on' => 'search'),
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
            'itemId' => 'Item',
            'name' => 'Name',
            'image' => 'Image',
            'detailTH' => 'Detail Th',
            'detailEN' => 'Detail En',
            'price' => 'Price',
            'bonus' => 'Bonus',
            'informationTH' => 'Information Th',
            'informationEN' => 'Information En',
            'informationTH2' => 'Information TH2',
            'material' => 'Material',
            'ordinal' => 'Ordinal',
            'location' => 'Location',
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

        $criteria->compare('itemId', $this->itemId);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('detailTH', $this->detailTH, true);
        $criteria->compare('detailEN', $this->detailEN, true);
        $criteria->compare('price', $this->price);
        $criteria->compare('bonus', $this->bonus, true);
        $criteria->compare('informationTH', $this->informationTH, true);
        $criteria->compare('informationEN', $this->informationEN, true);
        $criteria->compare('informationTH2', $this->informationTH2, true);
        $criteria->compare('material', $this->material);
        $criteria->compare('ordinal', $this->ordinal);
        $criteria->compare('location', $this->location);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    public function getLastOrdinal($location) {
        $criteria = new CDbCriteria;
        $criteria->select = 'max(ordinal) AS maxOrdinal';
        $criteria->condition = 'location = :location';
        $criteria->params = array(
            ':location' => $location,
        );
        $data = $this->find($criteria);
        return ($data['maxOrdinal'] + 1);
    }

}