<?php

/**
 * This is the model class for table "enemyskill".
 *
 * The followings are the available columns in table 'enemyskill':
 * @property integer $skillId
 * @property string $nameEN
 * @property string $nameTH
 * @property string $nameCN
 * @property integer $enemyId
 * @property integer $useWhen
 * @property integer $hitAmount
 * @property string $hitDmg
 * @property integer $dmg
 * @property integer $target
 * @property string $conditionId
 * @property integer $condAcc
 * @property string $selfCondId
 * @property integer $buffType
 * @property integer $buffValue
 * @property integer $buffTarget
 * @property integer $decreseDmgReceive
 * @property integer $percentUse
 * @property integer $ordinal
 */
class Enemyskill extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Enemyskill the static model class
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
		return 'enemyskill';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nameEN, nameTH, nameCN, enemyId', 'required'),
			array('enemyId, useWhen, hitAmount, dmg, target, condAcc, buffType, buffValue, buffTarget, decreseDmgReceive, percentUse, ordinal', 'numerical', 'integerOnly'=>true),
			array('nameEN, nameTH, nameCN, hitDmg', 'length', 'max'=>50),
			array('conditionId, selfCondId', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('skillId, nameEN, nameTH, nameCN, enemyId, useWhen, hitAmount, hitDmg, dmg, target, conditionId, condAcc, selfCondId, buffType, buffValue, buffTarget, decreseDmgReceive, percentUse, ordinal', 'safe', 'on'=>'search'),
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
			'enemyId' => 'Enemy',
			'useWhen' => 'Use When',
			'hitAmount' => 'Hit Amount',
			'hitDmg' => 'Hit Dmg',
			'dmg' => 'Dmg',
			'target' => 'Target',
			'conditionId' => 'Condition',
			'condAcc' => 'Cond Acc',
			'selfCondId' => 'Self Cond',
			'buffType' => 'Buff Type',
			'buffValue' => 'Buff Value',
			'buffTarget' => 'Buff Target',
			'decreseDmgReceive' => 'Decrese Dmg Receive',
			'percentUse' => 'Percent Use',
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
		$criteria->compare('enemyId',$this->enemyId);
		$criteria->compare('useWhen',$this->useWhen);
		$criteria->compare('hitAmount',$this->hitAmount);
		$criteria->compare('hitDmg',$this->hitDmg,true);
		$criteria->compare('dmg',$this->dmg);
		$criteria->compare('target',$this->target);
		$criteria->compare('conditionId',$this->conditionId,true);
		$criteria->compare('condAcc',$this->condAcc);
		$criteria->compare('selfCondId',$this->selfCondId,true);
		$criteria->compare('buffType',$this->buffType);
		$criteria->compare('buffValue',$this->buffValue);
		$criteria->compare('buffTarget',$this->buffTarget);
		$criteria->compare('decreseDmgReceive',$this->decreseDmgReceive);
		$criteria->compare('percentUse',$this->percentUse);
		$criteria->compare('ordinal',$this->ordinal);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}