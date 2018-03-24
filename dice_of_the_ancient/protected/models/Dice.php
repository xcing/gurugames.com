<?php

/**
 * This is the model class for table "dice".
 *
 * The followings are the available columns in table 'dice':
 * @property integer $diceId
 * @property integer $dicePageId1
 * @property integer $dicePageId2
 * @property integer $dicePageId3
 * @property integer $dicePageId4
 * @property integer $dicePageId5
 * @property integer $dicePageId6
 * @property integer $rare
 */
class Dice extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Dice the static model class
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
		return 'dice';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dicePageId1, dicePageId2, dicePageId3, dicePageId4, dicePageId5, dicePageId6, rare', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('diceId, dicePageId1, dicePageId2, dicePageId3, dicePageId4, dicePageId5, dicePageId6, rare', 'safe', 'on'=>'search'),
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
			'diceId' => 'Dice',
			'dicePageId1' => 'Dice Page Id1',
			'dicePageId2' => 'Dice Page Id2',
			'dicePageId3' => 'Dice Page Id3',
			'dicePageId4' => 'Dice Page Id4',
			'dicePageId5' => 'Dice Page Id5',
			'dicePageId6' => 'Dice Page Id6',
			'rare' => 'Rare',
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

		$criteria->compare('diceId',$this->diceId);
		$criteria->compare('dicePageId1',$this->dicePageId1);
		$criteria->compare('dicePageId2',$this->dicePageId2);
		$criteria->compare('dicePageId3',$this->dicePageId3);
		$criteria->compare('dicePageId4',$this->dicePageId4);
		$criteria->compare('dicePageId5',$this->dicePageId5);
		$criteria->compare('dicePageId6',$this->dicePageId6);
		$criteria->compare('rare',$this->rare);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}