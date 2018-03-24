<?php

/**
 * This is the model class for table "warrior".
 *
 * The followings are the available columns in table 'warrior':
 * @property integer $warriorId
 * @property string $nameEN
 * @property string $nameTH
 * @property string $nameCN
 * @property integer $rare
 * @property integer $hp
 * @property integer $atk
 * @property integer $def
 * @property integer $spd
 * @property integer $luck
 * @property integer $elementId
 * @property integer $weaponTypeId
 * @property integer $leaderSkillId
 * @property string $defaultStatWhenLvUp
 */
class Warrior extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Warrior the static model class
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
		return Yii::app()->db_warrior;
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'warrior';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nameEN, nameTH, nameCN, hp, atk, def, spd, luck', 'required'),
			array('rare, hp, atk, def, spd, luck, elementId, weaponTypeId, leaderSkillId', 'numerical', 'integerOnly'=>true),
			array('nameEN, nameTH, nameCN', 'length', 'max'=>50),
			array('defaultStatWhenLvUp', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('warriorId, nameEN, nameTH, nameCN, rare, hp, atk, def, spd, luck, elementId, weaponTypeId, leaderSkillId, defaultStatWhenLvUp', 'safe', 'on'=>'search'),
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
			'warriorId' => 'Warrior',
			'nameEN' => 'Name En',
			'nameTH' => 'Name Th',
			'nameCN' => 'Name Cn',
			'rare' => 'Rare',
			'hp' => 'Hp',
			'atk' => 'Atk',
			'def' => 'Def',
			'spd' => 'Spd',
			'luck' => 'Luck',
			'elementId' => 'Element',
			'weaponTypeId' => 'Weapon Type',
			'leaderSkillId' => 'Leader Skill',
			'defaultStatWhenLvUp' => 'Default Stat When Lv Up',
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

		$criteria->compare('warriorId',$this->warriorId);
		$criteria->compare('nameEN',$this->nameEN,true);
		$criteria->compare('nameTH',$this->nameTH,true);
		$criteria->compare('nameCN',$this->nameCN,true);
		$criteria->compare('rare',$this->rare);
		$criteria->compare('hp',$this->hp);
		$criteria->compare('atk',$this->atk);
		$criteria->compare('def',$this->def);
		$criteria->compare('spd',$this->spd);
		$criteria->compare('luck',$this->luck);
		$criteria->compare('elementId',$this->elementId);
		$criteria->compare('weaponTypeId',$this->weaponTypeId);
		$criteria->compare('leaderSkillId',$this->leaderSkillId);
		$criteria->compare('defaultStatWhenLvUp',$this->defaultStatWhenLvUp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}