<?php

/**
 * This is the model class for table "data_user".
 *
 * The followings are the available columns in table 'data_user':
 * @property string $userId
 * @property integer $serverId
 * @property string $name
 * @property integer $characterId
 * @property integer $level
 * @property integer $exp
 * @property integer $vip
 * @property integer $expVip
 * @property integer $energy
 * @property integer $money
 * @property integer $fame
 * @property integer $heart
 * @property integer $diamond
 * @property integer $bag_card
 * @property integer $bag_dice
 * @property integer $bag_friend
 * @property string $data_card
 * @property string $data_stage
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
        return Yii::app()->db_dice;
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
            array('userId, name, energy, money, fame, diamond', 'required'),
            array('serverId, characterId, level, exp, vip, expVip, energy, money, fame, heart, diamond, warPower, bag_card, bag_dice, bag_friend', 'numerical', 'integerOnly' => true),
            array('userId', 'length', 'max' => 21),
            array('name', 'length', 'max' => 20),
            array('displayImage', 'length', 'max' => 300),
            array('data_card, data_dice, data_stage, data_quest', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('userId, serverId, name, displayImage, characterId, level, exp, vip, expVip, energy, money, fame, heart, diamond, warPower, bag_card, bag_dice, bag_friend, data_card, data_dice, data_stage, data_quest', 'safe', 'on' => 'search'),
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
            'serverId' => 'Server',
            'name' => 'Name',
            'displayImage' => 'Display Image',
            'characterId' => 'Character',
            'level' => 'Level',
            'exp' => 'Exp',
            'vip' => 'Vip',
            'expVip' => 'Exp Vip',
            'energy' => 'Energy',
            'money' => 'Money',
            'fame' => 'Fame',
            'heart' => 'Heart',
            'diamond' => 'Diamond',
            'warPower' => 'War Power',
            'bag_card' => 'Bag Card',
            'bag_dice' => 'Bag Dice',
            'bag_friend' => 'Bag Friend',
            'data_card' => 'Data Card',
            'data_dice' => 'Data Dice',
            'data_stage' => 'Data Stage',
            'data_quest' => 'Data Quest',
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
        $criteria->compare('serverId', $this->serverId);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('displayImage', $this->displayImage, true);
        $criteria->compare('characterId', $this->characterId);
        $criteria->compare('level', $this->level);
        $criteria->compare('exp', $this->exp);
        $criteria->compare('vip', $this->vip);
        $criteria->compare('expVip', $this->expVip);
        $criteria->compare('energy', $this->energy);
        $criteria->compare('money', $this->money);
        $criteria->compare('fame', $this->fame);
        $criteria->compare('heart', $this->heart);
        $criteria->compare('diamond', $this->diamond);
        $criteria->compare('warPower', $this->warPower);
        $criteria->compare('bag_card', $this->bag_card);
        $criteria->compare('bag_dice', $this->bag_dice);
        $criteria->compare('bag_friend', $this->bag_friend);
        $criteria->compare('data_card', $this->data_card, true);
        $criteria->compare('data_dice', $this->data_dice, true);
        $criteria->compare('data_stage', $this->data_stage, true);
        $criteria->compare('data_quest', $this->data_quest, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}