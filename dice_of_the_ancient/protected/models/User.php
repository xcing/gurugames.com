<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $userId
 * @property string $email
 * @property string $password
 * @property string $facebookId
 * @property string $guestId
 * @property string $dateRegistered
 * @property string $lastDateLogin
 * @property integer $active
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userId, email, password, facebookId, guestId, dateRegistered, lastDateLogin', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('userId', 'length', 'max'=>19),
			array('email', 'length', 'max'=>50),
			array('password, facebookId, guestId', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('userId, email, password, facebookId, guestId, dateRegistered, lastDateLogin, active', 'safe', 'on'=>'search'),
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
			'userId' => 'User',
			'email' => 'Email',
			'password' => 'Password',
			'facebookId' => 'Facebook',
			'guestId' => 'Guest',
			'dateRegistered' => 'Date Registered',
			'lastDateLogin' => 'Last Date Login',
			'active' => 'Active',
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

		$criteria->compare('userId',$this->userId,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('facebookId',$this->facebookId,true);
		$criteria->compare('guestId',$this->guestId,true);
		$criteria->compare('dateRegistered',$this->dateRegistered,true);
		$criteria->compare('lastDateLogin',$this->lastDateLogin,true);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}