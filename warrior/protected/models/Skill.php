<?php

/**
 * This is the model class for table "skill".
 *
 * The followings are the available columns in table 'skill':
 * @property integer $skillId
 * @property string $nameEN
 * @property string $nameTH
 * @property string $nameCN
 * @property string $detailEN
 * @property string $detailTH
 * @property string $detailCN
 * @property integer $warriorId
 * @property integer $useWhen
 * @property integer $hitAmount
 * @property string $hitDmg
 * @property integer $dmg
 * @property integer $dmgUpPerLv
 * @property integer $target
 * @property integer $conditionId
 * @property integer $condAcc
 * @property integer $selfCondId
 * @property integer $buffType
 * @property integer $buffValue
 * @property integer $buffUpPerLv
 * @property integer $buffTarget
 * @property integer $decreseDmgReceive
 * @property integer $decreseDmgReceiveUpPerLv
 * @property integer $percentUse
 * @property integer $percentUseUpPerLv
 * @property integer $ordinal
 */
class Skill extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Skill the static model class
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
		return 'skill';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nameEN, nameTH, nameCN, warriorId', 'required'),
			array('warriorId, useWhen, hitAmount, dmg, dmgUpPerLv, target, conditionId, condAcc, selfCondId, buffType, buffValue, buffUpPerLv, buffTarget, decreseDmgReceive, decreseDmgReceiveUpPerLv, percentUse, percentUseUpPerLv, ordinal', 'numerical', 'integerOnly'=>true),
			array('nameEN, nameTH, nameCN, hitDmg', 'length', 'max'=>50),
			array('detailEN, detailTH, detailCN', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('skillId, nameEN, nameTH, nameCN, detailEN, detailTH, detailCN, warriorId, useWhen, hitAmount, hitDmg, dmg, dmgUpPerLv, target, conditionId, condAcc, selfCondId, buffType, buffValue, buffUpPerLv, buffTarget, decreseDmgReceive, decreseDmgReceiveUpPerLv, percentUse, percentUseUpPerLv, ordinal', 'safe', 'on'=>'search'),
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
			'skillId' => 'Skill',
			'nameEN' => 'Name En',
			'nameTH' => 'Name Th',
			'nameCN' => 'Name Cn',
			'detailEN' => 'Detail En',
			'detailTH' => 'Detail Th',
			'detailCN' => 'Detail Cn',
			'warriorId' => 'Warrior',
			'useWhen' => 'Use When',
			'hitAmount' => 'Hit Amount',
			'hitDmg' => 'Hit Dmg',
			'dmg' => 'Dmg',
			'dmgUpPerLv' => 'Dmg Up Per Lv',
			'target' => 'Target',
			'conditionId' => 'Condition',
			'condAcc' => 'Cond Acc',
			'selfCondId' => 'Self Cond',
			'buffType' => 'Buff Type',
			'buffValue' => 'Buff Value',
			'buffUpPerLv' => 'Buff Up Per Lv',
			'buffTarget' => 'Buff Target',
			'decreseDmgReceive' => 'Decrese Dmg Receive',
			'decreseDmgReceiveUpPerLv' => 'Decrese Dmg Receive Up Per Lv',
			'percentUse' => 'Percent Use',
			'percentUseUpPerLv' => 'Percent Use Up Per Lv',
			'ordinal' => 'Ordinal',
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

		$criteria->compare('skillId',$this->skillId);
		$criteria->compare('nameEN',$this->nameEN,true);
		$criteria->compare('nameTH',$this->nameTH,true);
		$criteria->compare('nameCN',$this->nameCN,true);
		$criteria->compare('detailEN',$this->detailEN,true);
		$criteria->compare('detailTH',$this->detailTH,true);
		$criteria->compare('detailCN',$this->detailCN,true);
		$criteria->compare('warriorId',$this->warriorId);
		$criteria->compare('useWhen',$this->useWhen);
		$criteria->compare('hitAmount',$this->hitAmount);
		$criteria->compare('hitDmg',$this->hitDmg,true);
		$criteria->compare('dmg',$this->dmg);
		$criteria->compare('dmgUpPerLv',$this->dmgUpPerLv);
		$criteria->compare('target',$this->target);
		$criteria->compare('conditionId',$this->conditionId);
		$criteria->compare('condAcc',$this->condAcc);
		$criteria->compare('selfCondId',$this->selfCondId);
		$criteria->compare('buffType',$this->buffType);
		$criteria->compare('buffValue',$this->buffValue);
		$criteria->compare('buffUpPerLv',$this->buffUpPerLv);
		$criteria->compare('buffTarget',$this->buffTarget);
		$criteria->compare('decreseDmgReceive',$this->decreseDmgReceive);
		$criteria->compare('decreseDmgReceiveUpPerLv',$this->decreseDmgReceiveUpPerLv);
		$criteria->compare('percentUse',$this->percentUse);
		$criteria->compare('percentUseUpPerLv',$this->percentUseUpPerLv);
		$criteria->compare('ordinal',$this->ordinal);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}