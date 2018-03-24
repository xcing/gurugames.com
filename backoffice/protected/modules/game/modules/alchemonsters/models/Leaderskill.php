<?php

/**
 * This is the model class for table "leaderskill".
 *
 * The followings are the available columns in table 'leaderskill':
 * @property integer $leaderskillId
 * @property string $detailEN
 * @property string $detailTH
 * @property string $detailCN
 * @property integer $monsterId
 * @property integer $typeIncrese
 * @property integer $elementIdCondition
 * @property integer $raceIdCondition
 * @property integer $hp
 * @property integer $atk
 * @property integer $def
 * @property integer $acc
 * @property integer $eva
 * @property integer $spd
 * @property integer $cond
 * @property integer $dcond
 * @property integer $conditionId
 */
class Leaderskill extends CActiveRecord {

    public $typeIncreseArray = array(
        '1' => 'นำตัวเลขไปบวก',
        '2' => 'นำตัวเลขไปคุณ',
    );

    public function getTypeIncreseArray() {
        return $this->typeIncreseArray;
    }

    public function getTypeIncreseValue($id) {
        return $this->typeIncreseArray[$id];
    }

    public function convertTypeIncrese($data) {
        return $this->typeIncreseArray[$data->typeIncrese];
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
        return 'leaderskill';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('typeIncrese, elementIdCondition, raceIdCondition, hp, atk, def, acc, eva, spd, cond, dcond, conditionId', 'numerical', 'integerOnly' => true),
            array('detailEN, detailTH, detailCN', 'length', 'max' => 350),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('leaderskillId, detailEN, detailTH, detailCN, typeIncrese, elementIdCondition, raceIdCondition, hp, atk, def, acc, eva, spd, cond, dcond, conditionId', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'element' => array(self::BELONGS_TO, 'Element', 'elementIdCondition'),
            'race' => array(self::BELONGS_TO, 'Race', 'raceIdCondition'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'leaderskillId' => 'Leaderskill',
            'detailEN' => 'Detail En',
            'detailTH' => 'Detail Th',
            'detailCN' => 'Detail Cn',
            'typeIncrese' => 'Type Increse',
            'elementIdCondition' => 'Element Id Condition',
            'raceIdCondition' => 'Race Id Condition',
            'hp' => 'Hp',
            'atk' => 'Atk',
            'def' => 'Def',
            'acc' => 'Acc',
            'eva' => 'Eva',
            'spd' => 'Spd',
            'cond' => 'Cond',
            'dcond' => 'Dcond',
            'conditionId' => 'Condition',
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

        $criteria->compare('leaderskillId', $this->leaderskillId);
        $criteria->compare('detailEN', $this->detailEN, true);
        $criteria->compare('detailTH', $this->detailTH, true);
        $criteria->compare('detailCN', $this->detailCN, true);
        $criteria->compare('typeIncrese', $this->typeIncrese);
        $criteria->compare('elementIdCondition', $this->elementIdCondition);
        $criteria->compare('raceIdCondition', $this->raceIdCondition);
        $criteria->compare('hp', $this->hp);
        $criteria->compare('atk', $this->atk);
        $criteria->compare('def', $this->def);
        $criteria->compare('acc', $this->acc);
        $criteria->compare('eva', $this->eva);
        $criteria->compare('spd', $this->spd);
        $criteria->compare('cond', $this->cond);
        $criteria->compare('dcond', $this->dcond);
        $criteria->compare('conditionId', $this->conditionId);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}