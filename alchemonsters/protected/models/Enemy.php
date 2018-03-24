<?php

/**
 * This is the model class for table "enemy".
 *
 * The followings are the available columns in table 'enemy':
 * @property integer $monsterId
 * @property string $nameEN
 * @property string $nameTH
 * @property string $nameCN
 * @property integer $hp
 * @property integer $atk
 * @property integer $def
 * @property integer $acc
 * @property integer $eva
 * @property integer $spd
 * @property integer $cond
 * @property integer $dcond
 * @property integer $elementId
 * @property integer $raceId
 */
class Enemy extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Enemy the static model class
     */
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
        return 'enemy';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('hp, atk, def, acc, eva, spd, cond, dcond, elementId, raceId', 'numerical', 'integerOnly' => true),
            array('nameEN, nameTH, nameCN', 'length', 'max' => 50),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('monsterId, nameEN, nameTH, nameCN, hp, atk, def, acc, eva, spd, cond, dcond, elementId, raceId', 'safe', 'on' => 'search'),
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
            'hp' => 'Hp',
            'atk' => 'Atk',
            'def' => 'Def',
            'acc' => 'Acc',
            'eva' => 'Eva',
            'spd' => 'Spd',
            'cond' => 'Cond',
            'dcond' => 'Dcond',
            'elementId' => 'Element',
            'raceId' => 'Race',
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
        $criteria->compare('hp', $this->hp);
        $criteria->compare('atk', $this->atk);
        $criteria->compare('def', $this->def);
        $criteria->compare('acc', $this->acc);
        $criteria->compare('eva', $this->eva);
        $criteria->compare('spd', $this->spd);
        $criteria->compare('cond', $this->cond);
        $criteria->compare('dcond', $this->dcond);
        $criteria->compare('elementId', $this->elementId);
        $criteria->compare('raceId', $this->raceId);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}