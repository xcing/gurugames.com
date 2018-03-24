<?php

/**
 * This is the model class for table "relate_user_game".
 *
 * The followings are the available columns in table 'relate_user_game':
 * @property integer $relate_user_gameId
 * @property integer $userId
 * @property integer $gameId
 * @property string $updatedDate
 */
class RelateUserGame extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'relate_user_game';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userId, gameId, updatedDate', 'required'),
			array('userId, gameId', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('relate_user_gameId, userId, gameId, updatedDate', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'userId'),
			'game' => array(self::BELONGS_TO, 'Game', 'gameId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'relate_user_gameId' => 'Relate User Game',
			'userId' => 'User',
			'gameId' => 'Game',
			'updatedDate' => 'Updated Date',
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

		$criteria->compare('relate_user_gameId',$this->relate_user_gameId);
		$criteria->compare('userId',$this->userId);
		$criteria->compare('gameId',$this->gameId);
		$criteria->compare('updatedDate',$this->updatedDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RelateUserGame the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
