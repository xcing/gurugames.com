<?php

/**
 * This is the model class for table "material".
 *
 * The followings are the available columns in table 'material':
 * @property integer $materialId
 * @property string $nameEN
 * @property string $nameTH
 * @property string $nameCN
 * @property integer $rare
 * @property integer $hp
 * @property integer $atk
 * @property integer $def
 * @property integer $acc
 * @property integer $spd
 * @property integer $eva
 * @property integer $cond
 * @property integer $dcond
 * @property integer $limitLv
 */
class Material extends CActiveRecord {

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
        return 'material';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('rare, hp, atk, def, acc, spd, eva, cond, dcond, limitLv', 'numerical', 'integerOnly' => true),
            array('nameEN, nameTH, nameCN', 'length', 'max' => 50),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('materialId, nameEN, nameTH, nameCN, rare, hp, atk, def, acc, spd, eva, cond, dcond, limitLv', 'safe', 'on' => 'search'),
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
            'materialId' => 'Material',
            'nameEN' => 'Name En',
            'nameTH' => 'Name Th',
            'nameCN' => 'Name Cn',
            'rare' => 'Rare',
            'hp' => 'Hp',
            'atk' => 'Atk',
            'def' => 'Def',
            'acc' => 'Acc',
            'spd' => 'Spd',
            'eva' => 'Eva',
            'cond' => 'Cond',
            'dcond' => 'Dcond',
            'limitLv' => 'Limit Lv',
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

        $criteria->compare('materialId', $this->materialId);
        $criteria->compare('nameEN', $this->nameEN, true);
        $criteria->compare('nameTH', $this->nameTH, true);
        $criteria->compare('nameCN', $this->nameCN, true);
        $criteria->compare('rare', $this->rare);
        $criteria->compare('hp', $this->hp);
        $criteria->compare('atk', $this->atk);
        $criteria->compare('def', $this->def);
        $criteria->compare('acc', $this->acc);
        $criteria->compare('spd', $this->spd);
        $criteria->compare('eva', $this->eva);
        $criteria->compare('cond', $this->cond);
        $criteria->compare('dcond', $this->dcond);
        $criteria->compare('limitLv', $this->limitLv);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}