<?php

/**
 * This is the model class for table "monster".
 *
 * The followings are the available columns in table 'monster':
 * @property integer $monsterId
 * @property string $nameEN
 * @property string $nameTH
 * @property string $nameCN
 * @property integer $rare
 * @property integer $str
 * @property integer $vit
 * @property integer $dex
 * @property integer $agi
 * @property integer $elementId
 * @property integer $raceId
 * @property integer $amountForm
 * @property integer $leaderSkillId1
 * @property integer $leaderSkillId2
 * @property integer $leaderSkillId3
 * @property string $defaultStatWhenLvUp1
 * @property string $defaultStatWhenLvUp2
 * @property string $defaultStatWhenLvUp3
 * @property string $materialForm1
 * @property string $materialForm2
 * @property string $materialForm3
 * @property string $materialUpgrade1
 * @property string $materialUpgrade2
 * @property string $materialUpgrade3
 * @property string $materialUpgrade4
 * @property string $materialUpgrade5
 * @property string $materialUpgrade6
 * @property string $talent
 */
class Monster extends CActiveRecord {

    public $rareArray = array(
        '1' => 'common',
        '2' => 'rare',
        '3' => 'legendary',
    );

    public function getRareArray() {
        return $this->rareArray;
    }

    public function getRareValue($id) {
        return $this->rareArray[$id];
    }

    public function convertRare($data) {
        return $this->rareArray[$data->rare];
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return CDbConnection database connection
     */
    public function getDbConnection() {
        return Yii::app()->db_alchemonsters;
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'monster';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('rare, str, vit, dex, agi, elementId, raceId, amountForm, leaderSkillId1, leaderSkillId2, leaderSkillId3', 'numerical', 'integerOnly' => true),
            array('nameEN, nameTH, nameCN', 'length', 'max' => 50),
            array('defaultStatWhenLvUp1, defaultStatWhenLvUp2, defaultStatWhenLvUp3', 'length', 'max' => 15),
            array('materialForm1, materialForm2, materialForm3, materialUpgrade1, materialUpgrade2, materialUpgrade3, materialUpgrade4, materialUpgrade5, materialUpgrade6', 'length', 'max' => 100),
            array('talent', 'length', 'max' => 20),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('monsterId, nameEN, nameTH, nameCN, rare, str, vit, dex, agi, elementId, raceId, amountForm, leaderSkillId1, leaderSkillId2, leaderSkillId3, defaultStatWhenLvUp1, defaultStatWhenLvUp2, defaultStatWhenLvUp3, materialForm1, materialForm2, materialForm3, materialUpgrade1, materialUpgrade2, materialUpgrade3, materialUpgrade4, materialUpgrade5, materialUpgrade6, talent', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'element' => array(self::BELONGS_TO, 'Element', 'elementId'),
            'race' => array(self::BELONGS_TO, 'Race', 'raceId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'monsterId' => 'Monster',
            'nameEN' => 'Name En',
            'nameTH' => 'Name Th',
            'nameCN' => 'Name Cn',
            'rare' => 'Rare',
            'str' => 'Str',
            'vit' => 'Vit',
            'dex' => 'Dex',
            'agi' => 'Agi',
            'elementId' => 'Element',
            'raceId' => 'Race',
            'amountForm' => 'Amount Form',
            'leaderSkillId1' => 'Leader Skill Id1',
            'leaderSkillId2' => 'Leader Skill Id2',
            'leaderSkillId3' => 'Leader Skill Id3',
            'defaultStatWhenLvUp1' => 'Default Stat When Lv Up1',
            'defaultStatWhenLvUp2' => 'Default Stat When Lv Up2',
            'defaultStatWhenLvUp3' => 'Default Stat When Lv Up3',
            'materialForm1' => 'Material Form1',
            'materialForm2' => 'Material Form2',
            'materialForm3' => 'Material Form3',
            'materialUpgrade1' => 'Material Upgrade1',
            'materialUpgrade2' => 'Material Upgrade2',
            'materialUpgrade3' => 'Material Upgrade3',
            'materialUpgrade4' => 'Material Upgrade4',
            'materialUpgrade5' => 'Material Upgrade5',
            'materialUpgrade6' => 'Material Upgrade6',
            'talent' => 'Talent',
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

        $criteria->compare('monsterId', $this->monsterId);
        $criteria->compare('nameEN', $this->nameEN, true);
        $criteria->compare('nameTH', $this->nameTH, true);
        $criteria->compare('nameCN', $this->nameCN, true);
        $criteria->compare('rare', $this->rare);
        $criteria->compare('str', $this->str);
        $criteria->compare('vit', $this->vit);
        $criteria->compare('dex', $this->dex);
        $criteria->compare('agi', $this->agi);
        $criteria->compare('elementId', $this->elementId);
        $criteria->compare('raceId', $this->raceId);
        $criteria->compare('amountForm', $this->amountForm);
        $criteria->compare('leaderSkillId1', $this->leaderSkillId1);
        $criteria->compare('leaderSkillId2', $this->leaderSkillId2);
        $criteria->compare('leaderSkillId3', $this->leaderSkillId3);
        $criteria->compare('defaultStatWhenLvUp1', $this->defaultStatWhenLvUp1, true);
        $criteria->compare('defaultStatWhenLvUp2', $this->defaultStatWhenLvUp2, true);
        $criteria->compare('defaultStatWhenLvUp3', $this->defaultStatWhenLvUp3, true);
        $criteria->compare('materialForm1', $this->materialForm1, true);
        $criteria->compare('materialForm2', $this->materialForm2, true);
        $criteria->compare('materialForm3', $this->materialForm3, true);
        $criteria->compare('materialUpgrade1', $this->materialUpgrade1, true);
        $criteria->compare('materialUpgrade2', $this->materialUpgrade2, true);
        $criteria->compare('materialUpgrade3', $this->materialUpgrade3, true);
        $criteria->compare('materialUpgrade4', $this->materialUpgrade4, true);
        $criteria->compare('materialUpgrade5', $this->materialUpgrade5, true);
        $criteria->compare('materialUpgrade6', $this->materialUpgrade6, true);
        $criteria->compare('talent', $this->talent, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}