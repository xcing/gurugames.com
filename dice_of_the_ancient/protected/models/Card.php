<?php

/**
 * This is the model class for table "card".
 *
 * The followings are the available columns in table 'card':
 * @property integer $cardId
 * @property string $nameEN
 * @property string $nameTH
 * @property string $nameCN
 * @property integer $rare
 * @property integer $cost
 * @property integer $hp
 * @property integer $atk
 * @property integer $def
 * @property integer $spd
 * @property integer $elementId
 * @property integer $dicePassiveId
 * @property integer $nextFormCardId
 * @property integer $minLv
 * @property integer $maxLv
 * @property string $defaultStatWhenLvUp
 * @property string $defaultStatWhenStarUp
 * @property string $diceForUpgrade1
 * @property string $diceForUpgrade2
 * @property string $diceForUpgrade3
 * @property string $diceForUpgrade4
 * @property string $diceForUpgrade5
 * @property string $diceForUpgrade6
 */
class Card extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Card the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return CDbConnection database connection
	 */
	public function getDbConnection()
	{
		return Yii::app()->db_dice;
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'card';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nameEN, nameTH, nameCN, hp, atk, def, spd', 'required'),
			array('rare, cost, hp, atk, def, spd, elementId, dicePassiveId, nextFormCardId, minLv, maxLv', 'numerical', 'integerOnly'=>true),
			array('nameEN, nameTH, nameCN', 'length', 'max'=>50),
			array('defaultStatWhenLvUp, defaultStatWhenStarUp', 'length', 'max'=>30),
			array('diceForUpgrade1, diceForUpgrade2, diceForUpgrade3, diceForUpgrade4, diceForUpgrade5, diceForUpgrade6', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cardId, nameEN, nameTH, nameCN, rare, cost, hp, atk, def, spd, elementId, dicePassiveId, nextFormCardId, minLv, maxLv, defaultStatWhenLvUp, defaultStatWhenStarUp, diceForUpgrade1, diceForUpgrade2, diceForUpgrade3, diceForUpgrade4, diceForUpgrade5, diceForUpgrade6', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cardId' => 'Card',
			'nameEN' => 'Name En',
			'nameTH' => 'Name Th',
			'nameCN' => 'Name Cn',
			'rare' => 'Rare',
			'cost' => 'Cost',
			'hp' => 'Hp',
			'atk' => 'Atk',
			'def' => 'Def',
			'spd' => 'Spd',
			'elementId' => 'Element',
			'dicePassiveId' => 'Dice Passive',
			'nextFormCardId' => 'Next Form Card',
			'minLv' => 'Min Lv',
			'maxLv' => 'Max Lv',
			'defaultStatWhenLvUp' => 'Default Stat When Lv Up',
			'defaultStatWhenStarUp' => 'Default Stat When Star Up',
			'diceForUpgrade1' => 'Dice For Upgrade1',
			'diceForUpgrade2' => 'Dice For Upgrade2',
			'diceForUpgrade3' => 'Dice For Upgrade3',
			'diceForUpgrade4' => 'Dice For Upgrade4',
			'diceForUpgrade5' => 'Dice For Upgrade5',
			'diceForUpgrade6' => 'Dice For Upgrade6',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('cardId',$this->cardId);
		$criteria->compare('nameEN',$this->nameEN,true);
		$criteria->compare('nameTH',$this->nameTH,true);
		$criteria->compare('nameCN',$this->nameCN,true);
		$criteria->compare('rare',$this->rare);
		$criteria->compare('cost',$this->cost);
		$criteria->compare('hp',$this->hp);
		$criteria->compare('atk',$this->atk);
		$criteria->compare('def',$this->def);
		$criteria->compare('spd',$this->spd);
		$criteria->compare('elementId',$this->elementId);
		$criteria->compare('dicePassiveId',$this->dicePassiveId);
		$criteria->compare('nextFormCardId',$this->nextFormCardId);
		$criteria->compare('minLv',$this->minLv);
		$criteria->compare('maxLv',$this->maxLv);
		$criteria->compare('defaultStatWhenLvUp',$this->defaultStatWhenLvUp,true);
		$criteria->compare('defaultStatWhenStarUp',$this->defaultStatWhenStarUp,true);
		$criteria->compare('diceForUpgrade1',$this->diceForUpgrade1,true);
		$criteria->compare('diceForUpgrade2',$this->diceForUpgrade2,true);
		$criteria->compare('diceForUpgrade3',$this->diceForUpgrade3,true);
		$criteria->compare('diceForUpgrade4',$this->diceForUpgrade4,true);
		$criteria->compare('diceForUpgrade5',$this->diceForUpgrade5,true);
		$criteria->compare('diceForUpgrade6',$this->diceForUpgrade6,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}