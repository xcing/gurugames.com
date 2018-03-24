<?php

/**
 * This is the model class for table "quest".
 *
 * The followings are the available columns in table 'quest':
 * @property integer $questId
 * @property string $nameEN
 * @property string $nameTH
 * @property string $nameCN
 * @property string $detailEN
 * @property string $detailTH
 * @property string $detailCN
 * @property integer $conditionLv
 * @property string $conditionDetail
 * @property integer $type
 */
class Quest extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Quest the static model class
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
		return 'quest';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('conditionLv, type', 'numerical', 'integerOnly'=>true),
			array('nameEN, nameTH, nameCN', 'length', 'max'=>150),
			array('detailEN, detailTH, detailCN, conditionDetail', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('questId, nameEN, nameTH, nameCN, detailEN, detailTH, detailCN, conditionLv, conditionDetail, type', 'safe', 'on'=>'search'),
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
			'questId' => 'Quest',
			'nameEN' => 'Name En',
			'nameTH' => 'Name Th',
			'nameCN' => 'Name Cn',
			'detailEN' => 'Detail En',
			'detailTH' => 'Detail Th',
			'detailCN' => 'Detail Cn',
			'conditionLv' => 'Condition Lv',
			'conditionDetail' => 'Condition Detail',
			'type' => 'Type',
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

		$criteria->compare('questId',$this->questId);
		$criteria->compare('nameEN',$this->nameEN,true);
		$criteria->compare('nameTH',$this->nameTH,true);
		$criteria->compare('nameCN',$this->nameCN,true);
		$criteria->compare('detailEN',$this->detailEN,true);
		$criteria->compare('detailTH',$this->detailTH,true);
		$criteria->compare('detailCN',$this->detailCN,true);
		$criteria->compare('conditionLv',$this->conditionLv);
		$criteria->compare('conditionDetail',$this->conditionDetail,true);
		$criteria->compare('type',$this->type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}