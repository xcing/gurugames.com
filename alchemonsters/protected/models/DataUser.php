<?php

/**
 * This is the model class for table "data_user".
 *
 * The followings are the available columns in table 'data_user':
 * @property string $userId
 * @property integer $characterId
 * @property integer $level
 * @property integer $exp
 * @property integer $vip
 * @property integer $expVip
 * @property integer $energy
 * @property integer $money
 * @property integer $diamond
 * @property string $data_monster
 * @property string $data_accessory
 * @property string $data_equipment
 * @property string $data_material
 * @property string $data_quest
 */
class DataUser extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DataUser the static model class
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
		return Yii::app()->db_alchemonsters;
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'data_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userId, energy, money, diamond', 'required'),
			array('characterId, level, exp, vip, expVip, energy, money, diamond', 'numerical', 'integerOnly'=>true),
			array('userId', 'length', 'max'=>20),
			array('data_monster, data_accessory, data_equipment, data_material, data_quest', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('userId, characterId, level, exp, vip, expVip, energy, money, diamond, data_monster, data_accessory, data_equipment, data_material, data_quest', 'safe', 'on'=>'search'),
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
			'userId' => 'User',
			'characterId' => 'Character',
			'level' => 'Level',
			'exp' => 'Exp',
			'vip' => 'Vip',
			'expVip' => 'Exp Vip',
			'energy' => 'Energy',
			'money' => 'Money',
			'diamond' => 'Diamond',
			'data_monster' => 'Data Monster',
			'data_accessory' => 'Data Accessory',
			'data_equipment' => 'Data Equipment',
			'data_material' => 'Data Material',
			'data_quest' => 'Data Quest',
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

		$criteria->compare('userId',$this->userId,true);
		$criteria->compare('characterId',$this->characterId);
		$criteria->compare('level',$this->level);
		$criteria->compare('exp',$this->exp);
		$criteria->compare('vip',$this->vip);
		$criteria->compare('expVip',$this->expVip);
		$criteria->compare('energy',$this->energy);
		$criteria->compare('money',$this->money);
		$criteria->compare('diamond',$this->diamond);
		$criteria->compare('data_monster',$this->data_monster,true);
		$criteria->compare('data_accessory',$this->data_accessory,true);
		$criteria->compare('data_equipment',$this->data_equipment,true);
		$criteria->compare('data_material',$this->data_material,true);
		$criteria->compare('data_quest',$this->data_quest,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}