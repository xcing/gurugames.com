<?php

/**
 * This is the model class for table "article".
 *
 * The followings are the available columns in table 'article':
 * @property integer $articleId
 * @property integer $ordinal
 * @property integer $type
 * @property integer $contentId
 * @property integer $gameId
 */
class Article extends CActiveRecord {

    public $maxOrdinal = 0;
    public $typeArray = array(
        '1' => 'news',
        '2' => 'trick',
        '3' => 'review',
        '4' => 'Video',
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
        return 'article';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ordinal, type, contentId, gameId, showType, commentType, active', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('articleId, ordinal, type, contentId, gameId, showType, commentType, active', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'game' => array(self::BELONGS_TO, 'Game', 'gameId'),
            'content' => array(self::BELONGS_TO, 'Content', 'contentId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'articleId' => 'Article',
            'ordinal' => 'Ordinal',
            'type' => 'Type',
            'contentId' => 'Content',
            'gameId' => 'Game',
            'showType' => 'Show Type',
            'commentType' => 'Comment Type',
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

        $criteria->compare('articleId', $this->articleId);
        $criteria->compare('ordinal', $this->ordinal);
        $criteria->compare('type', $this->type);
        $criteria->compare('contentId', $this->contentId);
        $criteria->compare('gameId', $this->gameId);
        $criteria->compare('showType', $this->showType);
        $criteria->compare('commentType', $this->commentType);
        $criteria->compare('active', $this->active);
        $criteria->order = 'articleId DESC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getLastOrdinal($gameId, $type) {
        $criteria = new CDbCriteria;
        $criteria->select = 'max(ordinal) AS maxOrdinal';
        $criteria->condition = 'gameId = :gameId AND type = :type';
        $criteria->params = array(
            ':gameId' => $gameId,
            ':type' => $type,
        );
        $data = $this->find($criteria);
        return ($data['maxOrdinal'] + 1);
    }

}