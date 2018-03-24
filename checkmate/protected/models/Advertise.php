<?php

/**
 * This is the model class for table "advertise".
 *
 * The followings are the available columns in table 'advertise':
 * @property integer $advertiseId
 * @property string $url
 * @property string $picture
 * @property integer $position
 * @property string $dateStart
 * @property string $dateEnd
 */
class Advertise extends CActiveRecord {

    public $positionArray = array(
        '1' => 'top banner',
        '2' => 'popup banner',
    );

    public function getPositionArray() {
        return $this->positionArray;
    }

    public function getPositionValue($id) {
        return $this->positionArray[$id];
    }

    public function convertPosition($data) {
        return $this->positionArray[$data->position];
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return CDbConnection database connection
     */
    public function getDbConnection() {
        return Yii::app()->db_checkmate;
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'advertise';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('url, picture, dateStart, dateEnd', 'required'),
            array('position', 'numerical', 'integerOnly' => true),
            array('url, picture', 'length', 'max' => 100),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('advertiseId, url, picture, position, dateStart, dateEnd', 'safe', 'on' => 'search'),
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
            'advertiseId' => 'Advertise',
            'url' => 'Url',
            'picture' => 'Picture',
            'position' => 'Position',
            'dateStart' => 'Date Start',
            'dateEnd' => 'Date End',
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

        $criteria->compare('advertiseId', $this->advertiseId);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('picture', $this->picture, true);
        $criteria->compare('position', $this->position);
        $criteria->compare('dateStart', $this->dateStart, true);
        $criteria->compare('dateEnd', $this->dateEnd, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}