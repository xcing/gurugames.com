<?php

/**
 * This is the model class for table "equipment".
 *
 * The followings are the available columns in table 'equipment':
 * @property integer $equipmentId
 * @property string $nameEN
 * @property string $nameTH
 * @property string $nameCN
 * @property integer $equipmentType
 * @property integer $weaponType
 * @property integer $armorType
 * @property integer $warriorId
 * @property integer $hp
 * @property integer $atk
 * @property integer $def
 * @property integer $spd
 * @property integer $luck
 * @property integer $hpPlusPerLv
 * @property integer $atkPlusPerLv
 * @property integer $defPlusPerLv
 * @property integer $spdPlusPerLv
 * @property integer $luckPlusPerLv
 * @property integer $conditionId
 * @property integer $rare
 * @property integer $limitLv
 */
class Equipment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Equipment the static model class
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
		return 'equipment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('equipmentType, weaponType, armorType, warriorId, hp, atk, def, spd, luck, hpPlusPerLv, atkPlusPerLv, defPlusPerLv, spdPlusPerLv, luckPlusPerLv, conditionId, rare, limitLv', 'numerical', 'integerOnly'=>true),
			array('nameEN, nameTH, nameCN', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('equipmentId, nameEN, nameTH, nameCN, equipmentType, weaponType, armorType, warriorId, hp, atk, def, spd, luck, hpPlusPerLv, atkPlusPerLv, defPlusPerLv, spdPlusPerLv, luckPlusPerLv, conditionId, rare, limitLv', 'safe', 'on'=>'search'),
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
			'equipmentId' => 'Equipment',
			'nameEN' => 'Name En',
			'nameTH' => 'Name Th',
			'nameCN' => 'Name Cn',
			'equipmentType' => 'Equipment Type',
			'weaponType' => 'Weapon Type',
			'armorType' => 'Armor Type',
			'warriorId' => 'Warrior',
			'hp' => 'Hp',
			'atk' => 'Atk',
			'def' => 'Def',
			'spd' => 'Spd',
			'luck' => 'Luck',
			'hpPlusPerLv' => 'Hp Plus Per Lv',
			'atkPlusPerLv' => 'Atk Plus Per Lv',
			'defPlusPerLv' => 'Def Plus Per Lv',
			'spdPlusPerLv' => 'Spd Plus Per Lv',
			'luckPlusPerLv' => 'Luck Plus Per Lv',
			'conditionId' => 'Condition',
			'rare' => 'Rare',
			'limitLv' => 'Limit Lv',
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

		$criteria->compare('equipmentId',$this->equipmentId);
		$criteria->compare('nameEN',$this->nameEN,true);
		$criteria->compare('nameTH',$this->nameTH,true);
		$criteria->compare('nameCN',$this->nameCN,true);
		$criteria->compare('equipmentType',$this->equipmentType);
		$criteria->compare('weaponType',$this->weaponType);
		$criteria->compare('armorType',$this->armorType);
		$criteria->compare('warriorId',$this->warriorId);
		$criteria->compare('hp',$this->hp);
		$criteria->compare('atk',$this->atk);
		$criteria->compare('def',$this->def);
		$criteria->compare('spd',$this->spd);
		$criteria->compare('luck',$this->luck);
		$criteria->compare('hpPlusPerLv',$this->hpPlusPerLv);
		$criteria->compare('atkPlusPerLv',$this->atkPlusPerLv);
		$criteria->compare('defPlusPerLv',$this->defPlusPerLv);
		$criteria->compare('spdPlusPerLv',$this->spdPlusPerLv);
		$criteria->compare('luckPlusPerLv',$this->luckPlusPerLv);
		$criteria->compare('conditionId',$this->conditionId);
		$criteria->compare('rare',$this->rare);
		$criteria->compare('limitLv',$this->limitLv);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}