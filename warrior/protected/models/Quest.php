<?php

/**
 * This is the model class for table "quest".
 *
 * The followings are the available columns in table 'quest':
 * @property integer $questId
 * @property string $detailEN
 * @property string $detailTH
 * @property string $detailCN
 * @property integer $stageId
 * @property integer $itemType
 * @property integer $itemId
 * @property integer $itemAmount
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
		return Yii::app()->db_warrior;
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
			array('stageId, itemType, itemId, itemAmount', 'numerical', 'integerOnly'=>true),
			array('detailEN, detailTH, detailCN', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('questId, detailEN, detailTH, detailCN, stageId, itemType, itemId, itemAmount', 'safe', 'on'=>'search'),
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
			'detailEN' => 'Detail En',
			'detailTH' => 'Detail Th',
			'detailCN' => 'Detail Cn',
			'stageId' => 'Stage',
			'itemType' => 'Item Type',
			'itemId' => 'Item',
			'itemAmount' => 'Item Amount',
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
		$criteria->compare('detailEN',$this->detailEN,true);
		$criteria->compare('detailTH',$this->detailTH,true);
		$criteria->compare('detailCN',$this->detailCN,true);
		$criteria->compare('stageId',$this->stageId);
		$criteria->compare('itemType',$this->itemType);
		$criteria->compare('itemId',$this->itemId);
		$criteria->compare('itemAmount',$this->itemAmount);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}