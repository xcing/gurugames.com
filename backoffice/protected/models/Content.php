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

    public $typeArray = array(
        '1' => 'news',
        '2' => 'trick',
        '3' => 'review',
        '4' => 'Video',
        '5' => 'Article',
    );
    public $showTypeArray = array(
        '0' => 'show all web',
        '1' => 'show only main web',
        '2' => 'show only game web',
    );
    public $commentTypeArray = array(
        '0' => 'can\'t comment',
        '1' => 'can comment',
    );
    public $pinArray = array(
        '0' => 'unpin',
        '1' => 'pin',
    );
    public $activeArray = array(
        '0' => 'Inactive',
        '1' => 'Active',
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

    public function getShowTypeArray() {
        return $this->showTypeArray;
    }

    public function getShowTypeValue($data) {
        return $this->showTypeArray[$data];
    }

    public function convertShowType($data) {
        return $this->showTypeArray[$data->showType];
    }

    public function getCommentTypeArray() {
        return $this->commentTypeArray;
    }

    public function getCommentTypeValue($data) {
        return $this->commentTypeArray[$data];
    }

    public function convertCommentType($data) {
        return $this->commentTypeArray[$data->commentType];
    }
    
    public function getPinArray() {
        return $this->pinArray;
    }

    public function getPinValue($data) {
        return $this->pinArray[$data];
    }

    public function convertPin($data) {
        return $this->pinArray[$data->pin];
    }

    public function getActiveArray() {
        return $this->activeArray;
    }

    public function getActiveValue($data) {
        return $this->activeArray[$data];
    }

    public function convertActive($data) {
        return $this->activeArray[$data->active];
    }

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
            array('type, showType, commentType, title, userCreate, userUpdate, dateCreate, dateUpdate, pin, active', 'required'),
            array('type, showType, commentType, gameId, userCreate, userUpdate, pin, active', 'numerical', 'integerOnly' => true),
            array('title, image', 'length', 'max' => 150),
            array('shortDetail', 'length', 'max' => 300),
            array('detail', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('contentId, type, showType, commentType, title, image, detail, shortDetail, gameId, userCreate, userUpdate, dateCreate, dateUpdate, pin, active', 'safe', 'on' => 'search'),
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
            'type' => 'Type',
            'showType' => 'Show Type',
            'commentType' => 'Comment Type',
            'title' => 'Title',
            'image' => 'Image',
            'detail' => 'Detail',
            'shortDetail' => 'Short Detail',
            'gameId' => 'Game',
            'userCreate' => 'User Create',
            'userUpdate' => 'User Update',
            'dateCreate' => 'Date Create',
            'dateUpdate' => 'Date Update',
            'pin' => 'Pin',
            'active' => 'Active',
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
        $criteria->compare('type', $this->type);
        $criteria->compare('showType', $this->showType);
        $criteria->compare('commentType', $this->commentType);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('detail', $this->detail, true);
        $criteria->compare('shortDetail', $this->shortDetail, true);
        $criteria->compare('gameId', $this->gameId);
        $criteria->compare('userCreate', $this->userCreate);
        $criteria->compare('userUpdate', $this->userUpdate);
        $criteria->compare('dateCreate', $this->dateCreate, true);
        $criteria->compare('dateUpdate', $this->dateUpdate, true);
        $criteria->compare('pin', $this->pin);
        $criteria->compare('active', $this->active);
        $criteria->order = 'pin DESC, contentId DESC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}