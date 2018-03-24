<?php

/**
 * This is the model class for table "leaderskill".
 *
 * The followings are the available columns in table 'leaderskill':
 * @property integer $leaderskillId
 * @property string $detailEN
 * @property string $detailTH
 * @property string $detailCN
 * @property integer $elementIdCondition
 * @property integer $weapontypeIdCondition
 * @property integer $armortypeIdCondition
 * @property integer $hp
 * @property integer $atk
 * @property integer $def
 * @property integer $spd
 * @property integer $luck
 * @property integer $conditionId
 */
class Leaderskill extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Leaderskill the static model class
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
		return 'leaderskill';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('detailEN, detailTH, detailCN', 'required'),
			array('elementIdCondition, weapontypeIdCondition, armortypeIdCondition, hp, atk, def, spd, luck, conditionId', 'numerical', 'integerOnly'=>true),
			array('detailEN, detailTH, detailCN', 'length', 'max'=>350),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('leaderskillId, detailEN, detailTH, detailCN, elementIdCondition, weapontypeIdCondition, armortypeIdCondition, hp, atk, def, spd, luck, conditionId', 'safe', 'on'=>'search'),
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
			'leaderskillId' => 'Leaderskill',
			'detailEN' => 'Detail En',
			'detailTH' => 'Detail Th',
			'detailCN' => 'Detail Cn',
			'elementIdCondition' => 'Element Id Condition',
			'weapontypeIdCondition' => 'Weapontype Id Condition',
			'armortypeIdCondition' => 'Armortype Id Condition',
			'hp' => 'Hp',
			'atk' => 'Atk',
			'def' => 'Def',
			'spd' => 'Spd',
			'luck' => 'Luck',
			'conditionId' => 'Condition',
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

		$criteria->compare('leaderskillId',$this->leaderskillId);
		$criteria->compare('detailEN',$this->detailEN,true);
		$criteria->compare('detailTH',$this->detailTH,true);
		$criteria->compare('detailCN',$this->detailCN,true);
		$criteria->compare('elementIdCondition',$this->elementIdCondition);
		$criteria->compare('weapontypeIdCondition',$this->weapontypeIdCondition);
		$criteria->compare('armortypeIdCondition',$this->armortypeIdCondition);
		$criteria->compare('hp',$this->hp);
		$criteria->compare('atk',$this->atk);
		$criteria->compare('def',$this->def);
		$criteria->compare('spd',$this->spd);
		$criteria->compare('luck',$this->luck);
		$criteria->compare('conditionId',$this->conditionId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}