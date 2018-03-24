<?php

/**
 * This is the model class for table "relate_content_tag".
 *
 * The followings are the available columns in table 'relate_content_tag':
 * @property integer $relate_content_tagId
 * @property integer $contentId
 * @property integer $tagId
 */
class RelateContentTag extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return RelateContentTag the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'relate_content_tag';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('contentId, tagId', 'required'),
            array('contentId, tagId', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('relate_content_tagId, contentId, tagId', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'tag' => array(self::BELONGS_TO, 'Tag', 'tagId'),
            'content' => array(self::BELONGS_TO, 'Content', 'contentId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'relate_content_tagId' => 'Relate Content Tag',
            'contentId' => 'Content',
            'tagId' => 'Tag',
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

        $criteria->compare('relate_content_tagId', $this->relate_content_tagId);
        $criteria->compare('contentId', $this->contentId);
        $criteria->compare('tagId', $this->tagId);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}