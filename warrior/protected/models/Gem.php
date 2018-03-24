<?php

/**
 * This is the model class for table "gem".
 *
 * The followings are the available columns in table 'gem':
 * @property integer $gemId
 * @property string $nameEN
 * @property string $nameTH
 * @property string $nameCN
 * @property integer $buffType
 * @property integer $buffValue
 * @property integer $rare
 */
class Gem extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gem';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('buffType, buffValue, rare', 'numerical', 'integerOnly'=>true),
			array('nameEN, nameTH, nameCN', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('gemId, nameEN, nameTH, nameCN, buffType, buffValue, rare', 'safe', 'on'=>'search'),
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
			'gemId' => 'Gem',
			'nameEN' => 'Name En',
			'nameTH' => 'Name Th',
			'nameCN' => 'Name Cn',
			'buffType' => 'Buff Type',
			'buffValue' => 'Buff Value',
			'rare' => 'Rare',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('gemId',$this->gemId);
		$criteria->compare('nameEN',$this->nameEN,true);
		$criteria->compare('nameTH',$this->nameTH,true);
		$criteria->compare('nameCN',$this->nameCN,true);
		$criteria->compare('buffType',$this->buffType);
		$criteria->compare('buffValue',$this->buffValue);
		$criteria->compare('rare',$this->rare);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @return CDbConnection the database connection used for this class
	 */
	public function getDbConnection()
	{
		return Yii::app()->db_warrior;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Gem the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
