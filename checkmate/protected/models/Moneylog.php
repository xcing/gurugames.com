<?php

/**
 * This is the model class for table "moneylog".
 *
 * The followings are the available columns in table 'moneylog':
 * @property integer $moneylogId
 * @property integer $statuserId
 * @property integer $moneyBefore
 * @property integer $moneyAfter
 * @property integer $type
 * @property string $createdDate
 */
class Moneylog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Moneylog the static model class
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
		return Yii::app()->db_checkmate;
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'moneylog';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('createdDate', 'required'),
			array('statuserId, moneyBefore, moneyAfter, type', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('moneylogId, statuserId, moneyBefore, moneyAfter, type, createdDate', 'safe', 'on'=>'search'),
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
			'moneylogId' => 'Moneylog',
			'statuserId' => 'Statuser',
			'moneyBefore' => 'Money Before',
			'moneyAfter' => 'Money After',
			'type' => 'Type',
			'createdDate' => 'Created Date',
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

		$criteria->compare('moneylogId',$this->moneylogId);
		$criteria->compare('statuserId',$this->statuserId);
		$criteria->compare('moneyBefore',$this->moneyBefore);
		$criteria->compare('moneyAfter',$this->moneyAfter);
		$criteria->compare('type',$this->type);
		$criteria->compare('createdDate',$this->createdDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}