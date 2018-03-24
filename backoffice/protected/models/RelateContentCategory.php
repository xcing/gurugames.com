<?php

/**
 * This is the model class for table "relate_content_category".
 *
 * The followings are the available columns in table 'relate_content_category':
 * @property integer $relate_content_categoryId
 * @property integer $contentId
 * @property integer $categoryId
 */
class RelateContentCategory extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return RelateContentCategory the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'relate_content_category';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('contentId, categoryId', 'required'),
            array('contentId, categoryId', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('relate_content_categoryId, contentId, categoryId', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'content' => array(self::BELONGS_TO, 'Content', 'contentId'),
            'category' => array(self::BELONGS_TO, 'Category', 'categoryId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'relate_content_categoryId' => 'Relate Content Category',
            'contentId' => 'Content',
            'categoryId' => 'Category',
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

        $criteria->compare('relate_content_categoryId', $this->relate_content_categoryId);
        $criteria->compare('contentId', $this->contentId);
        $criteria->compare('categoryId', $this->categoryId);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}