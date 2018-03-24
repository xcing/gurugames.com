<?php

/**
 * This is the model class for table "data_user".
 *
 * The followings are the available columns in table 'data_user':
 * @property string $userId
 * @property string $name
 * @property integer $characterId
 * @property integer $level
 * @property integer $exp
 * @property integer $vip
 * @property integer $expVip
 * @property integer $energy
 * @property integer $money
 * @property integer $ore
 * @property integer $fame
 * @property integer $diamond
 * @property integer $bag_warrior
 * @property integer $bag_equipment
 * @property integer $bag_gem
 * @property string $data_warrior
 * @property string $data_equipment
 * @property string $data_gem
 * @property string $data_quest
 */
class DataUser extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return DataUser the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return CDbConnection database connection
     */
    public function getDbConnection() {
        return Yii::app()->db_warrior;
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'data_user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('userId, name, displayImage, energy, money, ore, fame, heart, diamond, bag_warrior, bag_equipment, bag_gem', 'required'),
            array('characterId, level, exp, vip, expVip, energy, money, ore, fame, heart, diamond, bag_warrior, bag_equipment, bag_gem, bag_friend', 'numerical', 'integerOnly' => true),
            array('userId', 'length', 'max' => 21),
            array('name', 'length', 'max' => 20),
            array('displayImage', 'length', 'max' => 300),
            array('data_warrior, data_warriorsoul, data_equipment, data_gem, data_quest, data_warriorquest', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('userId, name, displayImage, characterId, level, exp, vip, expVip, energy, money, ore, fame, heart, diamond, bag_warrior, bag_equipment, bag_gem, bag_friend, data_warrior, data_warriorsoul, data_equipment, data_gem, data_quest, data_warriorquest', 'safe', 'on' => 'search'),
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
            'userId' => 'User',
            'name' => 'Name',
            'displayImage' => 'Display Image',
            'characterId' => 'Character',
            'level' => 'Level',
            'exp' => 'Exp',
            'vip' => 'Vip',
            'expVip' => 'Exp Vip',
            'energy' => 'Energy',
            'money' => 'Money',
            'ore' => 'Ore',
            'fame' => 'Fame',
            'heart' => 'Heart',
            'diamond' => 'Diamond',
            'bag_warrior' => 'Bag Warrior',
            'bag_equipment' => 'Bag Equipment',
            'bag_gem' => 'Bag Gem',
            'bag_friend' => 'Bag Friend',
            'data_warrior' => 'Data Warrior',
            'data_warriorsoul' => 'Data Warrior Soul',
            'data_equipment' => 'Data Equipment',
            'data_gem' => 'Data Gem',
            'data_quest' => 'Data Quest',
            'data_warriorquest' => 'Data Warrior Quest',
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

        $criteria->compare('userId', $this->userId, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('displayImage', $this->displayImage, true);
        $criteria->compare('characterId', $this->characterId);
        $criteria->compare('level', $this->level);
        $criteria->compare('exp', $this->exp);
        $criteria->compare('vip', $this->vip);
        $criteria->compare('expVip', $this->expVip);
        $criteria->compare('energy', $this->energy);
        $criteria->compare('money', $this->money);
        $criteria->compare('ore', $this->ore);
        $criteria->compare('fame', $this->fame);
        $criteria->compare('heart', $this->heart);
        $criteria->compare('diamond', $this->diamond);
        $criteria->compare('bag_warrior', $this->bag_warrior);
        $criteria->compare('bag_equipment', $this->bag_equipment);
        $criteria->compare('bag_gem', $this->bag_gem);
        $criteria->compare('bag_friend', $this->bag_friend);
        $criteria->compare('data_warrior', $this->data_warrior, true);
        $criteria->compare('data_warriorsoul', $this->data_warriorsoul, true);
        $criteria->compare('data_equipment', $this->data_equipment, true);
        $criteria->compare('data_gem', $this->data_gem, true);
        $criteria->compare('data_quest', $this->data_quest, true);
        $criteria->compare('data_warriorquest', $this->data_quest, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
