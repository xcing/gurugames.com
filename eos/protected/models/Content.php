<?php

/**
 * This is the model class for table "content".
 *
 * The followings are the available columns in table 'content':
 * @property integer $contentId
 * @property string $title
 * @property string $image
 * @property string $detail
 * @property string $shortDetail
 * @property integer $gameId
 * @property integer $userCreate
 * @property integer $userUpdate
 * @property string $dateCreate
 * @property string $dateUpdate
 */
class Content extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Content the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'content';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, userCreate, userUpdate, dateCreate, dateUpdate', 'required'),
            array('gameId, userCreate, userUpdate', 'numerical', 'integerOnly' => true),
            array('title, image', 'length', 'max' => 150),
            array('shortDetail', 'length', 'max' => 300),
            array('detail', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('contentId, title, image, detail, shortDetail, gameId, userCreate, userUpdate, dateCreate, dateUpdate', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'game' => array(self::BELONGS_TO, 'Game', 'gameId'),
            'user' => array(self::BELONGS_TO, 'User', 'userCreate'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'contentId' => 'Content',
            'title' => 'Title',
            'image' => 'Image',
            'detail' => 'Detail',
            'shortDetail' => 'Short Detail',
            'gameId' => 'Game',
            'userCreate' => 'User Create',
            'userUpdate' => 'User Update',
            'dateCreate' => 'Date Create',
            'dateUpdate' => 'Date Update',
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

        $criteria->compare('contentId', $this->contentId);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('detail', $this->detail, true);
        $criteria->compare('shortDetail', $this->shortDetail, true);
        $criteria->compare('gameId', $this->gameId);
        $criteria->compare('userCreate', $this->userCreate);
        $criteria->compare('userUpdate', $this->userUpdate);
        $criteria->compare('dateCreate', $this->dateCreate, true);
        $criteria->compare('dateUpdate', $this->dateUpdate, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}