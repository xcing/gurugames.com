<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $userId
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $dateRegistered
 * @property string $lastDateLogin
 * @property integer $type
 * @property integer $server
 * @property integer $active
 */
class User extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return CDbConnection database connection
     */
    public function getDbConnection() {
        return Yii::app()->db_alchemonsters;
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('userId, name, email, password, dateRegistered, lastDateLogin', 'required'),
            array('type, server, active', 'numerical', 'integerOnly' => true),
            array('userId, name', 'length', 'max' => 20),
            array('email', 'length', 'max' => 50),
            array('password', 'length', 'max' => 100),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('userId, name, email, password, dateRegistered, lastDateLogin, type, server, active', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'data_user' => array(self::BELONGS_TO, 'DataUser', 'userId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'userId' => 'User',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'dateRegistered' => 'Date Registered',
            'lastDateLogin' => 'Last Date Login',
            'type' => 'Type',
            'server' => 'Server',
            'active' => 'Active',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('userId', $this->userId, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('dateRegistered', $this->dateRegistered, true);
        $criteria->compare('lastDateLogin', $this->lastDateLogin, true);
        $criteria->compare('type', $this->type);
        $criteria->compare('server', $this->server);
        $criteria->compare('active', $this->active);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}