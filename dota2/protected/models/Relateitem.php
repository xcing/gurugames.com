<?php

/**
 * This is the model class for table "relateitem".
 *
 * The followings are the available columns in table 'relateitem':
 * @property integer $relateItemId
 * @property integer $itemId
 * @property integer $materialId
 * @property integer $amount
 * @property integer $price
 */
class Relateitem extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Relateitem the static model class
     */
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
        return 'relateitem';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('itemId, materialId, price', 'required'),
            array('itemId, materialId, amount, price', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('relateItemId, itemId, materialId, amount, price', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'item' => array(self::BELONGS_TO, 'Item', 'itemId'),
            'itemMaterial' => array(self::BELONGS_TO, 'Item', 'materialId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'relateItemId' => 'Relate Item',
            'itemId' => 'Item',
            'materialId' => 'Material',
            'amount' => 'Amount',
            'price' => 'Price',
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

        $criteria->compare('relateItemId', $this->relateItemId);
        $criteria->compare('itemId', $this->itemId);
        $criteria->compare('materialId', $this->materialId);
        $criteria->compare('amount', $this->amount);
        $criteria->compare('price', $this->price);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}