<?php

/**
 * This is the model class for table "stage".
 *
 * The followings are the available columns in table 'stage':
 * @property integer $stageId
 * @property string $nameEN
 * @property string $nameTH
 * @property string $nameCN
 * @property integer $worldId
 * @property integer $mapId
 * @property integer $level
 * @property integer $ordinal
 * @property integer $useEnergy
 * @property integer $drop_warriorId
 * @property integer $drop_equipmentId
 * @property integer $drop_gemId
 * @property integer $drop_ore
 * @property integer $drop_money
 * @property string $enemyId_wave1
 * @property string $enemyId_wave2
 * @property string $enemyId_wave3
 */
class Stage extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'stage';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('worldId, areaId, level, ordinal, useEnergy, drop_warriorId, drop_equipmentId, drop_gemId, drop_ore, drop_money', 'numerical', 'integerOnly'=>true),
			array('nameEN, nameTH, nameCN', 'length', 'max'=>100),
			array('enemyId_wave1, enemyId_wave2, enemyId_wave3', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('stageId, nameEN, nameTH, nameCN, worldId, areaId, level, ordinal, useEnergy, drop_warriorId, drop_equipmentId, drop_gemId, drop_ore, drop_money, enemyId_wave1, enemyId_wave2, enemyId_wave3', 'safe', 'on'=>'search'),
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
			'stageId' => 'Stage',
			'nameEN' => 'Name En',
			'nameTH' => 'Name Th',
			'nameCN' => 'Name Cn',
			'worldId' => 'World',
			'areaId' => 'Area',
			'level' => 'Level',
			'ordinal' => 'Ordinal',
			'useEnergy' => 'Use Energy',
			'drop_warriorId' => 'Drop Warrior',
			'drop_equipmentId' => 'Drop Equipment',
			'drop_gemId' => 'Drop Gem',
			'drop_ore' => 'Drop Ore',
			'drop_money' => 'Drop Money',
			'enemyId_wave1' => 'Enemy Id Wave1',
			'enemyId_wave2' => 'Enemy Id Wave2',
			'enemyId_wave3' => 'Enemy Id Wave3',
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

		$criteria->compare('stageId',$this->stageId);
		$criteria->compare('nameEN',$this->nameEN,true);
		$criteria->compare('nameTH',$this->nameTH,true);
		$criteria->compare('nameCN',$this->nameCN,true);
		$criteria->compare('worldId',$this->worldId);
		$criteria->compare('areaId',$this->areaId);
		$criteria->compare('level',$this->level);
		$criteria->compare('ordinal',$this->ordinal);
		$criteria->compare('useEnergy',$this->useEnergy);
		$criteria->compare('drop_warriorId',$this->drop_warriorId);
		$criteria->compare('drop_equipmentId',$this->drop_equipmentId);
		$criteria->compare('drop_gemId',$this->drop_gemId);
		$criteria->compare('drop_ore',$this->drop_ore);
		$criteria->compare('drop_money',$this->drop_money);
		$criteria->compare('enemyId_wave1',$this->enemyId_wave1,true);
		$criteria->compare('enemyId_wave2',$this->enemyId_wave2,true);
		$criteria->compare('enemyId_wave3',$this->enemyId_wave3,true);

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
	 * @return Stage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
