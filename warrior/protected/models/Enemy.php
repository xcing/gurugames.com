<?php

/**
 * This is the model class for table "enemy".
 *
 * The followings are the available columns in table 'enemy':
 * @property integer $monsterId
 * @property string $nameEN
 * @property string $nameTH
 * @property string $nameCN
 * @property integer $hp
 * @property integer $atk
 * @property integer $def
 * @property integer $spd
 * @property integer $luck
 * @property integer $elementId
 */
class Enemy extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Enemy the static model class
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
		return 'enemy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nameEN, nameTH, nameCN', 'required'),
			array('hp, atk, def, spd, luck, elementId', 'numerical', 'integerOnly'=>true),
			array('nameEN, nameTH, nameCN', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('enemyId, nameEN, nameTH, nameCN, hp, atk, def, spd, luck, elementId', 'safe', 'on'=>'search'),
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
			'enemyId' => 'Enemy',
			'nameEN' => 'Name En',
			'nameTH' => 'Name Th',
			'nameCN' => 'Name Cn',
			'hp' => 'Hp',
			'atk' => 'Atk',
			'def' => 'Def',
			'spd' => 'Spd',
			'luck' => 'Luck',
			'elementId' => 'Element',
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

		$criteria->compare('enemyId',$this->enemyId);
		$criteria->compare('nameEN',$this->nameEN,true);
		$criteria->compare('nameTH',$this->nameTH,true);
		$criteria->compare('nameCN',$this->nameCN,true);
		$criteria->compare('hp',$this->hp);
		$criteria->compare('atk',$this->atk);
		$criteria->compare('def',$this->def);
		$criteria->compare('spd',$this->spd);
		$criteria->compare('luck',$this->luck);
		$criteria->compare('elementId',$this->elementId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}