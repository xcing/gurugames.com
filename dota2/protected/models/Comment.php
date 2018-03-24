<?php

/**
 * This is the model class for table "comment".
 *
 * The followings are the available columns in table 'comment':
 * @property integer $commentId
 * @property string $detail
 * @property integer $contentId
 * @property integer $userId
 * @property string $createDate
 */
class Comment extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Comment the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'comment';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('detail, contentId, userId, dateCreate', 'required'),
            array('contentId, userId', 'numerical', 'integerOnly' => true),
            array('detail', 'length', 'max' => 500),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('commentId, detail, contentId, userId, dateCreate', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'user' => array(self::BELONGS_TO, 'User', 'userId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'commentId' => 'Comment',
            'detail' => 'Detail',
            'contentId' => 'Content',
            'userId' => 'User',
            'dateCreate' => 'Date Create',
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

        $criteria->compare('commentId', $this->commentId);
        $criteria->compare('detail', $this->detail, true);
        $criteria->compare('contentId', $this->contentId);
        $criteria->compare('userId', $this->userId);
        $criteria->compare('dateCreate', $this->dateCreate, true);
        $criteria->order = 'dateCreate DESC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}