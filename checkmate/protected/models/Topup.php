<?php

/**
 * This is the model class for table "topup".
 *
 * The followings are the available columns in table 'topup':
 * @property integer $topupId
 * @property integer $statuserId
 * @property integer $product_id
 * @property integer $amount
 * @property string $createdDate
 * @property string $ip_address
 */
class Topup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Topup the static model class
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
		return 'topup';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('statuserId, createdDate, ip_address', 'required'),
			array('statuserId, product_id, amount', 'numerical', 'integerOnly'=>true),
			array('ip_address', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('topupId, statuserId, product_id, amount, createdDate, ip_address', 'safe', 'on'=>'search'),
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
			'topupId' => 'Topup',
			'statuserId' => 'Statuser',
			'product_id' => 'Product',
			'amount' => 'Amount',
			'createdDate' => 'Created Date',
			'ip_address' => 'Ip Address',
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

		$criteria->compare('topupId',$this->topupId);
		$criteria->compare('statuserId',$this->statuserId);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('createdDate',$this->createdDate,true);
		$criteria->compare('ip_address',$this->ip_address,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}