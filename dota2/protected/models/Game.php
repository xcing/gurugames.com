<?php

/**
 * This is the model class for table "game".
 *
 * The followings are the available columns in table 'game':
 * @property integer $gameId
 * @property string $name
 * @property string $subdomainName
 * @property string $bgImage
 * @property string $themeColorMain
 * @property string $themeColor1
 * @property string $themeColor2
 */
class Game extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Game the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'game';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required'),
            array('gameImage', 'length', 'max' => 150),
            array('name, bgImage', 'length', 'max' => 50),
            array('subdomainName', 'length', 'max' => 20),
            array('themeColorMain, themeColor1, themeColor2', 'length', 'max' => 10),
            array('lang', 'length', 'max' => 2),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('gameId, name, subdomainName, lang, gameImage, bgImage, themeColorMain, themeColor1, themeColor2', 'safe', 'on' => 'search'),
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
            'gameId' => 'Game',
            'name' => 'Name',
            'lang' => 'Language',
            'gameImage' => 'Icon Game',
            'subdomainName' => 'Subdomain Name',
            'bgImage' => 'Bg Image',
            'themeColorMain' => 'Theme Color Main',
            'themeColor1' => 'Theme Color1',
            'themeColor2' => 'Theme Color2',
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

        $criteria->compare('gameId', $this->gameId);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('lang', $this->lang, true);
        $criteria->compare('gameImage', $this->gameImage, true);
        $criteria->compare('subdomainName', $this->subdomainName, true);
        $criteria->compare('bgImage', $this->bgImage, true);
        $criteria->compare('themeColorMain', $this->themeColorMain, true);
        $criteria->compare('themeColor1', $this->themeColor1, true);
        $criteria->compare('themeColor2', $this->themeColor2, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}