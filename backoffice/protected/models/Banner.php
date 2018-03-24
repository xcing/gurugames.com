<?php

/**
 * This is the model class for table "banner".
 *
 * The followings are the available columns in table 'banner':
 * @property integer $bannerId
 * @property string $link
 * @property string $image
 * @property integer $contentId
 * @property integer $position
 */
class Banner extends CActiveRecord {

    public $maxOrdinal = 0;
    public $positionArray = array(
        '1' => 'slide',
        '2' => 'bottom slide',
        '3' => 'review banner',
    );
    
    public function getPositionArray() {
        return $this->positionArray;
    }

    public function getPositionValue($data) {
        return $this->positionArray[$data];
    }

    public function convertPosition($data) {
        return $this->positionArray[$data->position];
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'banner';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('contentId, position, ordinal, gameId', 'numerical', 'integerOnly' => true),
            array('link', 'length', 'max' => 100),
            array('image', 'length', 'max' => 150),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('bannerId, contentId, link, position, ordinal, image, gameId', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'content' => array(self::BELONGS_TO, 'Content', 'contentId'),
            'game' => array(self::BELONGS_TO, 'Game', 'gameId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'bannerId' => 'Banner',
            'contentId' => 'Content',
            'link' => 'Link',
            'position' => 'Position',
            'ordinal' => 'Ordinal',
            'image' => 'Image',
            'gameId' => 'Game ID',
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

        $criteria->compare('bannerId', $this->bannerId);
        $criteria->compare('contentId', $this->contentId);
        $criteria->compare('link', $this->link, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('position', $this->position);
        $criteria->compare('ordinal', $this->ordinal);
        $criteria->compare('gameId', $this->gameId);
        $criteria->order = 'ordinal ASC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    public function getLastOrdinal($position) {
        $criteria = new CDbCriteria;
        $criteria->select = 'max(ordinal) AS maxOrdinal';
        $criteria->condition = 'position = :position';
        $criteria->params = array(
            ':position' => $position,
        );
        $data = $this->find($criteria);
        return ($data['maxOrdinal'] + 1);
    }

}